<?php
/*
 * Company:Quguonet.com
 * Author:Myth
 */
//避免延时
set_time_limit(0);
//调用库
__autoload("QueryList");
//require 'Query/QueryList.class.php';

$stime=microtime(true); //获取程序开始执行的时间
//采集测试
$url="http://wap.ganji.com/foshan/songshui/shunde/?domain=foshan&url=songshui&d=shunde%2F&page=4";
$arr=array(
	'name'=>array('.list-item a:even','text','-.tel'),    //获取html格式的文章内容，但过滤掉div和a标签,去除类名为copyright的元素
    'href'=>array('.list-item a:even','href','-.tel')      //调用回调函数2作为全局回调函数
);
$data = QueryList::Query($url,$arr,'','UTF-8','UTF-8',true)->data;

print_r($data);
foreach ($data as $key => $data) {
	$name=$data['name'];
	$url=$data['href'];
	$db->insert("crm_list","`name`,`href`,`pagename`,`createtime`","'$name','$url','赶集顺德送水公司',NOW()");
}



$etime=microtime(true);//获取程序执行结束的时间
$total=$etime-$stime;   //计算差值
echo '<br />耗时:'.$total;



?>