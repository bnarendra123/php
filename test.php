<html>
	<head>
		<style>
			.total{
				width:100%;
				height:100%;
			}
			.js{
				text-align:left;
				margin-top:50px; 
				margin-left:30px; 
				border: 1px solid black; 
				width:400px; 
				height:500px;
			}
			.jquery{
				margin-top:50px; 
				margin-right:50px; 
				border: 1px solid black;
				 width:600px; 
				 height:500px;
			}
		</style>
	</head>
</html>
<div class="total">
	<div class="js">
<form method="post" action="" name="myform">
	<p style="margin-top:20px; margin-left:10px;">
	Name : <input type="text" name="name"><br><br>
	email : <input type="text" name="email"><br><br>
	Password : <input type="text" name="password"><br><br>
	Password Contains 6 characters one special character,one number, one Upper case<br><br>
	Mobile Number : <input type="text" name="phone"><br><br>
	<input type="submit" name="submit" value="Submit" onclick="return check();">
	</p>
</form>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
function check(){
	var name=document.forms["myform"]["name"].value;
	var email=document.forms["myform"]["email"].value;
	var password=document.forms["myform"]["password"].value;
	var phone=document.forms["myform"]["phone"].value;
	var na=/^[a-zA-Z]+$/;
	var em= /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	var ps=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
	//var ps=/^[A-Za-z0-9\-!@#$%^&*]/;
	var ph=/^\d{10}$/;
	if(name=="",email=="",password=="",phone==""){
		alert("Please fill all the details");
	}else{
	if(name==""){
		alert("Please fill the Name");
	}else{
		if(!na.test(name)){
			alert("name contains only aplhabetics");
		}
		
	}
	if(email==""){
		alert("Please fill the validemail");
	}else{
		if(!em.test(email)){
			alert("Please fill valid email");
			
		}
	}
	if(password==""){
		alert("Please fill the password");
	}else{
		if(!ps.test(password)){
			alert("password not valid");
		}
	}
	if(phone==""){
		alert("Please enter Mobile number");
	}else{
		if(!ph.test(phone)){
			alert("Please fill 10 digit mobile number");
		}
	}
	return false;
}
}
</script>
</div>
<div class="jquery">
<form method="post" action="" name="myform">
	<p style="margin-top:20px; margin-left:10px;">
	Name : <input type="text" name="name" id="name"><span id="name1"></span><br><br>
	email : <input type="text" name="email" id="email"><span id="email1"></span><br><br>
	Password : <input type="text" name="password" id="password"><span id="password1"></span><br><br>
	Password Contains 6 characters one special character,one number, one Upper case<br><br>
	Mobile Number : <input type="text" name="phone" id="phone"><span id="phone1"></span><br><br>
	<input type="submit" name="submit" value="Submit" onclick="return checkjquery();">
	</p>
</form>
<script type="text/javascript">
	function checkjquery(){
		var name=$("#name").val();
		var email=$("#email").val();
		var password=$("#password").val();
		var phone=$("#phone").val();
		var na=/^[A-Za-z]+$/;
		var emailRegx=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		var errorcount=0;
		if(name==""){
			$("#name1").html("Please enter name");
			$("#name1").css("color","red");
			errorcount++;
		}else{
			$("#name1").html("");
		}
		if(!na.test(name)){
			$("#name1").html("Enter alphpbetics only");
			$("#name1").css("color","red");
			errorcount++;
			
		}else{
			$("#name1").html("");
		}
		if(email==""){
			$("#email1").html("Please enter name");
			$("#email1").css("color","red");
			errorcount++;
		}else{
			$("#email1").html("");
		}
		if(!emailRegx.test(email)){
			$("#email1").html("Please enter valid email address");
			$("#email1").css("color","red");
			errorcount++;
			
		}else{
			$("#email1").html("");
		}
		if(password==""){
			$("#password1").html("Please enter Password");
			$("#password1").css("color","red");
			errorcount++;
		}else{
			$("#password1").html("");
		}
		if(phone==""){
			$("#phone1").html("Please enter Mobile number");
			$("#phone1").css("color","red");
			errorcount++;
		}else{
			$("#phone1").html("");
		}
		if(errorcount>0)
		return false;
	}
</script>
</div>
</div>