<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],2);


$sql=$admin->select(QIANZHUI.'forums',"count(id)");
$count=$admin->fetch_array($sql);

//每页显示的条数  
$page_size=10;  
//总条目数  
$nums=$count[0];  
//每次显示的页数  
$sub_pages=10;  
//得到当前是第几页  
if(!isset($_GET["p"])){
	$_GET["p"]=1;
}
$pageCurrent=$_GET["p"];  
//if(!$pageCurrent) $pageCurrent=1;  
$first=($pageCurrent-1)*$page_size;
 

$sqllist=$admin->select(QIANZHUI.'forums',"`id`,`bt`,`datetime`,`zt`,`room`","1=1 ORDER BY `id` DESC limit $first,$page_size");

if($_GET['do']=="del"){
	$id=$_GET['id'];
	$admin->delete(QIANZHUI."forums","`id`='$id'");
	$admin->msg("index.php?app=gl&action=zutuan","删除成功！");
}

include('template/zutuan.php');
?>