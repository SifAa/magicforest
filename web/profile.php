<?php
	require_once('config/config.php');
    require_once('config/db.php');
    include('inc/header.php');
?>
<?php
	// Check For Submit
	if(isset($_POST['delete'])){
		// Get form data
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
		
		$query = "DELETE FROM login WHERE id = {$delete_id}";
		
		if(mysqli_query($conn, $query)){
            header("location:logout.php");
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}

	// Create Query
	$query = "SELECT * FROM login WHERE login.user_name = '$username'";

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$user = mysqli_fetch_assoc($result);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);

?>
<!-- show user information -->
<!-- button to edit information -->
<!-- button to delete user redirects to the logout page -->
        <h1 class="col-12 text-center">Profile</h1>
        <small class="col-12 text-center">Member since <?php echo $user['tm'];?></small>
		<p class="col-12 text-center">Username: <?php echo $username; ?></p>
		<p class="col-12 text-center">Mail: <?php echo $user['mail']; ?></p>
		<hr>
		<form class="col-lg-2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="delete_id" value="<?php echo $user['id']; ?>">
			<input type="submit" name="delete" value="Delete user" class="btn btn-danger">
		</form>
		
		<a href="<?php echo ROOT_URL; ?>editprofile.php" class="btn btn-game col-lg-1">Edit</a>


<?php include('inc/footer.php'); ?>