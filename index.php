<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple Change File Name</h3>
		<hr style="border-top:1px dotted #000;"/>
		<div class="col-md-4">
			<form method="POST" action="upload.php" enctype="multipart/form-data">
				<div class="form-group">	
					<input name="file" type="file" required="required"/>
				</div>	
				<center><button class="btn btn-primary" name="upload"><span class="glyphicon glyphicon-upload"></span> Upload</button></center>
			</form>
		</div>
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>File Name</th>
						<th>File Location</th>
						<th>Action</th>
					</tr>
				<thead>
				<tbody>
					<?php
						require 'conn.php';
						$query=mysqli_query($conn, "SELECT * FROM `file`") or die(mysqli_error());
						while($fetch=mysqli_fetch_array($query)){
					?>
						<tr>
							<td><?php echo $fetch['filename']?></td>
							<td><?php echo $fetch['location']?></td>
							<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $fetch['file_id']?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>
						</tr>
						
						
						<div class="modal fade" id="edit<?php echo $fetch['file_id']?>" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<form method="POST" enctype="multipart/form-data" action="change.php">
										<div class="modal-header">
											<h3 class="modal-title">Update File</h3>
										</div>
										<div class="modal-body">
											<div class="col-md-2"></div>
											<div class="col-md-8">
												<input type="hidden" value="<?php echo $fetch['file_id']?>" name="file_id"/>
												<input type="hidden" name="location" value="<?php echo $fetch['location']?>"/>
												<div class="form-group">	
													<label>Filename</label>
													<input name="filename" class="form-control" type="text" value="<?php echo $fetch['filename']?>" required="required"/>
												</div>	
											</div>
										</div>
										<br style="clear:both;"/>
										<div class="modal-footer">
											<button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
											<button class="btn btn-warning" name="edit"><span class="glyphicon glyphicon-save"></span> Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>	
					<?php
						}
						
					?>
				</tbody>
			</table>
		</div>
	</div>	
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>
</html>