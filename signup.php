<!DOCTYPE html>
<html>
<head>
	<title>Student Register</title>
</head>
<link rel="stylesheet" href="signin.css">
<body>
	<div class="registrationbox">
		<h1>Student Register</h1>
		<form action="signup.php" method="post">
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
			<!-- <input type="number" name="phone" placeholder="Phone" required=""> -->
			<p>Region</p>
            <br>
            <select name="region">
                <!-- <option value="">Select</option> -->
                <option value="Dhanmondi">Dhanmondi</option>
                <option value="Gulshan">Gulshan</option>
                <option value="Farmgate">Farmgate</option>
                <option value="Lalmatia">Lalmatia</option>
                <option value="Mohammadpur">Mohammadpur</option>
                <option value="Moghbazar">Moghbazar</option>
            </select>
            <br>
            <p>Address</p>
			<input type="text" name="address" placeholder="Address" required="">
			<p>Curriculum</p>
            <br>
            <select name="curriculum">
                <option value="English Version">English Version</option>
                <option value="English Medium">English Medium</option>
                <option value="Bangla Medium">Bangla Medium</option>
            </select>
            <br>
			<p>Class</p>
			<input type="text" name="class" placeholder="Class" required="">
			<br>
			<input type="submit" name="submit" value="Sign Up"><br>
			
			<p>Already have an account ?     </p>
		<a href="signin.php">Sign In</a>

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
$region=mysqli_real_escape_string($conn,$_POST['region']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$curriculum=mysqli_real_escape_string($conn,$_POST['curriculum']);
$class=mysqli_real_escape_string($conn,$_POST['class']);


$sql = "SELECT * FROM student WHERE username='$username'";
$result=$conn->query($sql);


if(!$row = mysqli_fetch_array($result))
{
	$sql= "INSERT INTO `student` (`username`, `password`, `firstname`, `lastname`, `phone`, `region`, `address`, `curriculum`, `class`) VALUES ('$username','$password','$firstName','$lastName','$phone','$region','$address','$curriculum','$class')";

	$result=$conn->query($sql);

	header("Location:signin.php");
}
else
{
	echo '<script type="text/javascript"> alert("Error : Username already exists") </script>';

	// header("Location:signup.html");
}

}

 ?>