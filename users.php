<!-- list of registrated user -->
<?php
// connect to db
$conn = mysql_connect('localhost', 'test_user', 'test_pass');
$dbcon = mysql_select_db('test_auth');

 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }

// we use session to know user is in are not.
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from users where userName='$user_check'", $conn);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['userName'];
$privilege =$row['privilege'];
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="col-md-12" style="background: black; height: 60px">
	<div class="col-md-10">
		<?php
			echo "<h3 style='color: white;'> Welkom ".$login_session."</h3>";
		?>
	</div>
	<a href="/addnote.html" class="btn btn-default" style="margin-top: 1%">Add Note</a>
	<a href="/register.php" class="btn btn-default" style="margin-top: 1%">Add user</a>
</div>
<div class="col-md-1"></div>
<div class="col-md-10" data-example-id="simple-table"> 
	<table class="table"> 
		<caption>Users</caption> 
		<thead> 
			<tr> 
				<th>#</th> 
				<th>UserName</th>
				<th>Name</th>
				<th>SecondName</th> 
				<th>Status</th>  
			</tr> 
		</thead> 
		<tbody> 
			<?php
				if(!isset($login_session)){
					// we check if user not in session will be return login page
					mysql_close($conn); // Closing Connection
					header('Location: index.html'); // Redirecting To Home Page
				}else{
					// check user privilege
					if($privilege == 1){
						// if user is admin this page fill work
						$all_users=mysql_query("SELECT * FROM users");
						while($user_rows=mysql_fetch_assoc($all_users)){
						     $Id = $user_rows['userId'];
						     $name = $user_rows['name'];
						     $user_name = $user_rows['userName'];
						     $second_name = $user_rows['secondName'];
						     $status = $user_rows['privilege'];
						     echo '<tr>';
						     echo  '<td>'.$Id.'</td>';
						     echo '<td>'.$user_name.'</td>';
						     echo  '<td>'.$name.'</td>';
						     echo '<td>'.$second_name.'</td>';
						     if ($status == 1){
						     	echo '<td>admin</td>';
						     }else{
						     	echo '<td>user</td>';
						     }
						     if ($login_session == $user_name){
					     		echo "<td> <form method='post' action='change_user.php'><input name='Id' type='hidden' value='".$Id."'/><input type='submit' class='btn btn-primary' value='Change User'></form></td>";
						     	echo "<td> <form method='post' action='notes.php'><input name='user_name' type='hidden' value='".$user_name."'/><input type='submit' class='btn btn-primary' value='Notes'></form></td>";
						     	echo "<td> <form method='post' action='user_delete.php'><input name='Id' type='hidden' value='".$Id."'/><input type='submit' class='btn btn-danger' value='Delete' disabled></form></td>";
						     }else{
						     	echo "<td> <form method='post' action='change_user.php'><input name='Id' type='hidden' value='".$Id."'/><input type='submit' class='btn btn-primary' value='Change User'></form></td>";
						     	echo "<td> <form method='post' action='notes.php'><input name='user_name' type='hidden' value='".$user_name."'/><input type='submit' class='btn btn-primary' value='Notes'></form></td>";
						     	echo "<td> <form method='post' action='user_delete.php'><input name='Id' type='hidden' value='".$Id."'/><input type='submit' class='btn btn-danger' value='Delete'></form></td>";

						     }
						 
						     echo '</tr>';
						 }
					}else{
						// if user not admin will return notes page for this user
						header("Location: /notes.php"); /* Redirect browser */
  						exit(); 
						}
					}
			?>
		</tbody> 
	</table> 
</div>