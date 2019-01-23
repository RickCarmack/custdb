<?php
//including the database connection file
include_once("config.php");

// select data in descending order from table/collection "users"
$result = $db->users->find()->sort(array('name' => 1));
?>

<html>
<head>
  <title>Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

<h1>Customer Data</h1>

<a href="add.html"><button type="button" class="btn btn-primary">Add New Data</button></a></br></br>

    <table  class="table table-striped" width='80%'>

    <tr>
        <td>Name</td>
        <td>Age</td>
        <td>Email</td>
        <td>Update</td>
    </tr>
    <?php
    foreach ($result as $res) {
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['age']."</td>";
        echo "<td>".$res['email']."</td>";
        echo "<td><a href=\"edit.php?id=$res[_id]\"><button type=\"button\" class=\"btn btn-warning\">Edit</button></a> | <a href=\"delete.php?id=$res[_id]\"><button type=\"button\" class=\"btn btn-danger\">Delete</button></a></td>";
    }
    ?>
    </table>
</div>
</body>
