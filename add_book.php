<?php 
include_once('connection.php');
session_start();
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
	<script src="js/jquery.min.js"></script>
  <script src="js/script.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Charm:700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
</head>
<body class="librarian">
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
        <a href="librarian.php">Home</a>
      </li>
      <li>
        <a href="add_book.php">Add/Remove</a>
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
      <div class="str_insert clear">
        <div class="wrap">
            <li>
            <div class="form">
              <form id="myform">
                <input type="text" name="book_name" id="book_name" placeholder="Book name">
                <input type="text" name="book_author" id="book_author" placeholder="Book author">  
                <button type="button"  onclick="save_data()" class="btn">add</button><br><br>
              </form>
            </div>
          </li>
          <li>
            <div class="form">
              <form id="myformdel">
                <input type="text" name="book_namedel" id="book_namedel" placeholder="Book name">
                <input type="text" name="book_authordel" id="book_authordel" placeholder="Book name"> 
                <button type="button"  onclick="del_data()" class="btn">del</button><br><br>
              </form>
            </div>
          </li>
        </div>
      </div>
      <div class="messages">
        <div class="wrap">
          <div id="my_msg" class="my_msg"></div>
          <div id="my_data"></div>
        </div>
      </div>
    </section>
  </body>
</html>
<script>
	function save_data(){

    var book_name = $("#book_name").val();
    var book_author = $("#book_author").val();
    $.ajax({
      url:'add_books-db.php',
      data:{
        'action':'save',
      'book_name':book_name,
      'book_author':book_author
      },
      type:'POST',
      dataType:'html',

      success :function(data){
        $("#myform")[0].reset();
        $("#my_msg").html(data);
        show_data();
    }
    });
  }
  function del_data(){
    var book_namedel = $("#book_namedel").val();
    var book_authordel = $("#book_authordel").val();    
    $.ajax({
      url:'add_books-db.php',
      data:{
        'action':'del',
        'book_namedel':book_namedel,
        'book_authordel':book_authordel
      },
      type:'POST',
      dataType:'html',
      success:function(data){
        $("#myformdel")[0].reset();
        $("#my_msg").html(data);
        show_data();
      }
    });
  }
  function edit_data(book_id){
    myWindow = window.open("add_book-edit.php?book_id="+book_id, "myWindow", "width=500,height=450");
  }

	function show_data()
    {
            $.ajax({
            url :'add_books-db.php',
            data :{'action':'show'},
            type:'POST',
            dataType:'html',
            success  :function(data){
                $('#my_data').html(data);
               }
        });
    }




    
    $( document ).ready(function() {
    show_data();
});

</script>