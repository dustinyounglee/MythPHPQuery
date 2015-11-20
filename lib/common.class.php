<?php
/**
 +----------------------------------------------------------------------
 | MythPHP框架 [佛山市德信创易网络有限公司]
 +----------------------------------------------------------------------
 | Copyright (c) 2013 - 2063 http://www.dexinnet.com All rights reserved.
 +----------------------------------------------------------------------
 | Author: 李勇 <E-mail:myth@dexinnet.com> <QQ:5849963>
 +----------------------------------------------------------------------
 | 文件功能：公用函数类
 +----------------------------------------------------------------------
 | File: Myth.php Date: 2013-09-07
 */
class common extends mysql{

	//重置get属性和过滤
	function get($str){
		$val = !empty($_GET[$str]) ? $_GET[$str] : null; 
		$val = $this->safechk($val,'get');
		return $val;
	}

	//重置post属性
	function post($str){
		$val = !empty($_POST[$str]) ? $_POST[$str] : null; 
		$val = $this->safechk($val,'post');
		return $val; 
	}

	//重置Cookie
	function cookie($str){
		$val = !empty($_COOKIE[$str]) ? $_COOKIE[$str] : null; 
		$val = $this->safechk($val,'cookie');
		return $val; 
	}

	//安全性检测
	function safechk($value,$type){
		$getfilter = "'|(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
		$postfilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
		$cookiefilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
		switch ($type) {
			case 'get':
				$req=$getfilter;
				break;
			case 'post':
				$req=$postfilter;
				break;
			case 'cookie':
				$req=$cookiefilter;
				break;
		}
		//开始检测
        if (preg_match("/".$req."/is",$value) == 1){  
        	error("请勿提交非法信息！","http://www.wogoule.com");
        }else{
        	return $value;
        }

	}

	/*获得客户端真实的IP地址*/
	function getip() {
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
			$ip = getenv("HTTP_CLIENT_IP");
		} else
			if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
				$ip = getenv("HTTP_X_FORWARDED_FOR");
			} else
				if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
					$ip = getenv("REMOTE_ADDR");
				} else
					if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
						$ip = $_SERVER['REMOTE_ADDR'];
					} else {
						$ip = "unknown";
					}
		return ($ip);
	}

	function checkurl() { //检查来路
		if (preg_replace("/https?:\/\/([^\:\/]+).*/i", "\\1", $_SERVER['HTTP_REFERER']) !== preg_replace("/([^\:]+).*/", "\\1", $_SERVER['HTTP_HOST'])) {
			header("Location: http://www.wogoule.com");
			exit();
		}
	}
}
?>