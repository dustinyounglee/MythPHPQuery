<?php
if(!defined('ACCESS')) { exit('Access Denied'); }
$message = !empty($message) ? $message : '';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">
body { background-color: #fff; font: 13px/20px normal Helvetica, Arial, sans-serif; color: #4F5155; }
a { color: #003399; background-color: transparent; font-weight: normal; }
h1 { color: #444; background-color: transparent; border-bottom: 1px solid #D0D0D0; font-size: 19px; font-weight: normal; margin: 0 0 14px 0; padding: 14px 15px 10px 15px; }
#container { margin: 50px; border: 1px solid #D0D0D0; -webkit-box-shadow: 0 0 8px #D0D0D0; }
p { margin: 12px 15px 12px 15px; }
</style>
</head>

<body>
	<div id="container">
		<h1>404 Page Not Found</h1>
		<p><?php echo $message; ?></p>
	</div>
</body>
</html>