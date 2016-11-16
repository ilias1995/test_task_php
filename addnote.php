<!-- add new note -->
<?php
// define variables and set to empty values
$title = $body = "";
// check request post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = input($_POST["title"]);
  $body = input($_POST["body"]);
}
function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// check db connection
$conn = mysql_connect('localhost', 'test_user', 'test_pass');
$dbcon = mysql_select_db('test_auth');

 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }
 // seesion to know about user
 session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from users where userName='$user_check'", $conn);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['userName'];
$query = "INSERT INTO usernotes(userName,title,note) VALUES('$login_session', '$title', '$body')";
$res = mysql_query($query);
if ($res == 1){
  echo "note was added pleas got to <a href='/users.php'>main page</a>"; /* Redirect browser */
}else{
  header("Location: /addnote.html");
}
?>