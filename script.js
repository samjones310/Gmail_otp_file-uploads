function onSignIn(googleUser)
{
var profile=googleUser.getBasicProfile();
$(".g-signin2").css("display","none");
$(".data.hidden").css("display","block");
$(".maillogin").css("display","block");
$(".login100-form-btn ").css("display","none");
$(".wrap-input100 ").css("display","none");
$("#pic").attr('src',profile.getImageUrl());
$("#email").text();
$("#email1").val(profile.getEmail());
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
 