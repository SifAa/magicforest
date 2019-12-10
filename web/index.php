<?php
	require_once('config/config.php');
    require_once('config/db.php');
    include('inc/header.php');
?>
<?php
    if(isset($_SESSION['access'])){
        $gameBtn = "<a class='btn btn-game' href='game.php'>Help the fairy</a>";
    }else{
        $gameBtn = "<a class='btn btn-game' href='login.php'>Login to play</a>";
    }
?>

<div class=" mb-4 pt-4">
<div class="col-12 text-center">
    <h1 class="mb-4 mt-4">Welcome to the magic forest</h1>
</div>
<div class="col-12 text-center">
    <p>Use the arrow keys to help the <span class="fairy">fairy</span> find her way home.</p>
</div>
<div class="col-12 text-center">
    <p>On the way pick up the <span class="fairy">fairy's</span> favourite food, <span class="berry">strawberries</span>.</p>
</div>
<div class="col-12 text-center">
    <p>But look out for the <span class="witchy">wicked witches</span>.</p>
</div>
<div class="col-12 text-center">
    <?php
      echo $gameBtn;
      ?>
</div>
</div>

<?php include('inc/footer.php'); ?>