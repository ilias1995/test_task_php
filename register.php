<!-- user registration form -->
<!DOCTYPE HTML>  
<html>
<head>
<title>Registration</title>
<style>
.error {color: #FF0000;}
</style>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>  
<div class="col-md-4"></div>
<div class="col-md-4">
<h2 style="text-align: center;">Registration form</h2>
<!-- registration html form -->
  <form method="post" action="/register.php" style="margin-top: 10%">  
    <div class="form-group">
        <label for="exampleInputEmail1">Nic name:</label>
        <input value="<?php echo $userName; ?>" type="text" name="userName" class="form-control" id="exampleInputEmail1" placeholder="Nic name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Name:</label>
        <input value="<?php echo $name; ?>" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Second Name:</label>
        <input value="<?php echo $secondname; ?>" type="text" name="secondname" class="form-control" id="exampleInputEmail1" placeholder="Second Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Password:</label>
        <input value="<?php echo $pass; ?>" type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Birth Date:</label>
        <input value="<?php echo $birth_date; ?>" type="text" name="birth_date" class="form-control" id="exampleInputEmail1" placeholder="Birth Date">
    </div>
    Gender:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="2">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="1">Male
    <br><br>
    Gender: 
    <input type='radio' name='privilege' value='1'>Admin
    <input type='radio' name='privilege' value='2'>User
    <br><br>
    <input type="submit" class="btn btn-primary" name="submit" value="Register">  
  </form>
</div>
</body>
</html>
<?php
// define variables and set to empty values
$res = "";
$name = $userName = $email = $gender = $birth_date = $password = $secondname = "";

// check request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // if request method post we will take values from form
  $userName = input($_POST["userName"]);
  $name = input($_POST["name"]);
  $secondname = input($_POST["secondname"]);
  $birth_date = input($_POST["birth_date"]);
  $pass = input($_POST["password"]);
  $password = hash('sha256', $pass);
  $gender = input($_POST["gender"]);
  $privilege = input($_POST["privilege"]);
  // if something wrong will show this error message
  if($res==0){
    echo "<p style='color:red'>something wrong! pleas check form. May be Nic name what you want use is alredy exis, pleas change it.</p>";
  }
}

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
 // add user to db
 $query = "INSERT INTO users(userName,userPass,name,secondName,sex,privilege,birthDate) VALUES('$userName','$password','$name','$secondname','$gender','$privilege','$birth_date')";
 $res = mysql_query($query);
 echo $res;
 if ($res == 1){
  // check registration if ok will return login page
  header("Location: /"); /* Redirect browser */
  exit(); 
 }
?>