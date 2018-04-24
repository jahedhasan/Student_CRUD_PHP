<?php
	session_start();
	require_once './student.php';
	$student = new student();
	
	

	

	$message="";
	if (isset($_SESSION['message'])) {
		$message=$_SESSION['message'];
		unset($_SESSION['message']);
	}


	if (isset($_GET['status'])) {
			$id= $_GET['id'];
		 	$message=$student->delete_student_info($id);
		}
	$query_result= $student->select_all_std_info();
?>





<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>View</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script>
								
    	function checkDelete(){
    		 var check=confirm("Are you sure to delete this!");
    		 if (check) {
    		 	return true;
    		 }else {
    		 	return false;
    		 }
    	}
    </script>
   
  </head>
  <body>
  	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="add_student.php">Add student</a></li>
	      <li><a href="view_student.php">View student</a></li>
	    </ul>
	  </div>
	</nav>

  	
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="text-center text-success "> <?php echo $message; ?></h2>
				<div class="well">
					<table class="table table-bordered table-hover">
						<tr>
							<th>Serial no</th>
							<th>Student Name</th>
							<th>Phone Number</th>
							<th>Email</th>
							<th>Address</th>
							<th>Action</th>
						</tr>

						<?php $i=1; while ($std_info= mysqli_fetch_assoc($query_result)) { ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $std_info['student_name']; ?></td>
							<td><?php echo $std_info['phone_number']; ?></td>
							<td><?php echo $std_info['email']; ?></td>
							<td><?php echo $std_info['address']; ?></td>
							<td>
								<a href="edit_std.php?id=<?php echo $std_info['student_id']; ?> " class="btn btn-success" title="Edit">
									<span class="glyphicon glyphicon-edit "></span>
								</a>
								<a href="?status=delete&&id=<?php echo $std_info['student_id']; ?>" class="btn btn-danger" title="Delete" onclick=" return checkDelete();">
									<span class="glyphicon glyphicon-trash "></span>
								</a>
							</td>
						</tr>
						<?php $i++; } ?>
					</table>
				</div>
			</div>
			
		</div>	
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>