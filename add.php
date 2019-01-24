<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
    $user = array (
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'zipcode' => $_POST['zipcode'],
                'phone' => $_POST['phone'],
                'age' => $_POST['age'],
                'email' => $_POST['email']
            );

    // checking empty fields
    $errorMessage = '';
    foreach ($user as $key => $value) {
        if (empty($value)) {
            $errorMessage .= $key . ' field is empty<br />';
        }
    }

    if ($errorMessage) {
        // print error message & link to the previous page
        echo "<div class='container'>";
        echo '<h4><span style="color:red">'.$errorMessage.'</span></h4>';
        echo "<br/><a href='javascript:self.history.back();'><button type=\"button\" class=\"btn btn-primary\">Go Back</button></a>";
        echo "</div>";
    } else {
        //insert data to database table/collection named 'users'
        $db->users->insert($user);

        //display success message
        echo "<div class='container'>";
        echo "<h4><font color='green'>Data added successfully.</h4>";
        echo "<br/><a href=\"index.php\"><button type=\"button\" class=\"btn btn-primary\">Home</button>";
        echo "</div>";
    }
}
?>
<html>
<head>
  <title>Add Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <h1>Add Data</h1>
    <a href="index.php"><button type="button" class="btn btn-primary">Home</button></a></br></br>

    <form action="add.php" method="post" name="form1">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="address" class="form-control" id="address" name="address">
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <input type="city" class="form-control" id="city" name="city">
      </div>
      <div class="form-group">
        <label for="state">State:</label>
        <input type="state" class="form-control" id="state" name="state">
      </div>
      <div class="form-group">
        <label for="zipcode">ZipCode:</label>
        <input type="zipcode" class="form-control" id="zipcode" name="zipcode">
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" class="form-control" id="phone" name="phone">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="text" class="form-control" id="age" name="age">
      </div>
      <div class="checkbox">
        <label><input type="checkbox">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary" name="Submit">Add</button>
    </form>

  </div>
</body>
</html>
