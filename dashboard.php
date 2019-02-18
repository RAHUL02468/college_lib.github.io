<?php
session_start();
$username=$_SESSION['username'];?>


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
</head>
<body class="dashboard">
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
   <div data-aos="zoom-out-up">   
	   <div class="booktext">
	   	<div class="wrap">
	   		<li>
	   		<p>“Reading is everything. Reading makes me feel like I’ve accomplished something, learned something, become a better person. Reading makes me smarter. Reading gives me something to talk about later on. Reading is the unbelievably healthy way my attention deficit disorder medicates itself. Reading is escape, and the opposite of escape; it’s a way to make contact with reality after a day of making things up, and it’s a way of making contact with someone else’s imagination after a day that’s all too real. Reading is grist. Reading is bliss.”<br>
	   						<i>-------Nora Ephron</i></p>
	   	</li>
	   	<li>
	   		<p>"Reading is an exercise in empathy. To read is to enter another world in a way different from any other art form. The reader is actively participating, activating the pages of a book simply by picking it up and beginning. We discover through reading that we are less alone, as the inner lives of characters on the page become accessible to us. No matter how foreign or different a life experience might be, the writer is always saying to the reader, and the reader to the writer, me too. I’ve been there too."<br>
	   						<i>--------Dani Shapiro</i></p>
	   	</li>
	   	</div>
	</div>
   </div>
   </section>
	
</body>
</html>
