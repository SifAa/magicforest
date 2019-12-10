<?php
	require_once('config/config.php');
    require_once('config/db.php');
    include('inc/header.php');
?>

<?php

if(isset($_POST['submit'])){

    // Mysqli_real_escape_string... renser for karakterer som kan bruges til SQL angreb
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['password']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['password2']);

    // Stemmer de to passwords overens med hinanden
    if($pass1 === $pass2){
        $flag = true;
    }

    if($flag == true){

        // salter password, pakker det ind i tilfældige værdier
        $salt = "ThisIs" . $pass1 . "DifferentOnline";

        // kryptere, gør det hele uforståeligt
        $hashed = hash('sha512', $salt);

        $sql = "INSERT INTO `login` (`id`, `mail`, `user_name`, `pass`, `tm`) VALUES (NULL, '$email','$userName', '$hashed', CURRENT_TIMESTAMP);";

        $result = mysqli_query($conn, $sql) or die ("Query virker overhovedet ikke");

        // starter session
        $_SESSION['access'] = "access";
        $_SESSION['username']= $userName;
        header("location:index.php");
    }

}

?>
    <h1 class="col-12 text-center mt-4 mb-4">Register new user</h1>
    <div class="card col-sm-10 col-md-8 col-lg-6 mb-3">
        <form method="POST" action="register.php" id="checkform" onSubmit="return checkform()" class="card-body needs-validation" novalidate>
            <div class="form-group">
		      <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
             <label for="username">Username</label>
		     <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="form-group">
             <label for="password">Password</label>
             <input type="password" class="form-control" name="password" id="pass1" required>
            </div>
            <div class="form-group">
             <label for="password2">Repeat password</label>
             <input type="password" class="form-control" name="password2" id="pass2" required>
            </div>
            <a href="https://gdpr-info.eu" target="_blank">Privacy policy</a>
            <button type="submit" name="submit" class="float-right btn btn-game mb-4">Register</button>

        </form>
    </div>


<?php include('inc/footer.php'); ?>