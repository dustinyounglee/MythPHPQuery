<?php

//PHPMailer 邮件发送


include(dirname(__FILE__)."/PHPMailer/class.phpmailer.php");

class Mail{

	public static $errorInfo;

	function send($address,$title,$content,$fromName='User'){

		$mail             = new PHPMailer();

		/*服务器相关信息*/
		$mail->IsSMTP();                        //设置使用SMTP服务器发送
		$mail->SMTPAuth   = true;               //开启SMTP认证
		$mail->Host       = $c['SMTP_HOST'];   	    //设置 SMTP 服务器
		$mail->Username   = $c['SMTP_NAME'];  		//用户名
		$mail->Password   = $c['SMTP_PASS'];          //密码

		/*内容信息*/
		$mail->IsHTML(true); 			         //指定邮件格式为：html
		$mail->CharSet    ="UTF-8";			     //编码
		$mail->From       = $c['SMTP_FROM'];	 		 //发件人邮箱
		$mail->FromName   = $fromName;			 //发信人
		$mail->Subject    = $title;  			 //标题
		$mail->MsgHTML($content);  				 //内容
		//$mail->AddAttachment("01.jpg");	     //附件

		/*发送邮件*/
		$mail->AddAddress($address);  			 //收件人地址
		if($mail->Send()) {
		  	return true;
		} else {
			self::$errorInfo=$mail->ErrorInfo;
			return false;
		}
	}
}