<?php
include_once("connection.php");


$book_id=$_REQUEST['book_id'];


$sql="SELECT book_name,book_author FROM data1 WHERE del_flg=0 AND book_id=$book_id";
$query=$pdoconn->prepare($sql);
$query->execute();
$arr_edit = $query->fetchALL(PDO::FETCH_ASSOC);


$book_name=$arr_edit[0]['book_name'];
$book_author=$arr_edit[0]['book_author'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>edit</title>
 	<script src="js/jquery.min.js"></script>
 	<script src="js/jquery.js"></script>
  <script src="js/script.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 	<div class="edit">
 		<div class="wrap">
 			<h4>EDIT</h4>
 			<div class="from_edit" id="from_edit">
 				<form id="myform">
 					<input type="text" id="book_name" value="<?php echo $book_name?>">
 					<input type="text" id="book_author" value="<?php echo $book_author?>">
 					<input type="hidden" id="book_id" value="<?php echo $book_id?>">
 					<button type="button" onclick="update_data()">UPDATE</button>
 				</form>
 			</div>
 		</div>
 	</div>
 	<div id="my_data"></div>
 </body>
 </html>
 <script>
 		function update_data() {
 					var book_id=$("#book_id").val();
 		 			var book_name =$("#book_name").val();
 		 			var book_author=$("#book_author").val();
 		 			$.ajax({
 		 				url:'add_books-db.php',
			            type:'POST',
			            dataType:'html',
 		 				data:{
 		 					'action':'update',
 		 					'book_id':book_id,
 		 					'book_name':book_name,
 		 					'book_author':book_author
 		 				},
 		 				success:function(data){
                		$('#my_data').html('');
               			 alert(data);
                		window.top.close();
                	}
 		 			});
 		 		} 		
 	</script>