<?php
if(isset($_POST['speed_analyze']))
{
	include('../../model/Services_WTF_Test.php');
	$speed=new Services_WTF_Test('virgiliudht@gmail.com','be737990ce5b76f7bc841f7a76a5c91d');
	$data['url']=$loop[0]['url'];
	$speed->test($data);

	$error=$speed->error();
	$speed->get_results();

	$results = $speed->results();

	if($error=='')
	{
		$wath=array();
		foreach ($results as $id_speed => $value)if($id_speed!='report_url'&&$value!='')
		{
			$_SESSION['message']['Controller_Grafic']['alert-success']='Speed Analysis Successfully Completed For '.$loop[0]['url'].'!';
			$wath['id_site']=$_GET['gr'];
			$wath['id_speed']=$id_speed;
			$wath['value']=$value;
			$wath['date']=date('Y-m-d H:i:s');
			add_in_db($wath,'site_speed',$connect);
		}
		
	}
	else $_SESSION['message']['Controller_Grafic']['alert-danger']='For '.$loop[0]['url'].' you have error: <i>'.$error.'</i>';
	js_redirect('../../views/Interface/Grafic.php?gr='.$_GET['gr']);
}
?>