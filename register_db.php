<?php session_start();
include_once("connection.php");
$action=$_REQUEST['action'];
switch ($action) {
	case 'save':
	// $msg='';
	// if(empty($_SESSION['captcha_code']) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
	// 	$msg.="the validation code does not match!";
	// }
	// else{
		$msg.="";
	$username=$_REQUEST['username'];
	$name=$_REQUEST['name'];
	$stream=$_REQUEST['stream'];
  $pwd=$_REQUEST['pwd'];
		$sql="SELECT user_id from register WHERE username='$username'";
		$query=$pdoconn->prepare($sql);
		$query->execute();
		$arr_trade=$query->fetchAll(PDO::FETCH_ASSOC);
		if(count($arr_trade)>0){
			echo"RECORD EXIST";
			break;
		}
		$sql="INSERT INTO register(username,pwd,stream,name) VALUE ('$username','$pwd','$stream','$name')";
		$query=$pdoconn->prepare($sql);
		$query->execute();
		echo "RECORD INSERTED";
		break;
	// }
	
}
?>