<?php
@session_start();

$hostname="localhost"; $username="root"; $password=""; $database="newsly"; 

$connect = new mysqli($hostname,$username,$password,$database) or die('I CAN NOT CONNECT TO BD');
?>