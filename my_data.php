<?php
include_once("connection2.php");








$sql = "SELECT `book_id`,`book_name` FROM `data1`";
$query  = $pdoconn->prepare($sql);
$query->execute();
$my_arr = $query->fetchAll(PDO::FETCH_ASSOC);
$my_arr_trade=array();
foreach($my_arr as $val){
    $my_arr_trade[$val['book_id']]  = $val['book_name'].' ('.$val['book_id'].')';
}




?>