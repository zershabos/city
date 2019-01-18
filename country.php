<?php 
$countries = $db->Select("country","","");
if(isset($_POST['add']) and $_POST['add'] = "add")
{
	$ins_arr['name'] = $_POST['name'];
	$check = $db->Add("country",$ins_arr);
	if($check)
	{
 		header('Location: '.$_SERVER['REQUEST_URI']);
	}
}
if(isset($_POST['update']) and $_POST['update'] = "update")
{
	$update_arr['name'] = $_POST['name'];
	$check = $db->Update("country",$update_arr,$_POST['id']);
	if($check)
	{
 		header('Location: '.$_SERVER['REQUEST_URI']);
	}
}
if(isset($_GET['action']) and $_GET['action'] = "delete")
{
	$id = $_GET['countryid'];
	$db->Delete("city",$id,"countryid");
	$db->Delete("country",$id);
	$url = strtok($_SERVER['REQUEST_URI'], '?');
	header('Location: '.$url);
}
?>
<section class="content">
	<div class="container">
		<div class="control">
			<div class="form">
				<h3>New Country</h3>
				<form method="post" action="">
					<input name="name" placeholder="Country Name" class="form-control" required>
					<div class="btn-box">
						<button class="btn" name="add" value="add">Add</button>
					</div>
				</form>
			</div>
			<table class="table table-striped">
			    <thead>
			      <tr>
			      	<th>#</th>
			        <th>Country Name</th>
			        <th>Process</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php
			    	for($i=0;$i<count($countries);$i++)
			    	{
			    		?>
			    			<tr>
						        <td><?php echo $i+1; ?></td>
						        <td><?php echo $countries[$i]['name']; ?></td>
						        <td>
						        	<a href="?url=city&countryid=<?php echo $countries[$i]['id']; ?>">City</a>
						        	<a href="?action=delete&countryid=<?php echo $countries[$i]['id']; ?>">Delete</a>
						        	<a data-toggle="modal" data-target="#update<?php echo $countries[$i]['id']; ?>">Update</a>
									<div id="update<?php echo $countries[$i]['id']; ?>" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-body">
									        	<div class="form">
												<h3>Update Country</h3>
												<form method="post" action="">
													<input type="hidden" name="id" value="<?php 
													echo $countries[$i]['id']; ?>">
													<input name="name" placeholder="Country Name" class="form-control" value="<?php echo $countries[$i]['name']; ?>" required>
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