<!DOCTYPE html>
<html>
<head>
	<title>Teacher Register</title>
</head>
<link rel="stylesheet" href="signin.css">
<body>
	<div class="registrationbox">
		<h1>Teacher Register</h1>
		<form action="tsignup.php" method="post">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required="">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter 6 digit password" minlength="6" required="">
			<p>First Name</p>
			<input type="text" name="firstName" placeholder="First Name" required="">
			<p>Last Name</p>
			<input type="text" name="lastName" placeholder="Last Name" required="">
			<p>Phone</p>
			<input type="tel" name="phone" placeholder="Enter 11 digit phone number. Eg:01XXXXXXXXX" pattern="[01]{2}[0-9]{9}" required="">
			<p>Institution</p>
            <br>
            <select name="institution">
                <<option value="BUET">BUET</option>
                <option value="DU">DU</option>
                <option value="NSU">NSU</option>
                <option value="BRAC">BRAC</option>
                <option value="DMC">DMC</option>
                <option value="AUST">AUST</option>
            </select>
            <br>
            <p>Address</p>
			<input type="text" name="address" placeholder="Address" required="">
			<input type="submit" name="submit" value="Sign Up"><br>
			
			<p>Already have an account ?     </p>
		<a href="tsignin.php">Sign In</a>

		</form>
	</div>


</body>
</html>

<?php 

if (isset($_POST["submit"])){
include 'dbh.php';

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$firstName=mysqli_real_escape_string($conn,$_POST['firstName']);
$lastName=mysqli_real_escape_string($conn,$_POST['lastName']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$institution=mysqli_real_escape_string($conn,$_POST['institution']);
$address=mysqli_real_escape_string($conn,$_POST['address']);

$sql = "SELECT * FROM teacher WHERE username='$username'";
$result=$conn->query($sql);


if(!$row = mysqli_fetch_array($result))
{
	$sql= "INSERT INTO `teacher` (`username`, `password`, `firstname`, `lastname`, `phone`, `institution`, `address`) VALUES ('$username','$password','$firstName','$lastName','$phone','$institution','$address')";

	$result=$conn->query($sql);

	header("Location:tsignin.php");
}
else
{
	echo '<script type="text/javascript"> alert("Error : Username already exists") </script>';

	// header("Location:signup.html");
}

}
 ?>