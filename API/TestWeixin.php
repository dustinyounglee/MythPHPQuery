<?php
require 'CDWeixin.php';
date_default_timezone_set('Asia/Shanghai');//'Asia/Shanghai'   亚洲/上海
class TestWeixin extends CDWeixin
{
    public function processRequest($data)
    {
        // $input即为用户输入的内容
        $input = $data->Content;
		//返回用户的OpenID
		$user = $data->FromUserName;

		
		if($input=='Hello2BizUser'){
			$text = "欢迎您关注超级密室佛山站！";
			 $xml = $this->outputText($text);
       		 header('Content-Type: application/xml');
        	 echo $xml;
		}
		
        // 如果用户发送的是文本数据
        if ($this->isTextMsg()) {
            $this->text($input,$user);
        }
        // 如果用户发送的是地理位置数据
        elseif ($this->isLocationMsg()) {
           // $this->news();
        }
    }
    
    public function errorHandler($errno, $error, $file = '', $line = 0)
    {
//         $log = sprintf('%s - %s - %s - %s', $errno, $error, $file, $line);
//         file_put_contents(app()->runtimePath . '/wx1.txt', $log);
    }
    
    public function errorException(Exception $e)
    {
//         $log = sprintf('%s - %s - %s - %s', $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
//         file_put_contents(app()->runtimePath . '/wx2.txt', $log);
    }
    
    private function news($text,$tittle,$img,$url)
    {
        $posts = array(
            array(
                'Title' => $tittle,
                'Discription' => $text,
                'PicUrl' => $img,
                'Url' => $url,
            ),
        );
        // outputNews用来返回图文信息
        $xml = $this->outputNews($text, $posts);
        header('Content-Type: application/xml');
        echo $xml;
    }
    

	private function showinfo($userid){
		$posts = array(
            array(
                'Title' => "超级密室佛山站最新消息",
                'Discription' => "超级密室佛山站最新消息",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/mobile/template/images/logo.png",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?weixinopenid=".$userid,
            ),
			array(
                'Title' => "超级密室佛山站游戏介绍",
                'Discription' => "超级密室佛山站游戏介绍",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/data/images/wx.jpg",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?action=guize&weixinopenid=".$userid,
            ),
			array(
                'Title' => "游戏组团",
                'Discription' => "游戏组团",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/data/images/wx.jpg",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?action=zutuan&weixinopenid=".$userid,
            ),
			array(
                'Title' => "查看空余房间",
                'Discription' => "查看空余房间",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/data/images/wx.jpg",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?action=freeroom&weixinopenid=".$userid,
            ),
			array(
                'Title' => "微信在线订票",
                'Discription' => "微信在线订票",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/data/images/wx.jpg",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?action=freeroom&weixinopenid=".$userid,
            ),
        );
        // outputNews用来返回图文信息
        $xml = $this->outputNews($text, $posts);
        header('Content-Type: application/xml');
        echo $xml;
	}
	
	private function guize($userid){
		$posts = array(
            array(
                'Title' => "特洛伊之战——Trojan War ",
                'Discription' => "特洛伊之战——Trojan War ",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/data/upload/image/20130721/20130721020431_71721.png",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?action=read&id=5&weixinopenid=".$userid,
            ),
			array(
                'Title' => "生化密所——Virus Room",
                'Discription' => "生化密所——Virus Room",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/data/upload/image/20130721/20130721031415_46441.png",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?action=read&id=6&weixinopenid=".$userid,
            ),
			array(
                'Title' => "巫蛊荒宅——Wizard Cabin",
                'Discription' => "巫蛊荒宅——Wizard Cabin",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/data/upload/image/20130721/20130721032234_54467.png",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?action=read&id=7&weixinopenid=".$userid,
            ),
			array(
                'Title' => "泰坦尼克——TITANIC",
                'Discription' => "泰坦尼克——TITANIC",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/data/upload/image/20130721/20130721032417_72921.png",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?action=read&id=8&weixinopenid=".$userid,
            ),
			array(
                'Title' => "深牢觅影——Dark Cage",
                'Discription' => "深牢觅影——Dark Cage",
                'PicUrl' => "http://mishi.www01.wangzhuan100.com/data/upload/image/20130721/20130721032549_77813.png",
                'Url' => "http://mishi.www01.wangzhuan100.com/index.php?action=read&id=&weixinopenid=".$userid,
            ),
        );
        // outputNews用来返回图文信息
        $xml = $this->outputNews($text, $posts);
        header('Content-Type: application/xml');
        echo $xml;
	}
	

	
    private function text($input,$userid)
    {
        
        // outputText 用来返回文本信息
		switch($input){
			
			case "规则":
				$this->guize($userid);
			break;
			
			case "绑定":
			//$text = $userid;
			// $xml = $this->outputText($text);
       		// header('Content-Type: application/xml');
        	// echo $xml;
			
			break;
			
			default:
        	$this->showinfo($userid);
			break;
			
		}
       
    }
}


