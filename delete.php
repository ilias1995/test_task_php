<!-- delete note from db -->
<?php 
// connect to db
$conn = mysql_connect('localhost', 'test_user', 'test_pass');
$dbcon = mysql_select_db('test_auth');
// check conections
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
// delete note from db
$delete=mysql_query("DELETE FROM usernotes WHERE Id=".$Idforupdate."");
if ($delete == 1){
  echo "Note was deleted. Pleas go to the <a href='users.php'>main page</a>";
  exit(); 
 }else{
 	echo "Sometning wrong. Please try again.";
 }
?>