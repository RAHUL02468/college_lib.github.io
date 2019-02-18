<?php
include_once("connection.php");
$action = $_REQUEST['action'];
switch ($action) {
	case 'save':
		$book_name = $_REQUEST['book_name'];
		$book_author = $_REQUEST['book_author'];
		$sql= "SELECT book_id FROM data1 WHERE del_flg=0 AND book_name ='$book_name' AND book_author ='$book_author'";
		$query = $pdoconn->prepare($sql);
		$query->execute();
		$arr_book=$query->fetchAll(PDO::FETCH_ASSOC);
		if (count($arr_book)>0) {	    
			echo "book exist";
			break;			
		
	    }
	    else{
		$sql = "INSERT INTO data1 (book_name,book_author) VALUE ('$book_name','$book_author')";
		$query = $pdoconn->prepare($sql);
		$query ->execute();
		echo "book entered";
		break;
        }
    case 'del':
        	$book_namedel=$_REQUEST['book_namedel'];
        	$book_authordel=$_REQUEST['book_authordel'];
        	$sql = "UPDATE data1 SET libdel_flg=1 WHERE book_name='$book_namedel' AND book_author='$book_authordel' AND del_flg=0";
        	$query=$pdoconn->prepare($sql);
        	$query->execute();
        	

        	$sql = "SELECT book_id FROM data1 WHERE del_flg=0 AND book_name='$book_namedel' AND book_author='$book_authordel'";
        	$query=$pdoconn->prepare($sql);
        	$query->execute();
        	$arr_bookdel=$query->fetchAll(PDO::FETCH_ASSOC);
		if (count($arr_bookdel)>0) {	    
			echo "book deleted";
			break;	
	    }
	    else{
		echo "book is not present";
          	break;
          }
    case 'update':
          $book_id=$_REQUEST['book_id'];
          $book_name=$_REQUEST['book_name'];
          $book_author=$_REQUEST['book_author'];


          $sql="UPDATE `data1` SET `book_name`='$book_name',`book_author`='$book_author' WHERE `del_flg`=0 AND `book_id`='$book_id'";
          $query  = $pdoconn->prepare($sql);
        $query->execute();
        if($query)
            echo 'EDITED SUCCESSFULLY';
        else
            echo 'ERROR WHILE EDITING...';            
              break;
	 case 'show':
$html='';
$html.='<table class="table table-dark">
            <tr>
                <th scope="col">SL.NO.</th>
                <th scope="col">BOOK NAME</th>
                <th scope="col">BOOK AUTHOR</th>
                <th scope="col">AVIALABLE/NOT-AVIALABLE</th>
                <th scope="col">REUTRNING-DATE</th>
                <th scope="col">EDIT</th>';

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
                <td> <img src="images/edit.png" style="cursor: pointer" onclick="edit_data('.$val['book_id'].')"></td>

            </tr>';

                    $slno++;
                }



$html.='</table>';

  echo $html;
        break;

}
?>