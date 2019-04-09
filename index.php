<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-signin-client_id" content="**********************************">
<script src="https://apis.google.com/js/platform.js" async defer></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!--<script src="script.js" ></script>-->
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script>
	function onSignIn(googleUser)
{
var profile=googleUser.getBasicProfile();
$(".g-signin2").css("display","none");
$(".datahidden").css("display","block");
$(".maillogin").css("display","block");
$(".login100-form-btn ").css("display","none");
$(".wrap-input100 ").css("display","none");
$("#pic").attr('src',profile.getImageUrl());
$("#email").text();
$("#email1").val(profile.getEmail());
var gma=profile.getEmail();
document.getElementById("emai").value = gma;
<?php $abc = "<script>document.write(gma)</script>" ?>

}
function signOut()
{
	var auth2= gapi.auth2.getAuthInstance();
	auth2.signOut().then(function(){
		alert("Yoi have out");
		$(".g-signin2").css("display","block");
          $(".data").css("display","none");
});
}
 
	</script>
	<style>
.data{
	display:none;
}
.maillogin{
	display:none;
}
.datahidden{
	display:none;
}
</style>
<!--===============================================================================================-->
</head>
<body>
	<?php
	if (isset($_GET['verify'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "gmail";
		// Create connection
    $conn=new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $user = mysqli_real_escape_string($conn,$_GET['phone']); 	
    $res ="SELECT * FROM user_phone where phone='$user' ; ";
	$result = $conn->query($res);
    if ($result->num_rows != 0) {
    // output data of each row
	require('textlocal.class.php');
	$textlocal = new TextLocal(false,false,'Oq1Gohl3GlU-QTV8du04mGAYT0RC1xd3vjKOc3pdLP');
	$numbers =array($_GET['phone']);
	$sender = 'TXTLCL';
	$otp= mt_rand(100000,999999);
	$message = "Hello: Your OTP is  ".$otp;
	try{
	$result = $textlocal->sendSms($numbers,$message,$sender);
	setcookie('otp',$otp);
	echo "Otp succesffuly send";
	}catch(Exception $e){
	echo $e->getMessage();
	die('Error: '.$e->getMessage());
	}
	}
	}
	if (isset($_GET['validate']))
{
		$otpent=$_GET['pass'];
		if ($_COOKIE['otp']==$otpent){
			echo "Congratulations";
		}	
	}
	?> 
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
					<form action="valid.php" method="post" class="datahidden">
					<input type="text" name="email" id="emai"><br> 
					<input type="submit" value="Signin As" class="btn btn-info">
					</form>
					
				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Member's Login
					</span>
					<div class="g-signin2 text-center " data-onsuccess="onSignIn">
					</div>
					<br>
					<div class="wrap-input100" >
						<input class="input100" type="text" name="phone" placeholder="Phone Number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-mobile" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Get Otp" name="verify">
					</div>
					<br>
					<div class="wrap-input100 " >
						<input class="input100" type="number" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Verify" name="validate">
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
						<br>
					<!--</div>

					<div class="text-center p-t-136">-->
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>