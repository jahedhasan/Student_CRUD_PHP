<?php

$student_id= $_GET['id'];

require_once './student.php';
$student = new student();
$query_result= $student->select_all_std_by_id($student_id);

$std_info = mysqli_fetch_assoc($query_result);

	if (isset($_POST['submit'])) {
		$student->update_std_info($_POST);
	}

?>






<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Edit Student</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">

   
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
				<h2 class="text-center text-success"><?php //echo $message;?></h2>
				<div class="well">
					 <form class="form-horizontal" action="" method="post">
						  <div class="form-group">
						    <label class="control-label col-sm-2">Student Name</label>
						    <div class="col-sm-10">
						      <input type="text" name="student_name" class="form-control" value="<?php echo $std_info['student_name']; ?>">
						      <input type="hidden" name="student_id" class="form-control" value="<?php echo $std_info['student_id']; ?>">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Phone Number</label>
						    <div class="col-sm-10">
						      <input type="number" name="phone_number" class="form-control" value="<?php echo $std_info['phone_number']; ?>" >
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Email</label>
						    <div class="col-sm-10">
						      <input type="email" name="email" class="form-control" value="<?php echo $std_info['email']; ?>" >
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Address</label>
						    <div class="col-sm-10">
						      <textarea name="address" class="form-control"><?php echo $std_info['address']; ?></textarea>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" name="submit" class="btn btn-success btn-block">Update Student Info</button>
						    </div>
						  </div>
						</form> 
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

