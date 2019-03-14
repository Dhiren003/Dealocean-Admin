<?php
include 'connection.php';


	$sq=mysql_query("select * from tbl_rating where helper_id='33'");
	$total=0;
	while($r=mysql_fetch_array($sq))
	{
		//echo $r['rating'];
		$total=$total+$r["rating"];
	}
	echo $total;
	
?>