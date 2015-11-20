<?php
/*--------------------------
viviС͵��վϵͳ
qq:996948519
---------------------------*/
header("Cache-Control:no-stroe,no-cache,must-revalidate,post-check=0,pre-check=0");
require_once('data.php');
require_once('checkAdmin.php');
$v_config=require_once('../data/config.php');
require_once('../inc/common.inc.php');
?>
<link rel="stylesheet" type="text/css" href="../public/css/admin.css">
<link href="../public/css/jquery.css" rel="stylesheet" type="text/css">
<link href="../public/css/base.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../public/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../public/js/licence.js"></script>
<?php
$vv=$_GET['t'];
		switch($vv){
			case "updatenow":
			updatenow();
			break;
			case "update":
			update($upname);
			break;
		}
?>