<?php

include("lib/database.php");
include("config/config.php");

$db = new Database();

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
  <h2>Hover Rows</h2>
  <p><a href="index.php">Add Student</a></p>            
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>S.no</th>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Roll</th>
        <th>Fname</th>
        <th>Mname</th>
        <th colspan="2" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php  
      if(isset($_GET['del']))
      {
      $delete_id = $_GET['del'];
      $query = "DELETE FROM student WHERE id = '$delete_id'";
      $delete = $db->delete($query);
      if($delete)
      {
        echo "<script>alert('Data deleted');</script>";
      }
      }
      ?>
      <?php 
        $query = "SELECT * FROM student";
        $view = $db->select($query);
        $i = 0;
        if($view)
        {
          while($result = $view->fetch_assoc())
          {
            $i = $i+1;     
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $result['id']; ?></td>
        <td><?php echo $result['name']; ?></td>
        <td><?php echo $result['age']; ?></td>
        <td><?php echo $result['roll']; ?></td>
        <td><?php echo $result['fname']; ?></td>
        <td><?php echo $result['mname']; ?></td>
        <td>
          <a href="view.php?del=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a>
        </td>
        <td>
          
          <a href="edit.php?edit=<?php echo $result['id']; ?>" class="btn btn-success">Update</a>
        </td>
      </tr>
      <?php }} ?>
    </tbody>
  </table>
</div>

</body>
</html>
