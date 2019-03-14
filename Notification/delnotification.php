<?php
include 'db.php';

$res=mysql_query("delete from tbl_notification where notification_id='".$_REQUEST["del"]."'")or die (mysql_error());

if($res)
	{
 	echo $_GET['jsoncallback'] .'([{"msg":"Delete Successfully"}])';
	}
	else
	{
	 echo $_GET['jsoncallback'] .'([{"msg":"Error Updateing Data"}])';
	}
?>