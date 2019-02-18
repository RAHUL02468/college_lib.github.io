<?php
include_once ("connection2.php");
session_start();
$username=$_SESSION['username']; 
?>

<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Charm:700" rel="stylesheet">
	<title>dashbord</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>

</head>
<body class="books_issue">
	<script>
		AOS.init();
	</script>
	<div class="heading">
		<div class="wrap">
			<div class="library">
		<p>LIBRARY</p>
		</div>
		<div class="navbar">
			<li>
				<a href="dashboard.php">Home</a>
			</li>
			<li>
				<a href="books_available.php">Books available</a>
			</li>
			<li>
				<a href="books_issue.php">Issue</a>
			</li>	
			<li>
				<div class="dropdown">
					<button class="dropbtn"><?php echo $username ?>
					    <i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
					    <a href="#image">image</a>
					    <a href="logout.php">Log out</a>
					</div>
				</div>
			</li>			 
		</div>
		</div>
	</div>
	<section>
		<div class="form-box">		
			<div class="wrap">
				<form id="myform">
					<span class="text bold">BOOK NAME:</span>
					<select class="input-two" name="book_id" id="book_id">
						<?php
							$sql = "SELECT `book_id`,`book_name`FROM `data1` where del_flg=0 AND libdel_flg=0";
		                    $query  = $pdoconn->prepare($sql);
		                    $query->execute();
		                    $arr_stream_name = $query->fetchAll(PDO::FETCH_ASSOC);
						?>
						<option value="0">CHOOSE ITEM</option>
						<?php
							foreach ($arr_stream_name as $val)
							{
							$value=$val['book_id'];

	                         echo '<option value="'.$value.'">'.$val['book_name'].'</option>';
	                        }
						?>
					</select><br>
					<span class="text bold">SEMESTER:</span>
					<select class="input-three" required name="semister" id="semister">
						<option value="0">Select</option>
	                    <option value="1">Semester-1</option>
	                    <option value="2">Semester-2</option>
	                    <option value="3">Semester-3</option>
	                     <option value="4">Semester-4</option>
	                    <option value="5">Semester-5</option>
	                    <option value="6">Semester-6</option>
	                     <option value="7">Semester-7</option>
	                    <option value="8">Semester-8</option>
					</select><br>		
					<button type="button"  onclick="save_data()" class="btn">ISSUE</button>
				</form>
			</div>
		</div>
		<div class="wrap">
				<div id="my_data"></div>
				<div class="clear"></div>
		</div>
	</section>
</body>
</html>
	
	<script>
		function save_data() {
			var book_id=$("#book_id").val();
			var semister=$("#semister").val();
	        $.ajax({
	            url :'books_issue-db.php',
	            type:'POST',
	            dataType:'html',
	            data :{
	                    'action':'save',
	                    'semister':semister,
	                    'book_id':book_id
	                },
	            
	            
	            success  :function(data){
	               $('#my_data').html(data);
	               $('#myform')[0].reset();
	               //$('#btn_save').prop("disabled", false);
	               show_data();
	            }
	        });
			}
		function show_data()
	    	{

	       $.ajax({
	            url :'books_issue-db.php',
	            type:'POST',
	            dataType:'html',
	            data :{'action':'show'},
	            
	            success  :function(data){
	                $('#my_data').html(data);
	               }
	        });
	    }
	    
    function return_data(subject_id)
    {
    
      $.ajax({
            url :'books_issue-db.php',
            type:'POST',
            dataType:'html',
            data :{
                  'action':'return',
                  'subject_id':subject_id
            },
            
            
            success  :function(data){
               $('#my_data').html(data);

               alert(data);
               show_data();
               }
        });
    }



    $( document ).ready(function() {
    show_data();
});


	</script>