<?php
//error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
require_once './controller/ValidAuth.php' 
?>

<header>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="home.php"><i class="lni lni-bmw logo"></i></a>
            <div class="d-flex justify-content-between align-items-center">
                Olá, <i class="lni lni-user"><?=$_SESSION['nome'];?></i>
            </div>
        </div>
    </div>
</header>

