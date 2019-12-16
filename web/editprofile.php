<?php
	require_once('config/config.php');
    require_once('config/db.php');
    include('inc/header.php');
?>

<?php
// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $update_tm = mysqli_real_escape_string($conn, $_POST['update_tm']);
		$mail = mysqli_real_escape_string($conn, $_POST['email']);
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
            
            $query = "UPDATE login SET
					mail = '$mail',
					pass = '$hashed',
                    tm = '$update_tm'
						WHERE id = $update_id";
		
		    if(mysqli_query($conn, $query)){
			    header("location:profile.php");
		    } else {
			    echo 'ERROR: '. mysqli_error($conn);
            }
        }
	}

	// Create Query
	$query = "SELECT * FROM login WHERE login.user_name = '$username'";

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$user = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<h1 class="col-12 text-center mt-4 mb-4">Edit profile</h1>
<div class="col-sm-8 col-md-6 col-lg-4 mb-3">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="checkform" onSubmit="return checkform()" class="needs-validation" novalidate>
        <div class="form-group">
			<label for="email">Mail</label>
			<input type="email" name="email" class="form-control" id="email" value="<?php echo $user['mail']; ?>" required>
		</div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="pass1" required>
        </div>
        <div class="form-group">
            <label for="password2">Repeat password</label>
            <input type="password" class="form-control" name="password2" id="pass2" required>
        </div>
        <input type="hidden" name="update_id" value="<?php echo $user['id']; ?>">
        <input type="hidden" name="update_tm" value="<?php echo $user['tm']; ?>">
        <input type="submit" name="submit" value="Submit" class="float-right btn btn-game">
	</form>
</div>


<?php include('inc/footer.php'); ?>