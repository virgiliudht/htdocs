<?php
function count_from_db_clause($wath_count,$table,$clause,$clause_type,$connect)
{
	$return=0;
	if($clause_type=='AND'||$clause_type=='OR')
	{
		$wath_count = $connect->real_escape_string($wath_count);
		$table = $connect->real_escape_string($table);
		$clause_type_sql=where_return($clause,$clause_type,$connect);
		$res=$connect->query("SELECT `".$wath_count."` FROM `".$table."`".$clause_type_sql);
		$return=mysqli_num_rows($res);	
	}
	return $return;
}
function select_from_db_clause($wath,$table,$clause,$clause_type,$connect)
{
	$return=array();
	if($clause_type=='AND'||$clause_type=='OR')
	{
		$select_type_sql=' * ';
		if(count($wath)>0)foreach($wath as $key=>$value)
		{
			$value = $connect->real_escape_string($value);
			if($key==0)$select_type_sql="`".$value."`";
			else $select_type_sql.=" ,`".$value."`";
		}
		$table = $connect->real_escape_string($table);
		$clause_type_sql=where_return($clause,$clause_type,$connect);
		$res=$connect->query("SELECT ".$select_type_sql." FROM `".$table."`".$clause_type_sql);
		while ($row=mysqli_fetch_assoc($res))
		{
			$return[] = $row;
		}
	 	mysqli_free_result($res);
	}
	return $return;
}
function select_from_db_clause_return_vector($wath,$table,$clause,$clause_type,$connect,$key_db,$value_db)
{
	$return=array();
	if($clause_type=='AND'||$clause_type=='OR')
	{
		$select_type_sql=' * ';
		if(count($wath)>0)foreach($wath as $key=>$value)
		{
			$value = $connect->real_escape_string($value);
			if($key==0)$select_type_sql="`".$value."`";
			else $select_type_sql.=" ,`".$value."`";
		}
		$table = $connect->real_escape_string($table);
		$clause_type_sql=where_return($clause,$clause_type,$connect);
		$res=$connect->query("SELECT ".$select_type_sql." FROM `".$table."`".$clause_type_sql);
		$contor=0;
		if(isset($res))
		{
			while ($row=mysqli_fetch_assoc($res))
			{
				$return[$row[$key_db]][$contor]['value'] = $row[$value_db];
				$return[$row[$key_db]][$contor]['date'] = $row['date'];
				$contor++;
			}
			mysqli_free_result($res);
		}
	}
	return $return;
}
function add_in_db($wath,$table,$connect)
{
	if(count($wath)>0)
	{
		$colum_sql="";$value_sql="";$count=0;
		foreach($wath as $colum=>$value)
		{
			$colum = $connect->real_escape_string($colum);
		    $value = $connect->real_escape_string($value);
			$count++;
			if($count==1)
			{
				$colum_sql="`".$colum."`";
				$value_sql="'".$value."'";
			}
			else
			{
				$colum_sql.=" ,`".$colum."`";
				$value_sql.=" ,'".$value."'";
			}
		}
		$res=$connect->query("INSERT INTO `".$table."` (".$colum_sql.") VALUES (".$value_sql.")");
	}
}
function update_in_db($wath,$table,$clause,$clause_type,$connect)
{
	if(count($wath)>0)
	{
		$sql="";$count=0;
		foreach($wath as $colum=>$value)
		{
			$colum = $connect->real_escape_string($colum);
		    $value = $connect->real_escape_string($value);
			$count++;
			if($count==1)$sql="`".$colum."`='".$value."'";
			else $sql.=" ,`".$colum."`='".$value."'";
		}
		$clause_type_sql=where_return($clause,$clause_type,$connect);
		$res=$connect->query("UPDATE `".$table."` SET ".$sql.$clause_type_sql);
	}
}
function where_return($clause,$clause_types,$connect)
{
	$return='';
	$count=0;$nr=count($clause);
	foreach($clause as $colum=>$value)
	{
		$colum = $connect->real_escape_string($colum);
		$value = $connect->real_escape_string($value);
		$count++;
		if($count==1)$return=" WHERE `".$colum."`='".$value."'";
		elseif($count>1) $return.=" ".$clause_types." `".$colum."`='".$value."'";
	}
	return $return;
}
function js_redirect($link){echo "<script type='text/javascript'>window.location='".$link."';</script>";}
function mynl2br($text){return strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));}
?>