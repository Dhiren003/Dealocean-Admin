<?php
session_start();
if(isset($_SESSION['adminname']))
{
	unset($_SESSION['adminname']);
	echo "<script>window.location='index.php';</script>";
}
?>