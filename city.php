<?php 
if(isset($_GET['countryid']) and $_GET['countryid'] != "" and intval($_GET['countryid']) > 0)
{
	$w = array("countryid"=>$_GET['countryid']);
	$cities = $db->Select("city","",$w);
	if(isset($_POST['add']) and $_POST['add'] = "add")
	{
		$ins_arr['countryid'] = $_GET['countryid'];
		$ins_arr['name']      = $_POST['name'];
		$ins_arr['count']     = $_POST['count'];
		$check = $db->Add("city",$ins_arr);
		if($check)
		{
	 		header('Location: '.$_SERVER['REQUEST_URI']);
		}
	}
	if(isset($_POST['update']) and $_POST['update'] = "update")
	{
		$update_arr['name']  = $_POST['name'];
		$update_arr['count'] = $_POST['count'];
		$check = $db->Update("city",$update_arr,$_POST['id']);
		if($check)
		{
	 		header('Location: '.$_SERVER['REQUEST_URI']);
		}
	}
	if(isset($_GET['action']) and $_GET['action'] = "delete")
	{
		$id = $_GET['cityid'];
		$check = $db->Delete("city",$id);
		$url = strtok($_SERVER['REQUEST_URI'], '?')."?url=city&countryid=".$_GET['countryid'];
		header('Location: '.$url);
	}

	?>
<section class="content">
	<div class="container">
		<a href="?url=country" class="back"><i class="fa fa-long-arrow-left"></i>Back To Country</a>
		<div class="control">
			<div class="form">
				<h3>New City</h3>
				<form method="post" action="">
					<input name="name" placeholder="City Name" class="form-control" required>
					<input name="count" placeholder="Count Of People" class="form-control" required>
					<div class="btn-box">
						<button class="btn" name="add" value="add">Add</button>
					</div>
				</form>
			</div>
			<table class="table table-striped">
			    <thead>
			      <tr>
			      	<th>#</th>
			        <th>City Name</th>
			        <th>Count</th>
			        <th>Process</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php
			    	for($i=0;$i<count($cities);$i++)
			    	{
			    		?>
			    			<tr>
						        <td><?php echo $i+1; ?></td>
						        <td><?php echo $cities[$i]['name']; ?></td>
						        <td><?php echo $cities[$i]['count']; ?></td>
						        <td>
						        	<a href="?url=city&countryid=<?php echo $_GET['countryid']; ?>&action=delete&cityid=<?php echo $cities[$i]['id']; ?>">Delete</a>
						        	<a data-toggle="modal" data-target="#update<?php echo $cities[$i]['id']; ?>">Update</a>
									<div id="update<?php echo $cities[$i]['id']; ?>" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-body">
									        	<div class="form">
												<h3>Update City</h3>
												<form method="post" action="">
													<input type="hidden" name="id" value="<?php 
													echo $cities[$i]['id']; ?>">
													<input name="name" placeholder="Country Name" class="form-control" value="<?php echo $cities[$i]['name']; ?>" required>
													<input name="count" placeholder="Count" class="form-control" value="<?php echo $cities[$i]['count']; ?>" required>
													<div class="btn-box">
														<button class="btn" name="update" value="update">update</button>
													</div>
												</form>
											</div>
									      </div>
									    </div>
									  </div>
									</div>
						        </td>
						      </tr>
			    		<?php
			    	}
			    	?>
			    </tbody>
			 </table>
		</div>
	</div>
</section>
<?php 
}
else
{
	echo "City ID Not Valid";
}