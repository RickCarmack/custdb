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
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
    $user = array (
                'name' => $_POST['name'],
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
</body>
</html>
