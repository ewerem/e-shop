<?php

session_start();
ob_start();
include'connect/connect.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>sign in</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css" />
    <link rel="stylesheet" href="style/materialize.css" type="text/css"/>
    <link rel="stylesheet" href="style/scroll.css" type="text/css"/>
    <link rel="stylesheet" href="style/mystyle.css" type="text/css"/>
</head>
<body style="background:url(image/woodback.jpg);">

<div id="navigate" class="nav-wrappers">

	<i class="fa fa-shopping-cart" style="padding:10px;margin-left: 50px;font-size:60px;color:violet"></i>

	    <center style="margin-top: -50px;">
	    	<a href="index.php" id="mynav2"><i class="fa fa-home" style="font-size: 16px"></i> Homepage</a>
	    	<a href="reg.php" id="mynav2"><i class="fa fa-user" style="font-size: 16px"></i> Register</a>
	    </center>

	    </center>

</div>

<br/>

 <nav class="nav-wrapper" style="margin-top: -15px;background:violet ;">
    <p style="visibility: hidden;"> sjchvjsvhj </p>
 </nav>

 <div class="parallax-container valign-wrapper" id="para"> 
    <div id="How" class="container">
        <div class="col s12 m12 l12 scrollspy" id="about-us" style="height:auto">
	 		<center>
	 
	 			<h4 style="color:#fff;letter-spacing: 2px;padding: 5px;font-weight:bol;">
	 			- <i class="fa fa-sign-in"></i> Login -
	 			</h4>

	 		</center>

	 		<br/>
	 		<div class="container-fluid">


	 			<form method="post">

	 				<div class="row">
	 			

				    <div class="input-field col s12">
				        <input id="last_name" name="email" type="email" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> E - mail</label>
				    </div>

				    

				    <div class="input-field col s12">
				        <input id="last_name" name="pass" type="password" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-lock"></i> Password</label>
				    </div>

				    

				    </div>

				    <br/>
				    <center>

				    <button name="sub" class="waves-effect waves-light purple darken-1 btn-large">Submit <i class="fa fa-arrow-right"></i></button>
				    <a href="fp.php" class="waves-effect waves-light btn-large" style="background: #880000;">forget password <i class="fa fa-question"></i></a>

	 				</center>

	 			</form>
	 			<br>
		 		
		 		<?php
		 			if(isset($_POST['sub'])){

		 				$pa = $_POST['pass'];
		 				$em = $_POST['email'];
		 				
		 				$get = $con->query("SELECT * FROM customer WHERE email = '$em' and pass = '$pa'");
		 				if($get->num_rows > 0){

		 					$_SESSION['cust'] = $em;
		 					header('location:em-pass.php');

		 				}else{

		 					echo'<script>alert("You are not a customer here !!");</script>';
		 				}

		 			}

		 		?>

	 		</div>

 		</div>
        <div class="parallax"><img src="image/sh1.jpg" alt="Unsplashed background img 2"></div>
    </div>
</div>


 <div class="nav-wrapper" style="margin-top:-16px;background: violet ;">
    <p style="visibility: hidden;"> sjchvjsvhj </p>
 </div>

 <div id="footer">
	 <center>
	 	<p style="color:white;letter-spacing: 2px;word-spacing: 2px;">
	 		HND 2 Computer Science Project<br/>
	 		Shopping made easy anywhere......
	 	</p>
	 </center>
 </div>




<!-- scripting file -->
<script src="javascript/jquery-2.1.1.min.js"></script>
<script src="javascript/materialize.js"></script>
<script src="javascript/init.js"></script>

</body>
</html>