<?php
include_once("connection.php");
session_start();
if(isset($_POST['login']))
{
	if(empty($_POST['username'])|| empty($_POST['pwd']))
	{
		$message='ALL FIELDS ARE REQUIRED';
	}
	else{
		$sql="SELECT username,pwd FROM register WHERE username=:username AND pwd=:pwd";
		$query = $pdoconn->prepare($sql);
		$query->execute(
			array(
				'username'=>$_POST["username"],
			    'pwd'=>$_POST["pwd"]
			)
		);
		$count=$query->rowCount();
		if($count>0){
			$_SESSION['username']=$_POST["username"];
			$username=$_POST['username'];
			$pwd=$_POST['pwd'];

			$sql = "SELECT librarian FROM register WHERE username='$username' AND pwd='$pwd'";
                $query  = $pdoconn->prepare($sql);
                $query->execute();
                $arr_librarian = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($arr_librarian as $val) {
                	$librarian=$val['librarian'];
                }
			if($librarian==1){
			header('location:librarian.php');
				}
			else{
				header('location:dashboard.php');
			}
		}
		else
		{
			$message='WRONG USERNAME OR PASSWORD';
		}
	}
}$msg_error='';
if(isset($_REQUEST['msg']))
{
	$msg_error+$_REQUEST['msg'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>LOGIN FORM</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
		<script>
  			AOS.init();
		</script>
	<div class="login clear">
		<div class="wrap">
			<div class="animation" data-aos="zoom-out-up">
				<div class="logcont">
					<h2>LOGIN</h2>
					<?php
				       if(isset($message))
				       {
				       	echo'<h4>'.$message.'</h4>';
				       }
					?>
					<div id="msg_error"> <?php echo $msg_error; ?>
					</div>
					<div class="forminput">
						<form class="form1" action="" method="post">
							<input type="text" name="username" id="username" placeholder="username" class="input"><br>
							<input type="password" name="pwd" action="" method="post" placeholder="password" class="input"><br>
							<button type="submit" name="login" class="button">login</button>
				        </form>
					</div>
					<i class="pad">Don't have an account?? <a href="register.php">Click Here</a></i>
				</div>
			</div>
		</div>
	</div>
</body>
</html>



















