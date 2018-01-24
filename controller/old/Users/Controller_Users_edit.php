<?php
$wath=array();
$clause = array("remove"=>"0","id"=>$_GET['id']);
$loop=select_from_db_clause($wath,'user',$clause,'AND',$connect);
$Email=$loop[0]['email'];$Password=$loop[0]['password'];$error=0;
if(isset($_POST['Save']))
{
	if(isset($_POST['Email']))$Email=trim($_POST['Email']);if($Email==''||strlen($Email)>255)$error++;
	if(isset($_POST['Password']))$Password=trim($_POST['Password']);if($Password==''||strlen($Password)>30)$error++;
	if($Email!=$loop[0]['email'])
	{
		$clause= array("email"=>$Email,"remove"=>"0");
		if(count_from_db_clause('id','user',$clause,'AND',$connect)>0)
		{
			$error++;
			$_SESSION['message']['Controller_User_edit']['alert-danger']=$Email.' <i>Existing Email</i> !';
			js_redirect('../../views/Users/Users.php?id='.$_GET['id']);
		}
	}
	if($error==0)
	{
		$clause= array("id"=>$_GET['id'],"remove"=>"0");
		$add_in_db=array("email"=>$Email,"password"=>$Password);
		update_in_db($add_in_db,'user',$clause,'AND',$connect);
		if($_SESSION['user_id']==$_GET['id'])js_redirect('../../controler/logout.php');
		else
		{
			$_SESSION['message']['Controller_Users_edit']['alert-success']='User Successfully Edited !';
			js_redirect('../../views/Users/Users_List.php');
		}
	}
}
?>