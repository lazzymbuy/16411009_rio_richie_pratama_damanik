
<!--
Author: Richie Damanik
-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="login/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script>
	function myFunction()
		{
			alert("Welcome to Parking System Web Application");
		}
</script>
</head>
 
<body>
	<div class="main">
		<h1 align="center" style="font-size: 300%">E-Parking System</h1>
		<div class="user">
			<img src="login/images/user.png" alt="">
		</div>
		<div class="login">
			<div class="inset">
				<!-----start-main---->
				<form action="login.php" method="post" name="form_login">
			         <div>
						<span><label>Username</label></span>
						<span><input name="username" type="text" class="textbox" id="active"></span>
					 </div>
					 <div>
						<span><label>Password</label></span>
					    <span><input name="password" type="password" class="password"></span>
					 </div>
					<div class="sign">
						<div class="submit">
						  <input type="submit" onclick="myFunction()" value="LOGIN" >
						</div>
						<span class="forget-pass">
							<a href="#">Forgot Password?</a>
						</span>
							<div class="clear"> </div>
					</div>
					</form>
				</div>
			</div>
		<!-----//end-main---->
		</div>
		 <!-----start-copyright---->
   					<div class="copy-right">
						<p>Design by <a href="http:Richie Damanik">Richie Damanik</a></p> 
					</div>
				<!-----//end-copyright---->
	 
</body>
</html>