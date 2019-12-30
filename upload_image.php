<?php 
    if (isset($_POST["save_image"])){
        $uri = $_POST["image_URI"];
        file_put_contents("images/snap" . date('YmdHis') . ".png",file_get_contents($uri));
    }
?>;
