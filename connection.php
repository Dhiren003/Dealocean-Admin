<?php
$conn = mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("dealocean", $conn) or die(mysql_error());
?>