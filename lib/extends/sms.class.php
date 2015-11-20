<?php
/**
 +----------------------------------------------------------------------
 | MythPHP框架 [佛山市德信创易网络有限公司]
 +----------------------------------------------------------------------
 | Copyright (c) 2013 - 2063 http://www.dexinnet.com All rights reserved.
 +----------------------------------------------------------------------
 | Author: 李勇 <E-mail:myth@dexinnet.com> <QQ:5849963>
 +----------------------------------------------------------------------
 | 文件功能：短信函数类
 +----------------------------------------------------------------------
 | File: sms.class.php Date: 2013-09-07
 */
class sendsms {
	private $num;
	private $con;
	private $url;
	private $user=$c['SMS_NAME'];
	private $pwd=$c['SMS_PASS'];
	private $re;
	private $cz;
	
	
	public function __construct($num,$con){
		$this->num=$num;
		$this->con=$con;
		$this->url=$url;
		$this->cz=$cz;
		$this->geturl();
	}
	//发送短信
	public function geturl(){
		$this->url="http://18dx.cn/API/Services.aspx?action=msgsend&user=$this->user&mobile=$this->num&content=$this->con&hashcode=$this->pwd";
		$jg=$this->Get($this->url);
		if(strstr($jg,'发送成功')){
			$this->cz=1;
		}else{
			$this->cz=0;
		}
	}
	//返回发送结果
	public function sendend(){
		if($this->cz=='1'){
			$re=true;
		}else{
			$re=false;
		}
		return $re;
	}
	
	public function Get($url){
		if(function_exists('file_get_contents')){
			$file_contents = file_get_contents($url);
		}else{
			$ch = curl_init();
			$timeout = 5;
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$file_contents = curl_exec($ch);
			curl_close($ch);
		}
		return $file_contents;
	}
}
?>