<?php 
ini_set("display_errors", "1");
if(isset($_SESSION['user']))
{
	$clause = array("email"=>$_SESSION['user']);
	if(count_from_db_clause('id','user',$clause,'OR',$connect)!=1)
	{		
		js_redirect($_SERVER["DOCUMENT_ROOT"]);
	}
}