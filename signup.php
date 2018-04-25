<?php include('server.php'); ?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css?family=Oswald:400,600');

</style>
<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
<?php include 'navigation.html'?>


<?php
// define variables and set to empty values
$firstname =$lastname= $email = $gender =$role = $comment = $password = "";

//first name

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Firstname is required";
  } 
  else {
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed";
    }
  }
}

//Lastname
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Lastname is required";
  } 
  else {
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed";
    }
  }
}


  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["pass"])) {
    $pass = "";
  } 
  else {
    $pass = test_input($_POST["pass"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
  }


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } 
  else {
    $gender = test_input($_POST["gender"]);
  }
 if (empty($_POST["role"])) {
    $roleErr = "Role is required";
  } 
  else {
    $role = test_input($_POST["role"]);
  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2 id="header">Sign Up Form</h2>


<p id="req"><span  class="error">* required field.</span></p>

<div class="input-group">

<form id="formcss" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <label>Firstname: </label><input type="text" name="firstname" value="<?php echo $firstname;?>">
  <span class="error">* <?php echo $firstnameErr;?></span>
  
  <label>Lastname: </label><input type="text" name="lastname" value="<?php echo $lastname;?>">
  <span class="error">* <?php echo $lastnameErr;?></span>
 
  <label>E-mail: </label><input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
 
  <label>Password: </label><input type="Password" name="Password" value="<?php echo $password;?>">
  <span class="error"><?php echo $passErr;?></span>

  <label>Gender:</label>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male

  <br>
  <span class="error">* <?php echo $genderErr;?></span>
  

   <label>Role:</label>
  <input type="radio" name="role" <?php if (isset($role) && $role=="instructor") echo "checked";?> value="instructor">Instructor
  <input type="radio" name="role" <?php if (isset($role) && $role=="learner") echo "checked";?> value="learner">Learner<br>
  <span class="error">* <?php echo $roleErr;?></span>

  <input id="btn" type="submit" name="Register" value="Register">  
<p>Already a member? <a href="login.php">Log in </a>
</p>
</form>
</div>

    <?php include 'footer.html' ?>
</body>
</html>