<?php
$password="";$user="";$show_err="";
if(isset($_POST['Login']))
{
	$user="";if(isset($_POST['User']))$user=trim($_POST['User']);
 	if ($securimage->check($_POST['Solve']) == false)$show_err="Re Solve Equation !";
	else
	{
		include($_SERVER['DOCUMENT_ROOT'].'/model/connect.php');
		include($_SERVER['DOCUMENT_ROOT'].'/model/function.php');
	
		$password="";if(isset($_POST['password']))$password=trim($_POST['password']);		
		$clause = array("email"=>$user,"password"=>$password,"remove"=>"0");
		$wath= array(0=>"id",1=>"email");
		$conectat=select_from_db_clause($wath,'user',$clause,'AND',$connect);
		if(count($conectat)==0)$show_err='Not Conect, Try Again !';
		else
		{
			foreach($conectat as $key=>$value)
			{
				$_SESSION['user']=$value['email'];
				$_SESSION['user_id']=$value['id'];
			}
			$_SESSION['message']['Controller_Login_EasyHost']['alert-success']='Welcome';
			js_redirect('views/Interface/Interface.php');
		}
	}
}
?>