<?php
/**
 +----------------------------------------------------------------------
 | MythPHP框架 [佛山市德信创易网络有限公司]
 +----------------------------------------------------------------------
 | Copyright (c) 2013 - 2063 http://www.dexinnet.com All rights reserved.
 +----------------------------------------------------------------------
 | Author: 李勇 <E-mail:myth@dexinnet.com> <QQ:5849963>
 +----------------------------------------------------------------------
 | 文件功能：框架核心引用文件
 +----------------------------------------------------------------------
 | File: Myth.php Date: 2013-09-06
 */

//+----------------------------------------------------
//| 定义常量
//+----------------------------------------------------
// 初始化常量 ACCESS 为 TRUE，用于 include 或 require 后续程序的判断，避免其他程序被非法引用。
define('ACCESS', TRUE);

// 定义根目录路径常量
define('ROOT', dirname(__FILE__));

//+----------------------------------------------------
//| 全局变量的开启
//+----------------------------------------------------
if(ini_get('register_globals')){
	ini_set('register_globals','on');
}

//+---------------------------------------------------------------
//| 加载配置
//+---------------------------------------------------------------
require_once (ROOT.'/config.php');

//+---------------------------------------------------------------
//| 程序SESSION和时区
//+---------------------------------------------------------------
if($GLOBALS['c']['session'] == TRUE) {
	session_start();
}
date_default_timezone_set($c['timezone']); // PRC

//+---------------------------------------------------------------
//| 程序调试模式
//+---------------------------------------------------------------
if($GLOBALS['c']['debug']==TRUE){
	if(!ini_get('display_errors')){
		ini_set('display_errors','on');
	}
	error_reporting(E_ALL); 
}
//+---------------------------------------------------------------
//| 类模块挂钩
//+---------------------------------------------------------------
function __autoload($class_name) {
	$ext = ROOT.'/lib/extends/'.$class_name.'.class.php';
	$lib = ROOT.'/lib/'.$class_name.'.class.php';
	if(file_exists($ext)) {
		include $ext;
	} elseif(file_exists($lib)) {
		include $lib;
	}
}
//+---------------------------------------------------------------
//| 模板加载
//+---------------------------------------------------------------
function tpl($tpl_name) {
	$path = ROOT.'/'.APP.'/tpl/'.$tpl_name.'.php';
	if(file_exists($path)) {
		include $path;
	} else{
		echo "模板加载失败";
	}
}

//+---------------------------------------------------------------
//| 信息提示（需要配合success.html.php/error.html.php/error_404.html.php使用）
//+---------------------------------------------------------------
//| @param string $message 提示信息内容
//| @param string $time 多少秒跳转，默认3秒
//| @param int $url 跳转地址
//+---------------------------------------------------------------
//| @Location $url
//+---------------------------------------------------------------
function success($message, $url = '', $time = 3) {
	$status = 'success';
	include ROOT.'/public/tpl/error.html.php';
	exit;
}
function error($message, $url = '', $time = 3) {
	$status = 'error';
	include ROOT.'/public/tpl/error.html.php';
	exit;
}
function error_404($message) {
	include ROOT.'/public/tpl/error_404.html.php';
	exit;
}

//+---------------------------------------------------------------
//| 实例化默认需要加载的类
//+---------------------------------------------------------------
__autoload('mysql');
__autoload('common');
$db = new common ();
//+---------------------------------------------------------------
//| 模块加载
//+---------------------------------------------------------------
$a = $db->get('a') == '' ? 'index' : $db->get('a');
$a_file = ROOT.'/'.APP.'/'.$a.'.php';

if(!file_exists($a_file)) {
	error_404('The requested page was not found on this server!'); // 模块操作文件找不到
} else {
	// 开启缓冲
	ob_start();
	
	// 加载模块操作文件
	require_once $a_file;
	
	$content = '';
	$content = ob_get_contents();
	
	// 清空（擦除）缓冲区并关闭输出缓冲
	ob_end_clean();
	
	// 输出内容
	echo $content;
}
 ?>