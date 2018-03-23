<?php

include("lib/database.php");
include("config/config.php");

$db = new Database(); 
?>

<?php  

if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $age = $_POST['age'];
  $roll = $_POST['roll'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $edit_id = $_GET['edit'];

  $query = "UPDATE student  SET name ='$name', age = '$age', roll = '$roll', fname = '$fname', mname = '$mname' WHERE id='$edit_id'";
  $update = $db->update($query);
  if($update)
  {
    echo "<script>alert('Data update successfully');</script>";
    //header('location:view.php');
  }else
  {
    echo "<script>alert('Data update failed');</script>";
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
<?php
$edit_id = $_GET['edit'];
$query = "SELECT * FROM student WHERE id='$edit_id'";
$edit = $db->select($query);
while ($result = $edit->fetch_assoc()) 
{
?>
  <form action="#" method="POST">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="name" value="<?php echo $result['name']; ?>">
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="text" class="form-control" id="age" name="age" value="<?php echo $result['age']; ?>">
    </div>
    <div class="form-group">
      <label for="roll">Roll no:</label>
      <input type="text" class="form-control" id="roll" name="roll" value="<?php echo $result['roll']; ?>">
    </div>
    <div class="form-group">
      <label for="fname">Father Name:</label>
      <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $result['fname']; ?>">
    </div>
    <div class="form-group">
      <label for="mname">Mother Name:</label>
      <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $result['mname']; ?>">
    </div>
    <div class="form-group">
      <input type="submit" class="form-control btn btn-success" name="submit" value="Update">
    </div>
  </form>
<?php } ?>
</div>

</body>
</html>
