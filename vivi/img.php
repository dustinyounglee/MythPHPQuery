<?php
/*--------------------------
ะกอตอ๘ีพถจึฦ
qq: 996948519
---------------------------*/
require(dirname(__FILE__)."/inc/common.inc.php");
require(dirname(__FILE__)."/inc/caiji.class.php");
$v_config=require(VV_DATA."/config.php");
$collectid=intval(@$_GET['tid']);
$caiji_config=require(VV_DATA."/config/{$collectid}.php");

$imgurl = base64_decode(strrev(rawurldecode(@$_GET['code'])));
$parse_url=parse_url($imgurl);

if($caiji_config['other_imgurl']){
	$other_url=explode(',',$caiji_config['other_imgurl']);
	if(!in_array($parse_url['host'],$other_url)){
		exit('imgurl is error');
	}
}
header("Content-Type: image/jpeg; charset=UTF-8");

$cacheid=md5($imgurl);
$cachefile=getcachefile($cacheid);
$cachetime=$v_config['imgcachetime'];
if($v_config['imgcache']){
	if( OoO0o0O0o() && !is_file ($cachefile) || (@filemtime($cachefile)+($cachetime*3600))<= time ()){
		$imgbin=file_get_contents($imgurl);
		if(!empty($imgbin)){
			write($cachefile,$imgbin);
		}
	}else{
		$imgbin=file_get_contents($cachefile);
	}
	echo $imgbin;
}else{
	header("Location: {$imgurl}");
	exit;
}