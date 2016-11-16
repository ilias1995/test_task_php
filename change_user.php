<!-- change user form -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
// take user information from db and show in form
$user=mysql_query("SELECT * FROM users WHERE userId=".$Idforupdate."");
while($user_rows=mysql_fetch_assoc($user)){
		$Id = $user_rows['userId'];
		$name = $user_rows['name'];
        $userName = $user_rows['userName'];
        $secondName = $user_rows['secondName'];
        $sex = $user_rows['sex'];
        $privilege = $user_rows['privilege'];
        $birthDate = $user_rows['birthDate'];
        ?>	
        	<div class="col-md-4"></div>
        	<div class="col-md-4">
        	<h2 style="text-align: center;">Update Form</h2>
			<form method="post" action="/user_updating.php" style="margin-top: 10%">
				<div class="form-group">
			        <label for="exampleInputEmail1">Nic Name:</label>
			        <input type="text" name="userName" value="<?php echo $userName; ?>" class="form-control" id="exampleInputEmail1" placeholder="userName">
		   		</div>
				<div class="form-group">
			        <label for="exampleInputEmail1">Name:</label>
			        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" placeholder="Name">
		   		</div>
		   		<div class="form-group">
			        <label for="exampleInputEmail1">Second Name:</label>
			        <input type="text" name="secondname" value="<?php echo $secondName; ?>" class="form-control" id="exampleInputEmail1" placeholder="Second Name">
		   		</div>
		   		<div class="form-group">
			        <label for="exampleInputEmail1">Birth Date:</label>
			        <input type="text" name="birth_date" value="<?php echo $birthDate; ?>" class="form-control" id="exampleInputEmail1" placeholder="Birth Date">
		   		</div>
		   		Gender:
			    <input type="radio" name="sex" <?php if (isset($sex) && $sex==1) echo "checked";?> value="1">Female
			    <input type="radio" name="sex" <?php if (isset($sex) && $sex==2) echo "checked";?> value="2">Male
			    <br><br>
			    Gender: 
        		<input type='radio' name='privilege' <?php if (isset($privilege) && $privilege==1) echo "checked";?> value='1'>Admin
        		<input type='radio' name='privilege' <?php if (isset($privilege) && $privilege==2) echo "checked";?> value='2'>User
        		<br><br>
			  	<input type="hidden" name="Id" value="<?php echo $Id ?>">
			  	<input type="submit" name="submit" class="btn btn-primary" value="Submit">  
			</form>
			</div>
        <?php
	}
?>