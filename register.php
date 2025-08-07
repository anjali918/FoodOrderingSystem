<?php
include('function.inc.php');
if(isset($_POST['regSubmit'])){
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$conn = new mysqli("localhost","root","","foodordering");
if($conn->connect_error){
    die("Failed to connect:".$conn->connect_error);
}
 else {
		$stmt = $conn->prepare("insert into user_info(FirstName, LastName, Email, Password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "<script> alert('Register Sucessfully');
		</script>";
		redirect('login.php');
		$stmt->close();
		$conn->close();
	}
}
?>
