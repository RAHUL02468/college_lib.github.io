<?php include_once('connection2.php');
session_start();
$username=$_SESSION['username'];?>
<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Charm:700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>books avialable</title>

  
</head>
<body class="books_available">
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
    <div class="search-bar clear">
      <div class="form">
        <form id="search_form" class="search_form">
          <input type="text" name="search" id="search" placeholder="Book name" required="book name">
          <button type="submit" onclick="search_data()" class="btn">SEARCH</button>         
        </form>
      </div>
    </div>
    <div class="save_data clear">
      <div class="wrap">
        
      </div>
    </div>
      <div class="str_insert clear">
        <div class="wrap">
          <div class="form-box">
            <!-- <div id="my_msg" class="my_msg"></div> -->
            <div class="save_msg" id="save_msg"></div>
            <div id="my_data"></div>
          </div>
        </div>
      </div>
   </section>
</body>
</html>
<script>
	


	function show_data()
    {
            $.ajax({
            url :'books_available-db.php',
            data :{'action':'show'},
            type:'POST',
            dataType:'html',
            success  :function(data){
                $('#my_data').html(data);
               }
        });
    }

  function search_data(){
    var book_name=$("#search").val();
    var check="book not found";
    $.ajax({
      url:'books_available-db.php',
      data:{
        'action':'search',
        'book_name':book_name
      },
      type:'POST',
      dataType:'html',
      success:function(data){
        alert(data);
        if (data==check){
          $('#search_form')[0].reset();
          $('#save_msg').html(data);
        }
        else{
          $('#search_form')[0].reset();
          $('#save_msg').html(data);
        }
        show_data();
      }
    });
  }
    
    $( document ).ready(function() {
    show_data();
});
      // function search_data(){
  //   var book_name=$("#search").val();
  //   var check="no data";
  //   $.ajax({
  //     url:'books_available-db.php',
  //     data:{
  //       'action':'search',
  //       'book_name':book_name
  //     },
  //     type:'POST',
  //     dataType:'html',
  //     success:function(data){
  //       if (data==check){
  //         $('#search_form')[0].reset();
  //         $('#my_msg').html(data);
  //       }
  //       else{
  //         $('#my_msg').empty();
  //         $('#search_form')[0].reset();
  //         $('#my_data').empty();
  //         $('#my_data').html(data);
  //       }
  //     }
  //   });
  // }

</script>