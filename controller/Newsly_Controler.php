<?php
$hostname="localhost"; $username="root"; $password=""; $database="newsly"; 

$connect = new mysqli($hostname,$username,$password,$database) or die('I CAN NOT CONNECT TO BD');


$sql="INSERT INTO news(News_Title,News_Body,id_Category,id_Tag,Add_Date) VALUES (?,?,?,?,?)";

$stmt = $connect->prepare($sql);

$News_Title = $_POST['News_Title'];
$News_Body = $_POST['News_Body'];
$id_Category = 1;
$id_Tag = 1;
$Add_Date = date('Y-m-d');

$stmt->bind_param("sssss", htmlspecialchars($News_Title), htmlspecialchars($News_Body), htmlspecialchars($id_Category), htmlspecialchars($id_Tag), htmlspecialchars($Add_Date));

$stmt->execute();
$stmt->close();

$connect->close();
?>