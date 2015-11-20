<?php
class CDWeixin
{
    const MSG_TYPE_TEXT = 'text';
    const MSG_TYPE_LOCATION = 'location';
    
    const REPLY_TYPE_TEXT = 'text';
    const REPLY_TYPE_NEWS = 'news';

    /**
     * 接收到的post数据
     * @var object
     */
    private $_postData;
    private $_token;
    
    public function __construct($token)
    {
        if (empty($token))
            throw new Exception('Token is required');
        
        if (method_exists($this, 'errorHandler'))
            set_error_handler(array($this, 'errorHandler'));
        
        if (method_exists($this, 'exceptionHandler'))
            set_exception_handler(array($this, 'exceptionHandler'));
        
        $this->_token = $token;
        $this->parsePostRequestData();
    }
    
    public function run()
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            if ($this->_postData && $this->beforeProcess() === true) {
                $this->processRequest($this->_postData);
                $this->afterProcess();
            }
            else
                throw new Exception('POST 数据不正确或者beforeProcess方法没有返回true');
        }
        else
            $this->sourceCheck();
        
        exit(0);
    }
    
    /**
     * 判断是否是文字信息
     * @return boolean
     */
    public function isTextMsg()
    {
        return $this->_postData->MsgType == self::MSG_TYPE_TEXT;
    }
    
    /**
     * 判断是否是位置信息
     * @return boolean
     */
    public function isLocationMsg()
    {
        return $this->_postData->MsgType == self::MSG_TYPE_LOCATION;
    }

    /**
     * 生成向用户发送的文字信息
     * @param string $content
     * @return string xml字符串
     */
    public function outputText($content)
    {
        $textTpl = '<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <Content><![CDATA[%s]]></Content>
                <FuncFlag>0</FuncFlag>
            </xml>';
    
        $text = sprintf($textTpl, $this->_postData->FromUserName, $this->_postData->ToUserName, time(), self::REPLY_TYPE_TEXT, $content);
        return $text;
    }
    
    /**
     * 生成向用户发送的文字图片字符串
     * @param string $content
     * @param arrry $posts 文章数组，每一个元素是一个文章数组，索引跟微信官方接口说明一致
     * @return string xml字符串
     */
    public function outputNews($content, $posts = array())
    {
        $textTpl = '<xml>
             <ToUserName><![CDATA[%s]]></ToUserName>
             <FromUserName><![CDATA[%s]]></FromUserName>
             <CreateTime>%s</CreateTime>
             <MsgType><![CDATA[%s]]></MsgType>
             <Content><![CDATA[%s]]></Content>
             <ArticleCount>%d</ArticleCount>
             <Articles>%s</Articles>
             <FuncFlag>1<FuncFlag>
         </xml>';
        
        $itemTpl = '<item>
             <Title><![CDATA[%s]]></Title>
             <Discription><![CDATA[%s]]></Discription>
             <PicUrl><![CDATA[%s]]></PicUrl>
             <Url><![CDATA[%s]]></Url>
         </item>';
        
        $items = '';
        foreach ((array)$posts as $p) {
            if (is_array($p))
                $items .= sprintf($itemTpl, $p['Title'], $p['Discription'], $p['PicUrl'], $p['Url']);
            else
                throw new Exception('$posts 数据结构错误');
        }
        
        $text = sprintf($textTpl, $this->_postData->FromUserName, $this->_postData->ToUserName, time(), self::REPLY_TYPE_NEWS, $content, count($posts), $items);
        return $text;
    }
    
    /**
     * 解析接收到的post数据
     * @return SimpleXMLElement
     */
    public function parsePostRequestData()
    {
        $rawData = $GLOBALS['HTTP_RAW_POST_DATA'];
        $data = simplexml_load_string($rawData, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($data !== false)
            $this->_postData = $data;
    
        return $data;
    }
    
    /**
     * 返回接收到的post数组
     * @return object
     */
    public function getPostData()
    {
        return $this->_postData;
    }
    
    protected function beforeProcess()
    {
        return true;
    }
    
    protected function afterProcess()
    {
    }

    protected function processRequest($data)
    {
        throw new Exception('此方法必须被重写');
    }
    
    /**
     * 验证url来源是否证确
     * @return boolean
     */
    private function checkSignature()
    {
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
    
        $params = array($this->_token, $timestamp, $nonce);
        sort($params);
        $sig = sha1(implode($params));
    
        return $sig == $signature;
    }
    
    private function sourceCheck()
    {
        if ($this->checkSignature()) {
            $echostr = $_GET['echostr'];
            echo $echostr;
        }
        else
            throw new Exception('签名不正确');
    
        exit(0);
    }
}

