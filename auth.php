<?php

session_start();
if( isset($_SESSION['usuario']) != "overhaul") {
    header("location: login.php");
}

?>