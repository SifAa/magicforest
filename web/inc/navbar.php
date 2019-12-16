<?php
  $username = '';
  $userNav = '';

  if(isset($_SESSION['access'])){
    $username = $_SESSION['username'];
        $userNav = "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> $username
        </a> 
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
          <a class='dropdown-item  text-lg-right' href='profile.php'>Profile</a>
          <a class='dropdown-item  text-lg-right' href='logout.php'>Log out</a>
        </div>";
      }else{
        $userNav = "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>User</a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
          <a class='dropdown-item text-lg-right' href='login.php'>Login</a>
          <a class='dropdown-item text-lg-right' href='register.php'>Register</a>
        </div>";
      }
?>

<nav class="row navbar navbar-expand-lg">
  <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Magic maze</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <i class="fas fa-bars"></i>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="<?php echo ROOT_URL; ?>">Home</a>
      <a class="nav-item nav-link" href="<?php echo ROOT_URL; ?>about.php">About</a>
      <?php
      echo $userNav;
      ?>
      </div>

    </div>
</nav>