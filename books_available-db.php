<?php
include_once("connection2.php");
$action=$_REQUEST['action'];

switch($action){
    case 'show':
$html='';
    $html.='<table class="table table-dark">
            <tr>
                <th scope="col" style="width:25%;">SL.NO.</th>
                <th scope="col"  style="width:25%;">BOOK NAME</th>
                <th scope="col" style="width:25%;">BOOK AUTHOR</th>
                <th scope="col" style="width:25%;">AVIALABLE/NOT-AVIALABLE</th>
                <th style="width:25%;">REUTRNING-DATE</th>';

                $sql = "SELECT `book_id`,`book_name`,`book_author`,`del_flg`,`return_date` FROM `data1` WHERE libdel_flg=0";
                $query  = $pdoconn->prepare($sql);
                $query->execute();
                $arr_trade = $query->fetchAll(PDO::FETCH_ASSOC);
                $slno=1;
                foreach($arr_trade as $val)
                {
                    $book_name = $val['book_name'];
                    $book_author = $val['book_author'];
                    $del_flg  = $val['del_flg'];
                    $book_id=$val['book_id'];
                    $return_date=$val['return_date'];
                    
                    if($del_flg==0){
                        $del_flg= "AVIALABLE";
                        $return_date="-----------";
                    }
                    else{
                        $del_flg = "NOT-AVIALABLE";
                        $return_date=$val['return_date'];
                    }
                    $html.=' </tr>
                    <tr>
                        <td>'. $slno.'</td>
                        <td>'.$book_name.'</td>
                        <td>'.$book_author.'</td>
                        <td>'.$del_flg.'</td>
                        <td>'.$return_date.'</td>

                    </tr>';

                    $slno++;
                }
    $html.='</table>';

            echo $html;
        break;


    case 'search':
    $book_name=$_REQUEST['book_name'];
    $sql="SELECT * FROM data1 WHERE book_name LIKE '%".$book_name."%' AND del_flg=0 AND libdel_flg=0";
    $query=$pdoconn->prepare($sql);
    $query->execute();
    $arr_search=$query->fetchAll(PDO::FETCH_ASSOC);
    $find=0;
    $entries=0;
    foreach($arr_search as $search)
                {
                    $book_name = $search['book_name'];
                    // $book_author = $search['book_author'];
                    // $del_flg  = $search['del_flg'];
                    // $book_id=$search['book_id'];
                    // $return_date=$search['return_date'];
                    
                    // if($del_flg==0){
                    //     $del_flg= "AVIALABLE";
                    //     $return_date="-----------";
                    // }
                    // else{
                    //     $del_flg = "NOT-AVIALABLE";
                    //     $return_date=$search['return_date'];
                    // }
                    $find=1;
                    $entries+=1;
                }
    if($find==1){
        echo 'total '.$entries.' enteries found';
    }
    else{
        echo "book not found";
    }
    break;



}


?>





    