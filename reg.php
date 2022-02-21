<?php

session_start();
ob_start();
include'connect/connect.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
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
	    	<a href="login.php" id="mynav2"><i class="fa fa-sign-in" style="font-size: 16px"></i> Login</a>
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
	 			- <i class="fa fa-user"></i> Sign Up-
	 			</h4>

	 		</center>

	 		<br/>
	 		<div class="container-fluid">


	 			<form method="post">

	 				<div class="row">
	 				<div class="input-field col s6">
				    	<input id="last_name" name="fname" type="text" class="validate" style="color:gold;" required/>
				         <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Fullname</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="email" type="email" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> E - mail</label>
				    </div>

				    <div class="input-field col s6">
				    	<input id="last_name" name="phone" type="number" class="validate" style="color:gold;" required/>
				         <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Phone Number</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="dadd" type="text" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Delivery Address</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="add" type="text" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i>Home Address</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="pass" type="password" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-lock"></i> Password</label>
				    </div>

				    <div class="input-field col s12">
				        <input id="last_name" name="cpass" type="password" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-lock"></i> Confirm Password</label>
				    </div>

				    <?php

				    	$query = $con->query("SELECT * FROM cques ORDER BY id DESC");
				    	if($query->num_rows > 0){

				    		while($f = $query->fetch_object()){
				    ?>

				     <div class="input-field col s12">
				        <input id="last_name" name="ans" type="text" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> <?=$f->ques?> ?</label>
				    </div>


				    <?php

				    	}

				    	}

				    ?>

				    

				    </div>

				    <br/>
				    <center>
				    <button name="sub" class="waves-effect waves-light purple darken-1 btn-large	">Submit <i class="fa fa-arrow-right"></i></button>
	 				</center>

	 			</form>
	 			<br>
		 		
		 		<?php
		 			if(isset($_POST['sub'])){

		 				$fn = $_POST['fname'];
		 				$em = $_POST['email'];
		 				$ph = $_POST['phone'];
		 				$da = $_POST['dadd'];
		 				$ad = $_POST['add'];
		 				$pa = $_POST['pass'];
		 				$cpa = $_POST['cpass'];

		 				$an = $_POST['ans'];

		 				if($pa != $cpa){

		 					echo'<script>alert("password mis-match");</script>';

		 				}else{

		 					$ins = $con->query("INSERT INTO customer VALUES (null, '$fn', '$em', '$ph', '$da', '$ad', '$pa', '$an')");

		 					if($ins){

		 						echo'<script>alert("successful !!");</script>';

		 					}
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