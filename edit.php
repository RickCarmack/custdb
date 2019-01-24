<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];
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
        echo '<span style="color:red">'.$errorMessage.'</span>';
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        //updating the 'users' table/collection
        $db->users->update(
                        array('_id' => new MongoId($id)),
                        array('$set' => $user)
                    );

        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
} // end if $_POST
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = $db->users->findOne(array('_id' => new MongoId($id)));

$name = $result['name'];
$address = $result['address'];
$city = $result['city'];
$state = $result['state'];
$zipcode = $result['zipcode'];
$phone = $result['phone'];
$age = $result['age'];
$email = $result['email'];
?>
<html>
<head>
  <title>Edit Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Edit Data</h1>
    <a href="index.php"><button type="button" class="btn btn-primary">Home</button></a></br></br>

    <form name="form1" method="post" action="edit.php">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
      </div>
      <div class="form-group">
        <label for="age">Address:</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>">
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" id="city" name="city" value="<?php echo $city;?>">
      </div>
      <div class="form-group">
        <label for="state">State:</label>
        <input type="text" class="form-control" id="state" name="state"value="<?php echo $state;?>">
      </div>
      <div class="form-group">
        <label for="zipcode">ZipCode:</label>
        <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $zipcode;?>">
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>">
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="text" class="form-control" id="age" name="age" value="<?php echo $age;?>">
      </div>
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
      </div>

        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>
  </div>
</body>
</html>
