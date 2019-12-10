<?php
	require_once('config/config.php');
  require_once('config/db.php');
  include('inc/header.php');
?>

<?php

$output = "";

  if(isset($_POST['submit'])){

    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $salt = "ThisIs" . $pass . "DifferentOnline";
    $hashed = hash('sha512', $salt);

    $sql = "SELECT * FROM login WHERE user_name = '$userName' AND pass = '$hashed'";

    $result = mysqli_query($conn, $sql) or die("Query virker ikke!". $sql);

    if(mysqli_num_rows($result) == 1){

      $_SESSION['access'] = "access";
      $_SESSION['username']= $userName;
      header("location:index.php");

      $output = "You are logged in";
    } else {
      $output = "Wrong login";
    }

  }

?>

  <h1 class="col-12 text-center">Login</h1>
    <div class="card col-sm-10 col-md-8 col-lg-5 mb-4">
      <form method="POST" action="login.php" class="card-body needs-validation" novalidate>
	      <div class="form-group">
		      <label for="username">Username</label>
		      <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <a href="<?php echo ROOT_URL; ?>register.php">New user</a>
        <button type="submit" name="submit" class="float-right btn btn-game mb-4">Login</button>
        <h6 class="mt-2 ml-2 berry"><?= $output ?></h6>
        </form>
    </div>


<?php include('inc/footer.php'); ?>