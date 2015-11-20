<?php error_reporting(E_ALL&~E_NOTICE);
@set_time_limit(120);
@ini_set('pcre.backtrack_limit', 1000000);
date_default_timezone_set('PRC');
header("Content-type: text/html; charset=gbk");
define('VV_INC', str_replace("\\", '/', dirname(__FILE__)));
define('VV_ROOT', str_replace("\\", '/', substr(VV_INC, 0, -4)));
require(VV_ROOT . '/data/version.php');
require(VV_INC . '/define.php');
require(VV_INC . '/function.php');
$version = "万能小偷系统 " . VV_VERSION;
require(VV_INC . '/init.php');
?>