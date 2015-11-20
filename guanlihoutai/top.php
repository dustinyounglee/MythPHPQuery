<?php
$week= array('日','一','二','三','四','五','六');
$shijian=date('Y年m月d日').'&nbsp;星期'.$week[date('w')];

include('template/top.php');
?>