<?php
/**
 * @Author: Jaeger <hj.q@qq.com>
 * @Date:   2015-09-22 11:03:34
 * @Last Modified by:   Jaeger
 * @Last Modified time: 2015-11-16 11:02:00
 */

set_time_limit(0);

require 'Query/QueryList.class.php';
//QueryList::run('');

/*$hj = QueryList::Query('http://mobile.csdn.net/',array("url"=>array('.unit h1 a','href')));

$data = $hj->getData(function($x){
    return $x['url'];
});

print_r($data);

echo $hj->getHtml(false);*/

/*$curl = QueryList::getInstance('CurlMulti');
$curl->cbFail = function ($a,$b){
  print_r($a);
  print_r($b);
};

$curl->add(['url'=>'http://mobile.csdn0.net/']);

$curl->start();*/
$stime=microtime(true); //获取程序开始执行的时间


/*QueryList::run('Multi',[
    'list' => ['http://tool.lu/','http://wowubuntu.com/markdown/','http://www.padnews.cn/'],
    'success' => function($a){
        print_r($a);
    },
    'error' => function($a){
        echo 'error';
        print_r($a);
    }
]);*/

/*$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
foreach ($data as $url) {
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_exec($curl);
}
curl_close($curl);*/



// $html = QueryList::getInstance('Http')->get('http://www.kuparts.com/ProCategory/PartsIndex');

// echo $html;
// 
/*$data = QueryList::Query($html,[
    't' => [
    'h3','text'
    ],
    'sub' => [
        '','html','',function($v,$k){
            $ql = QueryList::getInstance('QueryList',1);
            //print_r($ql);
            $ql->html = $v;
            return $ql->setQuery([
                'tt'=>['.sub_item','html']
                ])->getData();
           
        }
    ]
    ],'.md>.item')->getData();

print_r($data);
*/

/*$html = '<span>111<a>1vvv</a>1</span>';
$html2='3<span>33c</span>3';

 $t1 = phpQuery::newDocumentHTML($html);
 $t2 = phpQuery::newDocumentHTML($html2);

 echo $t1->find('a')->html();
echo $t2->find('span')->html();*/




/*
$url = 'http://www.phpddt.com/category/php/1/';

$curl = QueryList::getInstance('CurlMulti');
//100个线程
$curl->maxThread = 100;

$data = QueryList::run('Request',array(
    'http' =>array(
        'target' => $url,
        'referrer'=>$url,
        'user_agent'=>'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.11 (KHTML, like Gecko) Ubuntu/11.10 Chromium/27.0.1453.93 Chrome/27.0.1453.93 Safari/537.36',
        'cookiePath' => './cookie.txt'
    ),
    'callback' => function($html){
        return preg_replace('/<head.+?>.+<\/head>/is','<head></head>',$html);
    }
))->setQuery(array('title'=>['h2 a','text'],'link'=>['h2 a','href']))->getData(function($item) use($curl){
    // if(!StudyModel::exist($item['title'])){
        $curl->add(['url' => $item['link']],function($a){
            $html = preg_replace('/<head.+?>.+<\/head>/is','<head></head>',$a['content']);
            $data = QueryList::Query($html,array('title'=>['.entry_title','text'],'content'=>['.post','html','-#headline -script -h3.post_tags -.copyright -.wumii-hook a']))->getData();
            // echo StudyModel::insert($data[0]['title'],$data[0]['content'],$a['info']['url']);
            print_r($data);
        });
    // }
});

$curl->start();
*/

/*
//无限级别采集

$data = QueryList::Query($html,[
    't1' => [
    'h3','text'
    ],
    'sub' => [
        '','html'
    ]
    ],'.md>.item')->getData(function($x){

       $x['sub'] = QueryList::Query($x['sub'],[
                't2' => ['h4','text'],
                'sub'=>['.sub_item','html']
                ])->getData(function($xx){

                    $xx['sub'] = QueryList::Query($xx['sub'],[
                            't3' => ['.sub_list_item','text'],
                            'link' => ['.sub_list_item>a','href']
                        ])->data;

                    return $xx;
                });
        
            return $x;
           
    });

print_r($data);


*/
/*
//模拟登陆
$login = QueryList::run('Login',[
    'target' => 'http://doc.querylist.cc/login/login',
    'method' => 'post',
    'params' => ['username'=>'admin','password'=>'admin'],
    'cookiePath' => './cookie123.txt'
    ]);

// print_r($login->html);

$rt = $login->post('http://doc.querylist.cc/admin')->setQuery(['title'=>['h1','text']])->data;

print_r($rt);
*/

//乱码终极解决方案
$data = QueryList::Query('http://www.phpddt.com/',['title'=>['h2','text']],'','UTF-8','UTF-8',true)->data;

print_r($data);





$etime=microtime(true);//获取程序执行结束的时间
$total=$etime-$stime;   //计算差值
// echo '耗时:'.$total;
