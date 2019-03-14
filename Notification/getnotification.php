<?php
include 'db.php';

$records = array();

$result=mysql_query("SELECT count(*) as np FROM tbl_notification ORDER BY notification_id DESC") or die ("Query error: " . mysql_error());
while($row=mysql_fetch_array($result))
 {
$records[] = $row;
}
echo $_GET['jsoncallback'] . '(' . json_encode($records) . ');';
?>
