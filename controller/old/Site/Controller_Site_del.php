<?php
if(isset($_GET['del']))
{
	$clause= array("id"=>$_GET['del'],"delete"=>"0");
	$add_in_db=array("delete"=>'1');
	update_in_db($add_in_db,'sites',$clause,'AND',$connect);
	$_SESSION['message']['Controller_Users_delete']['alert-danger']='Site Successfully Removed !';
	js_redirect('../../views/Interface/Interface.php');
}
?>