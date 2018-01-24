<?php 
//SE DISTRUGE SESIUNEA
session_start();
session_unset();
session_destroy();
header("location:../index.php");
?>