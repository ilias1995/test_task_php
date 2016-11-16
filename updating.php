<!-- her will going update user note -->
<?php
 // Connect to db 
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
  $title = input($_POST["title"]);
  $body = input($_POST["body"]);
  echo $Idforupdate;


function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// update note in db
$userupdate=mysql_query("UPDATE usernotes SET title='$title', note='$body' WHERE Id=".$Idforupdate."");
if ($userupdate == 1){
  // if ok
  echo "Your Note was updated! Pleas go to the <a href='/users.php'>main page</a>";
 }else{
  // if failed
 	echo "failed";
 }
?>