<?php
//message
if(isset($_SESSION['message'])&&count($_SESSION['message'])>0)
{
	foreach($_SESSION['message'] as $value)
		foreach($value as $key=>$value)
			print '<div class="alert '.$key.'" role="alert"><strong>'.$value.'</strong></div>';
	unset($_SESSION['message']);
}