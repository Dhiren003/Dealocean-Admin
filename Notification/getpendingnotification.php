<?php
include 'db.php';
$records = array();
$result=mysql_query("SELECT *,(select Profile_pic from tbl_helper where Helper_id=tbl_notification.Helper_id)as Profile,(select helper_name from tbl_helper where Helper_id=tbl_notification.Helper_id)as member FROM tbl_notification ORDER BY notification_id desc") or die ("Query error: " . mysql_error());
while($row=mysql_fetch_array($result))
{
	$records[] = $row;
}
echo $_GET['jsoncallback'] . '(' . json_encode($records) . ');';
?>
