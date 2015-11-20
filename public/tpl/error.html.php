<?php
if(!defined('ACCESS')) { exit('Access Denied'); }
$url = !empty($url) ? $url : '';
$time = !empty($time) ? $time : 3;
$message = !empty($message) ? $message : '';
$status = isset($status) ? $status : '';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="<?php echo $time ?>; URL=<?php echo $url ?>"/>
<title>信息提示</title>
<style type="text/css">
body { margin-top:150px; font: 12px/1.9 Arial, Helvetica, sans-serif; }
#message { margin:0 auto; width:500px; text-align:center; }
#header { padding:15px 10px; border-bottom:1px dotted blue; font-weight:bold; }
<?php
// 如果是错误信息，显示红色，否则显示绿色
if($status == 'error') {
	echo '#message { border:2px solid #F00; } #header { color:#F00; }';
} else {
	echo '#message { border:2px solid #009900; } #header { color:#009900; }';
}
?>
#footer { padding:10px 5px; }
#time { font-weight:bold; }
#time, #footer a { color:#FF0000; }
</style>
</head>

<body>

<div id="message">
    <div id="header"> <?php echo $message; ?> </div>
    <div id="footer">
 		页面正在跳转中，如果无法跳转请<a href="<?php echo $url ?>">点击这里</a></td>
    </div>
</div>
</body>
</html>