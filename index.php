<?php

include("lib/database.php");
include("config/config.php");

$db = new Database(); 
?>

<?php  

if(isset($_POST['submit']))
{
  $name   = $_POST['name'];
  $age    = $_POST['age'];
  $roll   = $_POST['roll'];
  $fname  = $_POST['fname'];
  $mname  = $_POST['mname'];
//name field validatiom
  $error_name = '';
  if(empty($name))
  {
    $error_name = "Name field is empty";
  }
//age field validation
  $error_age = '';
  if(empty($age))
  {
    $error_age = "Age field is empty";
  }
//roll field validation
  $error_roll = '';
  if(empty($roll))
  {
    $error_roll = "Roll field is empty";
  }
//fname field validation
  $error_fname = '';
  if(empty($fname))
  {
    $error_fname = "Father name field is empty";
  }
//mname field validation
  $error_mname = '';
  if(empty($mname))
  {
    $error_mname = "Mother name field is empty";
  }

  if($name == '' || $age == '' || $roll == '' || $fname == '' || $mname == '' )
  {
    $error = "Field empty";
  }else
  {

    $query = "INSERT INTO student(name, age, roll, fname, mname) VALUES('$name','$age','$roll', '$fname','$mname');";
    $result = $db->insert($query);
    if($result)
    {
      echo "<script>alert('Data is inserted successfully');</script>";
    }else
    {
      echo "<span style = 'color:red;'> Data is not inserted </span>";
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">Student Management</h2>
  <p class="text-center">The form below contains two input elements; one of type text and one of type password:</p>
  <p class="text-center"><a href="view.php">View Student Data</a></p>

  <form action="#" method="POST">
    <h2><?php
    if(isset($error))
    {
     //echo $error; 
    }
    ?></h2>
    <div class="form-group">
      <p style="color: red;"><?php if(isset($error_name)){echo $error_name;} ?></p>
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="name">
    </div>
    <div class="form-group">
      <p style="color: red;"><?php if(isset($error_age)){echo $error_age;} ?></p>
      <label for="age">Age:</label>
      <input type="text" class="form-control" id="age" name="age">
    </div>
    <div class="form-group">
      <p style="color: red;"><?php if(isset($error_roll)){echo $error_roll;} ?></p>
      <label for="roll">Roll no:</label>
      <input type="text" class="form-control" id="roll" name="roll">
    </div>
    <div class="form-group">
      <p style="color: red;"><?php if(isset($error_fname)){echo $error_fname;} ?></p>
      <label for="fname">Father Name:</label>
      <input type="text" class="form-control" id="fname" name="fname">
    </div>
    <div class="form-group">
      <p style="color: red;"><?php if(isset($error_mname)){echo $error_mname;} ?></p>
      <label for="mname">Mother Name:</label>
      <input type="text" class="form-control" id="mname" name="mname">
    </div>
    <div class="form-group">
      <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit">
    </div>
  </form>

</div>

</body>
</html>
