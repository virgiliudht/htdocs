<?php
if(isset($_GET['del']))
{
	$clause= array("id"=>$_GET['del'],"remove"=>"0");
	$add_in_db=array("remove"=>'1');
	update_in_db($add_in_db,'user',$clause,'AND',$connect);
	if($_SESSION['user_id']==$_GET['del'])js_redirect('../../controler/logout.php');
	else
	{
		$_SESSION['message']['Controller_Users_delete']['alert-success']='User Successfully Removed !';
		js_redirect('../../views/Users/Users_List.php');
	}
}
?>