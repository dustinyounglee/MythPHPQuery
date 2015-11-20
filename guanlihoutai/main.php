<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],2);
if($_GET['do']=='logout'){
	$admin->admin_logout();
}
include('template/main.php');
?>