<?php
/**
 +----------------------------------------------------------------------
 | MythPHP框架 [佛山市德信创易网络有限公司]
 +----------------------------------------------------------------------
 | Copyright (c) 2013 - 2063 http://www.dexinnet.com All rights reserved.
 +----------------------------------------------------------------------
 | Author: 李勇 <E-mail:myth@dexinnet.com> <QQ:5849963>
 +----------------------------------------------------------------------
 | 文件功能：框架配置文件
 +----------------------------------------------------------------------
 | File: config.php Date: 2013-09-06
 */

defined('ACCESS')||exit('Access Denied');

$GLOBALS['c'] = array();

//版本信息号
$GLOBALS['c']['version'] = "MythPHP1.0"; //系统版本号

//session和时区设置
$GLOBALS['c']['session']  = TRUE; // TRUE为开启, FALSE为关闭
$GLOBALS['c']['timezone'] = 'Asia/Hong_Kong'; // 时区 PRC


//数据库配置
$GLOBALS['c']['dbhost']        = "localhost";		//配置主机
$GLOBALS['c']['dbuser']		= "root";			//数据库用户
$GLOBALS['c']['dbpw']			= "";		//数据库密码
$GLOBALS['c']['dbname']		= "quguocrm";		//数据库密码
$GLOBALS['c']['dbcharset'] 	= "utf8";			//数据库字符
$GLOBALS['c']['dbpre']         = "crm_";			//数据库表名前缀

//配置邮件发送设置
$GLOBALS['c']['SMTP_HOST']	=	"";  //发信主机
$GLOBALS['c']['SMTP_NAME']	=	"";	 //发信账号
$GLOBALS['c']['SMTP_PASS']	=	"";	 //发信密码
$GLOBALS['c']['SMTP_FROM']	=	"";	 //发信人

//短信设置
$GLOBALS['c']['SMS_NAME']		=	"";   //短信账号
$GLOBALS['c']['SMS_PASS']		=	"";	  //短信密码	

//程序调试模式
$GLOBALS['c']['debug'] = TRUE;  //程序调试模式开启
?>