<?php
if (!defined('VV_INC')) exit(header("HTTP/1.1 403 Forbidden"));
if($v_config['robotlogon']!=='0'){
	$ServerName = $_SERVER ["SERVER_NAME"];
	$ServerPort = $_SERVER ["SERVER_PORT"];
	$serverip = $_SERVER ["REMOTE_ADDR"];
	$url_this = "http://" . $_SERVER ['HTTP_HOST'] . @$_SERVER["HTTP_X_REWRITE_URL"];
	$Url = "http://" . $ServerName;
	If ($ServerPort != "80") {
		$Url = $Url . ":" . $ServerPort;
	}else {
		$Url = $_SERVER ['HTTP_REFERER'];
	}
	$GetLocationURL = $Url;
	$agent1 = $_SERVER ["HTTP_USER_AGENT"];
	$agent = strtolower ($agent1);
	$Bot = "";
	if (stripos ($agent, "bot") > - 1) {
		$Bot = "其它蜘蛛";
	}
	if (stripos ($agent, "googlebot") > - 1) {
		$Bot = "Google";
	}
	if (stripos ($agent, "mediapartners-google") > - 1) {
		$Bot = "Google Adsense";
	}
	if (stripos ($agent, "baiduspider") > - 1) {
		$Bot = "Baidu";
	}
	if (stripos ($agent, "360spider") > - 1) {
		$Bot = "360搜索";
	}
	if (stripos ($agent, "soso") > - 1) {
		$Bot = "soso";
	}
	if (stripos ($agent, "sogou") > - 1) {
		$Bot = "Sogou";
	}
	if (stripos ($agent, "yahoo") > - 1) {
		$Bot = "Yahoo!";
	}
	if (stripos ($agent, "msn") > - 1) {
		$Bot = "MSN";
	}
	if (stripos ($agent, "ia_archiver") > - 1) {
		$Bot = "Alexa";
	}
	if (stripos ($agent, "iaarchiver") > - 1) {
		$Bot = "Alexa";
	}
	if (stripos ($agent, "sohu") > - 1) {
		$Bot = "Sohu";
	}
	if (stripos ($agent, "sqworm") > - 1) {
		$Bot = "AOL";
	}
	if (stripos ($agent, "yodaoBot") > - 1) {
		$Bot = "Yodao";
	}
	if (stripos ($agent, "iaskspider") > - 1) {
		$Bot = "新浪爱问";
	}
	$shijian = date("Y-m-d H:i:s");
	define ('IP_FILE', VV_DATA . "/zhizhu.txt");
	$ip = getip() . '---' . $Bot . '---' . $url_this . '---' . $shijian;
	if(SCRIPT=='item' && !empty($Bot) ) exit(header("HTTP/1.1 403 Forbidden"));
	if (!empty($Bot) && !is_file(IP_FILE)) {
		write(IP_FILE, $ip);
	}else if (!empty($Bot) && is_file(IP_FILE)) {
		$i = count(file(IP_FILE));
		$oldip = file_get_contents(IP_FILE);
		$newip = $ip . "\r\n";
		$iplist = $newip . $oldip;
		write(IP_FILE, $iplist);
	}
}
?>