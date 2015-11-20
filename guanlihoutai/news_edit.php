<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],2);

//获取新闻表的内容
$id=$_GET['id'];
$admin->select(QIANZHUI."news","*","`id`='$id'");
$row=$admin->fetch_array();

//读取栏目
$admin->select(QIANZHUI."fold","*");

//修改数据
if($_SERVER['REQUEST_METHOD']== 'POST'){
	$tittle=$_POST['bt'];
	$url=$_POST['url'];
	$zt=$_POST['zt'];
	$postid=$_POST['postid'];
	
	
	if(empty($_POST['bt'])) $admin->msg("index.php?app=gl&action=news_edit&id=$postid","标题不能为空！");
	if(empty($_POST['connect'])) $admin->msg("index.php?app=gl&action=news_edit&id=$postid","内容不能为空！");
	
	//开始数据
	
	if (get_magic_quotes_gpc()) {
		$connect = stripslashes($_POST['connect']);
	} else {
		$connect = $_POST['connect'];
	}
	$unqid=uniqid();
	$fnurl=ROOT."/data/news/".date("Ymdhis")."_".$unqid.".txt";
	$fndizhi="data/news/".date("Ymdhis")."_".$unqid.".txt";
	$newfn=ROOT."/".$row['fn'];
	if(file_exists($newfn)){
	   @unlink($newfn);
	}
	$fp=fopen("$fnurl","w+");
	if(fwrite($fp,$connect)){
		$admin->update(QIANZHUI."news", "`bt`='$tittle',`url`='$url', `fn`='$fndizhi',`zt`='$zt',`datetime`=NOW()", "`id`='$postid'");
		$admin->msg('index.php?app=gl&action=news',"修改成功！");
	}else{
		$admin->msg('index.php?app=gl&action=news_add',"修改文章失败！");
	}
}
//加载模板
include('template/news_edit.php');
?>