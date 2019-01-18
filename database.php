<?php
ob_start();
class Database 
{
      private $con;
      public function __construct()
      {
          $this->con = $this->Connect();  // To Connect With Database 
      }
      //Connect Database
      public function Connect()
      {
       $localhost="localhost";
       $root="root";
       $password="Salemwala27ob.";
       $db_name = "city";
       $conn = mysqli_connect($localhost,$root,$password,$db_name);
     if($conn)
     {
        mysqli_query($conn,"SET character_set_results=utf8");
        mb_language('uni'); 
        mb_internal_encoding('UTF-8');
        mysqli_query($conn,"set names 'utf8'");
        return $conn;
     }
     else
     {
         echo"error To Connect With Database"; 
     }
     }
     //Close Database
     public function Close()
     {
         mysqli_close();
     }
    
     //Delete
     public function Delete($TableName,$ID,$where='id')
    {
        $Query ="DELETE FROM `$TableName` WHERE `$where`='$ID'"; 
        $Sql = mysqli_query($this->con,$Query);
        if($Sql)  return TRUE;
        else  throw new Exception("Sql Not Deleted");   
    }
    //Add   
   public function Add($TableName,$Data)
    {
        foreach ($Data as $key => $value)
        {
        $Keys[] = $key;
        $Values[] = $value;
        }
        $Names = implode($Keys,",");
        $Record = '"'.implode($Values,'","').'"';        
        $Query = "INSERT INTO $TableName ($Names) VALUES ($Record)";
        $Sql = mysqli_query($this->con,$Query);
        //echo $Query;
        if($Sql)
            return mysqli_insert_id($this->con);
    }
    //Update
    public function Update($TableName,$Data,$ID,$where="id")
     {
        if(is_array($Data))
        { 
        $Query="UPDATE `$TableName` SET ";
        foreach ($Data as $key => $value) 
        {
         $Query .="`".$key."` = '".$value."' ,";            
        }
        $Pat="+-0/*";
        $Query .=$Pat;
        $Query = str_replace(",".$Pat," ",$Query);
        $Query .=" WHERE `$where`=$ID";
        $Sql = mysqli_query($this->con,$Query);
        if(!$Sql) echo  $Query;
        else  return true;
        }
        else  throw new Exception("Data Is No Array"); 
     }
     
   
    public function get_all_assoc($result){
        $array=array();
        while($row= mysqli_fetch_assoc($result)){
            $array[]=$row;
        }
        return $array;  
    }     
       public function Select($table, $Date = "", $where = "")
       {
       $q="";
       $w="";
       if($where!=""){
           foreach ($where as $key=>$value){
           $w.="$key='$value'";}
           $w= "where ".rtrim($w,",");
       }
       if($Date!=""){
       foreach ($Date as $key){
           $q.="$key,";
       }
       $q=  rtrim($q,",");
       }
       else
       {
           $q="*";
       }
       $Query="SElECT $q FROM $table $w ORDER BY id ASC";
       $sql=  mysqli_query($this->con,$Query);
       if($sql){
          return $this->get_all_assoc($sql);      
       }
       else{
          return FALSE;  
       }
   }
  }
