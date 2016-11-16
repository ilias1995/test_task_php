<!-- Check authentications if user is exist go to main page if not exist it will return login page -->
<?php
session_start(); // Starting Session
$nicname = $password = "";
$pass = input($_POST["password"]);
$password = hash('sha256', $pass);
$nicname = input($_POST["nicname"]);

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// connect to db
$conn = mysql_connect('localhost', 'test_user', 'test_pass');
$dbcon = mysql_select_db('test_auth');

 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }
 // connect to the database to know user exist are no.
$query = "SELECT *	 FROM users WHERE userName='$nicname' and userPass='$password'";
$result = mysql_query($query);
$count = mysql_num_rows($result);
if($count == 1) {
	// if user exist will go to users page
 	$_SESSION['login_user'] = $nicname;
 	header("location: users.php");
}else {
	// if user not exist will error
 	$error = "Your Login Name or Password is invalid";
 	echo $error;
}
?>