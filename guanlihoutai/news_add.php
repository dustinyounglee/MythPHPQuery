<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],2);

$admin->select(QIANZHUI."fold","*");


if($_SERVER['REQUEST_METHOD']== 'POST'){
	if(empty($_POST['bt'])) $admin->msg("index.php?app=gl&action=news_add","标题不能为空！");
	if(empty($_POST['connect'])) $admin->msg("index.php?app=gl&action=news_add","内容不能为空！");
	
	//开始插入数据
	$tittle=$_POST['bt'];
	$url=$_POST['url'];
	$zt=$_POST['zt'];
	$fold=$_POST['fold'];
	if (get_magic_quotes_gpc()) {
		$connect = stripslashes($_POST['connect']);
	} else {
		$connect = $_POST['connect'];
	}
	$unqid=uniqid();
	$fnurl=ROOT."/data/news/".date("Ymdhis")."_".$unqid.".txt";
	$fndizhi="data/news/".date("Ymdhis")."_".$unqid.".txt";
	$fp=fopen("$fnurl","w+");
	if(fwrite($fp,$connect)){
		$admin->insert(QIANZHUI."news", "`bt`,`fold_id`,`url`,`fn`,`zt`,`datetime`", "'$tittle','$fold','$url','$fndizhi','$zt',Now()");
		$admin->msg('index.php?app=gl&action=news',"添加成功！");
	}else{
		$admin->msg('index.php?app=gl&action=news_add',"添加文章失败！");
	}
}
//加载模板
include('template/news_add.php');
?>