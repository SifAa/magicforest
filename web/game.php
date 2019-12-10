<?php
	require_once('config/config.php');
    require_once('config/db.php');
    include('inc/game-header.php');
?>

<div class="main row align-items-end">
            <div class="col-12 col-md-6 offset-md-3 mb-4">
                <canvas id="canvas" width="500" height="500"></canvas>
            </div>
            <div class="col-12 col-md-2 mb-4">
                <h3 class="pb-4"><span id="disply-points"></span><img src="media/tiles/strawberry_trnsp.png" alt="strawberry" height="30"></h3>
                <button type="button" class="btn btn-game mb-4" id="gamebtn">Restart</button>
            </div>
        </div>

<?php include('inc/footer.php'); ?>