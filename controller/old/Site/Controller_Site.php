<?php
$URL="";$Owner="";$Email="";$Observation="";$error=0;
if(isset($_POST['Save']))
{
	$URL="";if(isset($_POST['URL']))$URL=trim($_POST['URL']);if($URL==''||strlen($URL)>255)$error++;
	$Owner="";if(isset($_POST['Owner']))$Owner=trim($_POST['Owner']);if($Owner==''||strlen($Owner)>255)$error++;
	$Email="";if(isset($_POST['Email']))$Email=trim($_POST['Email']);if($Email==''||strlen($Email)>30)$error++;
	$Observation="";if(isset($_POST['Observation']))$Observation=trim($_POST['Observation']);
	if($error==0)
	{
		$add_in_db=array("url"=>$URL,"Owner"=>$Owner,"Email"=>$Email,"Observation"=>$Observation,"added"=>$_SESSION['user_id'],"added_date"=>date('Y-m-d'));
		add_in_db($add_in_db,'sites',$connect);
		$_SESSION['message']['Controller_Site']['alert-success']='Site Successfully Added !';
		js_redirect('../../views/Interface/Interface.php');
	}
}
?>