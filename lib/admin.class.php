<?php
class admin extends mysql{
	
	//管理员登录
	public function admin_login($username,$password){
		$username = str_replace(" ", "", $username);
		$query = $this->select(QIANZHUI.'admin', '*', '`username` = \'' . $username . '\'');
		$us = is_array($row = $this->fetch_array($query));
		$ps = $us ? md5($password) == $row[password] : FALSE;
		if($ps){
			$_SESSION[uid] = $row[id];
			$_SESSION[shell] = md5($row[username] . $row[password] . "DTOS");
			$this->update(QIANZHUI.'admin',"`ip`='".$this->getip()."', `datetime`=NOW()","`id`='$row[id]'");
			$this->msg("index.php?app=gl&action=main","管理员登录中");
		}else{
			$this->msg("index.php?app=gl","输入的信息有误！");
			//echo "请检查输入的信息！";
			session_destroy();
			exit();
		}	
	}
	
	//用户shell检查
	public function admin_chk_shell($uid,$shell){
		$query = $this->select(QIANZHUI.'admin', '*', '`id` = \'' . $uid . '\'');
		$us = is_array($row = $this->fetch_array($query));
		$shell = $us ? $shell == md5($row[username] . $row[password] . "DTOS") : FALSE;
		return $shell ? $row : NULL;
	}
	
	//管理员检查
	public function admin_chk($uid,$shell,$level){
		if ($row=$this->admin_chk_shell($uid, $shell)) {
			if ($row[level] <= $level) {
				return $row;
			}else{
				echo "用户权限不足！";
				exit();
			}
		}else{
			$this->msg("index.php","请重新登录！");
		}
	}
	
	//管理员退出
	public function admin_logout(){
		session_start();
		session_unset();
		session_destroy();
		$this->msg("index.php?app=gl","用户退出！");
	}
	
	//管理员权限判断
	public function admin_level($level){
		switch($level){
			case 1:
				$jg="管理员";	
			break;
			case 2:
				$jg="操作员";
			break;	
		}
		return $jg;
	}
	
	//添加管理员
	public function admin_add($username,$password,$level){
		$username=trim($username);
		$password=md5(trim($password));
		$sql=$this->select(QIANZHUI.'admin',username,"`username` = '$username'");
		$row=$this->fetch_array($sql);
		if($row){
			$this->msg("index.php?app=gl&action=admin_add","该账号已经注册！");
		}else{
			$this->insert(QIANZHUI.'admin','`username`,`password`,`level`',"'".$username."','".$password."','".$level."'");
			$this->msg("index.php?app=gl&action=admin","添加账号成功！");
		}
	}
	
	//删除管理员
	public function admin_del($id){
		if($id <> "1"){
			$this->delete(QIANZHUI.'admin', "`id` = '$id'");
			$this->msg("index.php?app=gl&action=admin","删除账号成功！");
		}else{
			$this->msg("index.php?app=gl&action=admin","初始账号不能删除！");
		}
	}
	
	//修改管理员
	public function admin_edit($id,$password,$level){
		$password=md5(trim($password));
		$this->update(QIANZHUI.'admin',"`password`='$password',`level`='$level'","`id`='$id'");
		$this->msg("index.php?app=gl&action=admin","修改账号成功！");
	}
	
	//读取原来的URL地址
	public function getparam() {
	  unset($_GET['p']);
	  foreach($_GET as $k=>$v) $r[] = "$k=$v";  return "?" . join("&", $r);
	}
	
	//处理sql
	public function expr($expr='and') {
	$pram=$_GET;
	  unset($pram['p']);
	  unset($pram['action']);
	  unset($pram['weixinopenid']);
	  if(! $pram) return '';
	  foreach($pram as $k=>$v) $r[] = "$k='$v'";  return "and " . join(" $expr ", $r);
	}
	
	//去除一个参数的URL处理
	public function unseturl($nr){
		$pram=$_GET;
		unset($pram['p']);
		unset($pram[$nr]);
		foreach($pram as $k=>$v) $r[] = "$k=$v";  return "?" . join("&", $r);
	}
	
	//处理输入的字符串
	function text($text){
   		 return trim(nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($text))));
	 }
	 
	 //读取房间名称
	 function readroom($id){
		$sql=mysql_query("select `name` from ".QIANZHUI."room where `id`='$id'"); 
		$name=mysql_fetch_array($sql);
		$name=$name['name'];
		if(empty($name)) $name="全部" ;
		return $name;
	 }
	 
	 //读取组团的性别
	 function readsex($id){
	 	switch ($id){
			case "1":
				return "男性";
			break;
			case "2":
				return "女性";
			break;
			case "3":
				return "男女都有";
			break;
		}
	 }
	
	//组团为空选填判断
	function readempty($con){
		if(empty($con)){
			return "没有填写内容";	
		}else{
			return 	$con;
		}
	}
	
	//文本输入
	function text_in($str){
		$str=strip_tags($str,'<br>');
		$str = str_replace(" ", "&nbsp;", $str);
		$str = str_replace("\n", "<br>", $str);	
		if(!get_magic_quotes_gpc()) {
		  $str = addslashes($str);
		}
		return $str;
	}

	//文本输出
	function text_out($str){
		$str = str_replace("&nbsp;", " ", $str);
		$str = str_replace("<br>", "\n", $str);	
		$str = stripslashes($str);
		return $str;
	}

	// 自动转换字符集 支持数组转换
	function auto_charset($fContents,$from='gbk',$to='utf-8'){
		$from   =  strtoupper($from)=='UTF8'? 'utf-8':$from;
		$to       =  strtoupper($to)=='UTF8'? 'utf-8':$to;
		if( strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents)) ){
			//如果编码相同或者非字符串标量则不转换
			return $fContents;
		}
		if(is_string($fContents) ) {
			if(function_exists('mb_convert_encoding')){
				return mb_convert_encoding ($fContents, $to, $from);
			}elseif(function_exists('iconv')){
				return iconv($from,$to,$fContents);
			}else{
				return $fContents;
			}
		}
		elseif(is_array($fContents)){
			foreach ( $fContents as $key => $val ) {
				$_key =     auto_charset($key,$from,$to);
				$fContents[$_key] = auto_charset($val,$from,$to);
				if($key != $_key )
					unset($fContents[$key]);
			}
			return $fContents;
		}
		else{
			return $fContents;
		}
	}

	
	//消息窗口
	public function msg($url,$show){
				$nr='
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="3; URL='.$url.'"/>
<title>DTOS系统消息中心</title>
<style type="text/css">
.msgtab {
	border: 1px solid #016AA9;
	background-color: #2E9FC9;
	font-size: 12px;
	color: #FFF;
	text-align: center;
	line-height: 25px;
}
</style>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="msgtab">
  <tr>
    <td>DTOS企业信息管理系统消息中心</td>
  </tr>
  <tr>
    <td><font color=red>'.$show.' </font><br />
      页面正在跳转中，如果无法跳转请<a href="'.$url.'">点击这里</a></td>
  </tr>
</table>
</body>
</html>
';
	echo $nr;
	exit();	
	}
	
}
?>