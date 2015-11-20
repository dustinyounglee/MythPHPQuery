<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],1);

function chkzt($id){
	if($id=="1"){
		return $re="开启";
	}else{
		return $re="关闭";
	}
}

if($_GET['do']=="kq"){
	$id=$_GET['id'];
	$admin->update(QIANZHUI."room","`zt`='1'","`id`='$id'");
	$admin->msg('index.php?app=gl&action=room',"开启成功！");
}

if($_GET['do']=="gb"){
	$id=$_GET['id'];
	$admin->update(QIANZHUI."room","`zt`='0'","`id`='$id'");
	$admin->msg('index.php?app=gl&action=room',"关闭成功！");
}

$sqllist=$admin->select(QIANZHUI.'room',"*");


include('template/room.php');
?>