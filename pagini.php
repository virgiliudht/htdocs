<?php
$page=array();
$page[0]["url"]="../../views/Newsly/Newsly.php";
$page[0]["page_name"]="Create Articles";

$page[1]["url"]="../../views/Newsly/View_Newsly.php";
$page[1]["page_name"]="View Articles";

if(isset($_GET['news']))
{
	$page[2]["url"]="../../views/Newsly/Newsly.php?id=".$_GET['news'];
	$page[2]["page_name"]="Edit This News";
}
?>