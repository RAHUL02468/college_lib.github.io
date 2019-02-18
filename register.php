<?php include_once('connection.php');
session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>SIGN UP PAGE</title>
        <link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	</head>
	<body>
		<script>
  			AOS.init();
		</script>
		<section>
			<div class="signup clear" >
				<div class="wrap">
					<div class="animation" data-aos="zoom-in-right">
						<div class="signcont">										
							<h2>SIGN UP</h2>
							<div class="form">
								<form id="form1" class="form1">
									<input type="text" name="name" id="name" required placeholder="name" onkeypress="return onlyAlphabets(event,this);" class="input"><br>
									<input type="text" name="stream" id="stream" required placeholder="stream" onkeypress="return onlyAlphabets(event,this);" class="input"><br>
									<input type="text" name="username" id="username" required placeholder="username" onkeypress="return onlyAlphabets(event,this);" class="input"><br>
									<input type="password" name="pwd" id="pwd" required placeholder="password" onkeypress="return onlyAlphabets(event,this);" class="input"><br>

									<!-- <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
									    <?php if(isset($msg)){?>
									    <tr>
									      <td align="center"><?php echo $msg;?></td>
									    </tr>
									    <?php } ?>
									    <tr>
									      <td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
									        <label for='message'>Enter the code above here :</label>
									        <br>
									        <input id="captcha_code" name="captcha_code" type="text">
									        <br>
									        <span>Can't read the image? click </span><a href='javascript: refreshCaptcha();'>here</a> <span>to refresh.</span>
									      </td>
									    </tr>
								  	</table> -->

									<input type="button" name="save-btn" id="btn_save" value="save" onclick="save_data()" class="button">
								</form>
							</div>
							<i class="pad">wanna Login click <a href="login.php">here</a></i>							
							<div id="my_data"></div>
						</div>
					</div>
			  	</div>
				
			</div>
		</section>
	</body>
</html>
	

    
<script>
	function refreshCaptcha(){
		var img = document.images['captchaimg'];
		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
	}
	function save_data()
	{
		var username=$("#username").val();
		var pwd=$("#pwd").val();
		var name=$("#name").val();
		var stream=$("#stream").val();
		var str="RECORD EXIST";
		// var code=$("#captcha_code").val();
		if (username.length<1 || pwd.length<1 || name.length<1 || stream.length<1)
		{
			alert("all fields are mandatory");
			return;
		}
		
	$.ajax({
		url:'register_db.php',
		type:'POST',
		dataType:'html',
		data:{
			'action':'save',
			'username':username,
			'pwd':pwd,
			'stream':stream,
			'name':name
		},
		success :function(data){
			if(str==data){
				$('#my_data').html(data);
				$('#form1')[0].reset();
				
			}
			else{
				$('#my_data').html(data);
				$('#form1')[0].reset();
				
			}
		}
	});
	}
</script>
<script src="jquery.min.js"></script>