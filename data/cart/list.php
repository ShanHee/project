<?php
/**
* 获取当前登录用户的购物车内容
*/
header('Content-Type: application/json;charset=UTF-8');

session_start();

if(! @$_SESSION['loginUid']){
  $_SESSION['pageToJump'] = 'cart.html';
  die('{"code":300, "msg":"login required"}');
}
require_once('../init.php');
//获取总记录数
$sql = "SELECT s.iid,h.mname,m.mid,l.spno,l.tupian,l.name,l.jiage,s.count FROM shangpin l, shoppingcart_item s,merchant_item m,shanghu h WHERE s.pid=m.pid AND m.mid=h.id AND l.id=s.pid AND s.uid=$_SESSION[loginUid]";
$result = mysqli_query($conn, $sql);
$list =mysqli_fetch_all($result, MYSQLI_ASSOC);
//查询每个商品的第一幅小图片
//foreach($list as $i=>$p){
//  $sql = "SELECT sm FROM xz_laptop_pic WHERE laptop_id=$p[lid] LIMIT 1";
//  $result = mysqli_query($conn, $sql);
//  $row = mysqli_fetch_row($result);
//  $list[$i]['pic'] = $row[0];
//}
$output = [
  'code'=>200,
  'data'=>$list
];
echo @$_GET['callback'].json_encode($output);