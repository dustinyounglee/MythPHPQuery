<?php
return array (
  'name' => '22MM图库美女图片写真',
  'from_url' => 'http://www.22mm.cc/',
  'other_url' => '22mm.cn',
  'charset' => 'utf-8',
  'replacerules' => '<meta charset="utf-8"{vivicut}<meta charset="gb2312"
{vivicutline}
html/html{vivicut}html
{vivicutline}
(22mm.cc){vivicut}
{vivicutline}
index.php?/{vivicut}/
{vivicutline}
Reserved 22{vivicut}Reserved&nbsp;
{vivicutline}
class="hotlist c_box"{vivicut}style="display:none"
{vivicutline}
{vivisign}images/logo.gif{vivicut}{vivisign}static/mm/logo.gif
{vivicutline}
id="imgString"{vivicut}style="display:none"
{vivicutline}
class="showFooter"{vivicut}style="display:none"
{vivicutline}
lj@22mm.cc
{vivicutline}
init_xiuna();
{vivicutline}
show_xiuna();
{vivicutline}
area_xiuna
{vivicutline}
{vivisign}js/tonji.js{vivicut}none
{vivicutline}
{vivisign}js/fenlei.js{vivicut}none
{vivicutline}
getImgString(){vivicut}for (i = 0; i < arrayImg.length; i++) {var arrayimgs = arrayImg[i];arrayimgs = arrayimgs.replace("big", "pic");document.write(\'<img src="\'+arrayimgs+\'">\');}',
  'siftrules' => '{vivi replace=\'\'}<ul class="imglink">(.*)</ul>{/vivi}[cutline]{vivi replace=\'\'}<ul class="textlink">(.*)</ul>{/vivi}',
  'replace' => '0',
  'rewrite' => '1',
  'licence' => '1.logo图片在static/mm/logo.gif，没有就新建，大小不要超过 188*60，否则变形',
  'siftags' => 
  array (
    0 => 'iframe',
    1 => 'localjs',
  ),
  'time' => 1408718296,
  'search_url' => 'search/',
  'search_charset' => 'utf-8',
  'from_title' => '22MM图库',
  'big52gbk' => '0',
  'other_imgurl' => 'qlimg1.meimei22.com',
);
?>