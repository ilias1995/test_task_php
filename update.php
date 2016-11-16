<!-- update user note form -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php 
// connect db
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
// take current note from db
$user=mysql_query("SELECT * FROM usernotes WHERE Id=".$Idforupdate."");
while($user_rows=mysql_fetch_assoc($user)){
		$Id = $user_rows['Id'];
		$title = $user_rows['title'];
        $body = $user_rows['note'];
        ?>	
        <!-- form for update -->
        	<div class="col-md-4"></div>
        	<div class="col-md-4">
        	<h2 style="text-align: center;">Update Form</h2>
			<form method="post" action="/updating.php" style="margin-top: 10%">
				<div class="form-group">
			        <label for="exampleInputEmail1">Title:</label>
			        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" id="exampleInputEmail1" placeholder="Nic name">
		   		</div>
		   		<div class="form-group">
			        <label for="exampleInputEmail1">Body:</label>
			        <textarea name="body" class="form-control" id="exampleInputEmail1" placeholder="Name"><?php echo $body; ?></textarea>
		   		</div>
			  	<input type="hidden" name="Id" value="<?php echo $Id ?>">
			  	<input type="submit" name="submit" class="btn btn-primary" value="Submit">  
			</form>
			</div>
        <?php
	}
?>