<?php
include_once("connection2.php");
include_once("my_data.php");
session_start();
$curr_return_date1=0;
$stored_date1=0;
$stored_date=0;
$curr_return_date=0;
$user_name=$_SESSION['username'];
$action=$_REQUEST['action'];
switch($action){

        case 'save':
        $book_id=$_REQUEST['book_id'];
        $semister=$_REQUEST['semister'];
        $issue_date = date('Y-m-d H:i:s');
        $exp=strtotime("+1 Months");
        $return_date = date("Y-m-d h:i:sa", $exp); 
        echo $sql = "INSERT INTO `data2`(`book_id`,`semister`,`user_name`,`issue_date`,`return_date`) VALUE('$book_id','$semister','$user_name','$issue_date','$return_date')";
        $query  = $pdoconn->prepare($sql);
        $query->execute();

        break;

        case 'show':
$html='';
$html.='<table class="table table-dark">
            <tr>
                <th>SL.NO.</th>
                <th>BOOK NAME</th>
                <th>SEMESTER</th>
                <th>ISSUE DATE</th>
                <th>RETURN DATE</th>
                <th>RETURN</th>';



                 $sql = "SELECT `subject_id`,`book_id`,`semister`,`issue_date`,`return_date` FROM `data2` WHERE del_flg=0 AND user_name='$user_name'";
                 $query  = $pdoconn->prepare($sql);
                 $query->execute();
                 $arr_trade = $query->fetchAll(PDO::FETCH_ASSOC);
                 $slno=1;
                 foreach($arr_trade as $val) {
                 $book_id = $val['book_id'];
                 $semister = $val['semister'];
                $issue_date = $val['issue_date'];
                $return_date = $val['return_date'];                

                 $sql = "UPDATE `data1` SET `del_flg`=1,`return_date`='$return_date' where book_id=$book_id ";
                 $query  = $pdoconn->prepare($sql);
                 $query->execute();
                 $arr_trade = $query->fetchAll(PDO::FETCH_ASSOC);


                
                
                      if(isset($my_arr_trade[$book_id]))
                        $book_name=$my_arr_trade[$book_id];
                     else
                         $book_name="NOT FOUND";
                    
                    



           $html.='</tr>
                       <tr>
                                <td>'.$slno.'</td>
                                <td>'.$book_name.'</td>
                                <td>Semister-'.$semister.'</td>
                                <td>'.$issue_date.'</td>
                                <td>'.$return_date.'</td>
                                <td> <img src="images/delete.png" style="cursor: pointer" onclick="return_data('.$val['subject_id'].')"></td>
                        </tr>';

                        $slno++;
                }



$html.='</table><br><br><br><br><br>';

echo $html;

break;


    case 'return':

        
        $subject_id=$_REQUEST['subject_id'];


         $sql = "SELECT `return_date` FROM `data2` WHERE `del_flg`=0 AND subject_id=$subject_id";
                 $query  = $pdoconn->prepare($sql);
                 $query->execute();
                 $arr_fine = $query->fetchAll(PDO::FETCH_ASSOC);
                 foreach ($arr_fine as $fine){
                    $stored_date=$fine['return_date'];
                    // $stored_date1=strtotime($stored_date);
                    $curr_return_date = date('Y-m-d H:i:s');
                    // $curr_return_date1=strtotime($curr_return_date);

                    }
                    // if ($curr_return_date-$stored_date >0){
                    //     // echo ($curr_return_date1-$stored_date1);
                    //     echo ($curr_return_date-$stored_date);
                    // }
                    // else{
                        $sql ="UPDATE `data2` SET `del_flg`=1 WHERE `subject_id`=$subject_id";
                        $query  = $pdoconn->prepare($sql);
                        $query->execute();


                         $sql = "SELECT `book_id` FROM `data2` WHERE del_flg=1 AND `subject_id`=$subject_id";
                                 $query  = $pdoconn->prepare($sql);
                                 $query->execute();
                                 $arr_trade_2 = $query->fetchAll(PDO::FETCH_ASSOC);
                                 
                                 foreach($arr_trade_2 as $kal) {
                                 $book_id = $kal['book_id'];              


                                 $sql = "UPDATE `data1` SET `del_flg`=0,`return_date`='-----------' where book_id=$book_id ";
                                 $query  = $pdoconn->prepare($sql);
                                 $query->execute();
                                 $arr_trade_3 = $query->fetchAll(PDO::FETCH_ASSOC);
                                echo "Congratss!!!!!!You have no dues";
                                }
                             // }
        
        break;


}

?>