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
//$sql = "SELECT s.iid,l.spno,l.tupian,l.name,l.jiage,s.count FROM shangpin l, shoppingcart_item s WHERE l.id=s.pid AND s.uid=$_SESSION[loginUid]";
$sql="SELECT pid FROM shoppingcart_item WHERE uid=$_SESSION[loginUid]"; //uid => pid
$result = mysqli_query($conn, $sql);
$list =mysqli_fetch_all($result, MYSQLI_ASSOC);//  [[0]=>["pid"=>"1"],[1]=>...]

$row=[];
foreach($list as $i=>$product){
    $sql = "SELECT mname FROM shanghu WHERE id=
        (SELECT mid FROM merchant_item WHERE pid=$product[pid])";
    $result=mysqli_query($conn,$sql);
    $row[]=mysqli_fetch_all($result, MYSQLI_ASSOC);
}
$colour_count = count($poll_colours);
$poll_colours = array_map('ltrim', $poll_colours);
sort($poll_colours);
foreach($poll as $key => $value) {
    $poll[$key]['colour'] = $poll_colours[$key % $colour_count];
}
print_r($row[3]);
//var_dump($row);
//foreach ($row as $i=>$item){
//    var_dump($item[$i]);
//    if(stripos($row[$i],$item["mname"])){
//        echo $row[$i];
//    }
//}
//$row 去重

//$m[$row[0,1,2,3]]=[{},{},{}];


/*
$result = mysqli_query($conn, $sql);
$cart = mysqli_fetch_all($result, MYSQLI_ASSOC);
var_dump($cart);


foreach($cart as $i=>$name){
 foreach($list as $m=>$p){
  $sql="SELECT s.iid,l.spno,l.tupian,l.name,l.jiage,s.count FROM shangpin l, shoppingcart_item s where m.pid=$p[pid] and $name[name]=l.pubren;
  $result = mysqli_query($conn, $sql);
  $data =mysqli_fetch_all($result, MYSQLI_ASSOC);
  $list[$m] = $data;
    }
  $cart[$i]['data']= $list[$m];
}
$output = [
  'code'=>200,
  'data'=>$cart[$i]['data']
];
echo json_encode($output);*/