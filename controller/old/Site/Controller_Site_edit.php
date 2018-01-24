<?php
$wath=array();
$clause = array("delete"=>"0","id"=>$_GET['id']);
$loop=select_from_db_clause($wath,'sites',$clause,'AND',$connect);
$URL=$loop[0]['url'];$Owner=$loop[0]['Owner'];$Email=$loop[0]['Email'];$Observation=$loop[0]['Observation'];$error=0;

if(isset($_POST['Save']))
{
	if(isset($_POST['URL']))$URL=trim($_POST['URL']);if($URL==''||strlen($URL)>255)$error++;
	if(isset($_POST['Owner']))$Owner=trim($_POST['Owner']);if($Owner==''||strlen($Owner)>255)$error++;
	if(isset($_POST['Email']))$Email=trim($_POST['Email']);if($Email==''||strlen($Email)>30)$error++;
	if(isset($_POST['Observation']))$Observation=trim($_POST['Observation']);
	if($URL!=$loop[0]['url'])
	{
		$clause= array("url"=>$URL,"delete"=>"0");
		if(count_from_db_clause('id','sites',$clause,'AND',$connect)>0)
		{
			$error++;
			$_SESSION['message']['Controller_Site_edit']['alert-danger']=$URL.' <i>Existing Site</i> !';
			js_redirect('../../views/Interface/Site.php?id='.$_GET['id']);
		}
	}
	if($error==0)
	{
		$clause= array("id"=>$_GET['id'],"delete"=>"0");
		$add_in_db=array("url"=>$URL,"Owner"=>$Owner,"Email"=>$Email,"Owner"=>$Owner,"Observation"=>$Observation,"update"=>$_SESSION['user_id'],"update_date"=>date('Y-m-d'));
		update_in_db($add_in_db,'sites',$clause,'AND',$connect);
		$_SESSION['message']['Controller_Site_edit']['alert-success']='Site Successfully Edited !';
		js_redirect('../../views/Interface/Interface.php');
	}
}
?>