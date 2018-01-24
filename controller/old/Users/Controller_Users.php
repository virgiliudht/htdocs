<?php
$Email="";$Password="";$error=0;
if(isset($_POST['Save']))
{
	$Email="";if(isset($_POST['Email']))$Email=trim($_POST['Email']);if($Email==''||strlen($Email)>255)$error++;
	$Password="";if(isset($_POST['Password']))$Password=trim($_POST['Password']);if($Password==''||strlen($Password)>30)$error++;
	$clause= array("email"=>$Email,"remove"=>"0");
	if(count_from_db_clause('id','user',$clause,'AND',$connect)>0)
	{
		$error++;
		$_SESSION['message']['Controller_Site']['alert-danger']=$Email.' Existing Email !';
	}
	if($error==0)
	{
		$add_in_db=array("email"=>$Email,"password"=>$Password);
		add_in_db($add_in_db,'user',$connect);
		$_SESSION['message']['Controller_Users']['alert-success']='User Successfully Added !';
		js_redirect('../../views/Users/Users_List.php');
	}
}
?>