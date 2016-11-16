<!-- delete user from db -->
<?php 
// connect to db
$conn = mysql_connect('localhost', 'test_user', 'test_pass');
$dbcon = mysql_select_db('test_auth');
// check connection
 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }

$Idforupdate = input($_POST["Id"]);

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// take user from db and delete
$delete=mysql_query("DELETE FROM users WHERE userId=".$Idforupdate."");
if ($delete == 1){
  header("Location: /users.php"); /* Redirect browser */
  exit(); 
 }else{
 	echo "Sometning wrong. Please try again.";
 }
?>