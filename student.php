
<?php


/**
* 
*/
/**
* 
*/

class student{
		public $connect;
	public function __construct(){
		
		$host='localhost';
			$user='root';
			$password='';
			$db_name='test';
			$this->connect= mysqli_connect($host, $user, $password, $db_name );

			if (!$this->connect) {
				die('connect error!'.mysqli_error($this->connect));
			}
	}


	public function save_std_info($data){
				$sql= "INSERT INTO student_info (student_name, phone_number, email, address) VALUES ('$data[student_name]', '$data[phone_number]', '$data[email]', '$data[address]')";

				if (mysqli_query($this->connect, $sql)) {
				   $message= 'student info save successfully';
				   return $message;
				}else{
					die('Query fail'.mysqli_error($this->connect));
				}
					
				
			}


		public function select_all_std_info(){
			$sql= 'SELECT * from student_info';
			if (mysqli_query($this->connect, $sql)) {
				$query_result= mysqli_query($this->connect, $sql);
				
					return $query_result;
			}else{
				die( 'Query error!!'.mysqli_error($this->connect));
			}
		}

		public function select_all_std_by_id($student_id){
			$sql= "SELECT * from student_info WHERE student_id = '$student_id'";
			if (mysqli_query($this->connect, $sql)) {
				$query_result= mysqli_query($this->connect, $sql);
					return $query_result;
			}else{
				die( 'Query error!!'.mysqli_error($this->connect));
			} 
		}


		public function update_std_info($data){
			$sql="UPDATE `student_info` SET `student_name`='$data[student_name]',`phone_number`='$data[phone_number]',`email`='$data[email]',`address`='$data[address]' WHERE student_id = '$data[student_id]' ";
			if (mysqli_query($this->connect, $sql)) {
					session_start();
					$_SESSION['message']="Student info update successfully";
				header('Location: view_student.php');
					//$msg= 'Student info update successfully';

			}else{
				die( 'Query error!!'.mysqli_error($this->connect));
			} 
		}

		public function delete_student_info($id){
			$sql="DELETE from student_info WHERE student_id='$id'";
			if (mysqli_query($this->connect, $sql)) {
					$message="Student info delete successfully";
					return $message;
			}else{
				die( 'Query error!!'.mysqli_error($this->connect));
			} 
		}





	}













?>