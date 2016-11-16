<!-- uodate exist user -->
<?php 
// connect to db
$conn = mysql_connect('localhost', 'test_user', 'test_pass');
$dbcon = mysql_select_db('test_auth');
// check connections
 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }

  $Idforupdate = input($_POST["Id"]);
  
  $userName = input($_POST["userName"]);
  $name = input($_POST["name"]);
  $secondname = input($_POST["secondname"]);
  $birth_date = input($_POST["birth_date"]);
  $pass = input($_POST["password"]);
  $password = hash('sha256', $pass);
  $sex = input($_POST["sex"]);
  $privilege = input($_POST["privilege"]);



function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// take user from db and update
$userupdate=mysql_query("UPDATE users SET userName='$userName', name='$name', secondName='$secondname', sex='$sex', privilege='$privilege', birthDate='$birth_date' WHERE userId=".$Idforupdate."");
if ($userupdate == 1){
  header("Location: /users.php"); /* Redirect browser */
  exit(); 
 }else{
 	echo "failed";
 }
?>