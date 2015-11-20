<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],2);

$id=$_GET['id'];

$admin->select(QIANZHUI."forums","*","`id`='$id'");
$row=$admin->fetch_array();

$forumsid=$row['id'];

//删除评论
if($_GET['do']=="del"){
	$delid=$_GET['delid'];
	$admin->delete(QIANZHUI."thread","`id`='$delid'");
	$admin->msg("index.php?app=gl&action=zutuan_read&id=".$id,"删除成功！");
}
//修改状态
if($_SERVER['REQUEST_METHOD']== 'POST'){
	$zt=$_POST['zt'];
	$admin->update(QIANZHUI."forums","`zt`='$zt'","`id`='$id'");
	$admin->msg("index.php?app=gl&action=zutuan_read&id=".$id,"修改成功！");
}

function chkzt($chkid){
	if($chkid=="1"){
		return $result="是";
	}else{
		return $result="否";
	}
}
$admin->select(QIANZHUI."thread","*","`forums_id`='$forumsid' ORDER BY `id` DESC ");

include('template/zutuan_read.php');
?>