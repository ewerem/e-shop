<?php

session_start();
ob_start();
include'../connect/connect.php';

if(!isset($_SESSION['admint'])){

  header('location:adminlogin.php');

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>adminlogin</title>
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome.css" />
    <link rel="stylesheet" href="../style/materialize.css" type="text/css"/>
    <link rel="stylesheet" href="../style/scroll.css" type="text/css"/>
    <link rel="stylesheet" href="../style/mystyle.css" type="text/css"/>
</head>
<body style="background:url(../image/woodback.jpg);">

<div id="navigate" class="nav-wrappers">

	<i class="fa fa-shopping-cart" style="padding:10px;margin-left: 50px;font-size:60px;color:violet"></i>

	    <center style="margin-top: -50px;">
	    	<a href="../index.php" id="mynav"><i class="fa fa-home" style="font-size: 16px"></i> Homepage</a>
	    </center>

</div>

<br/>

 <div class="nav-wrapper" style="margin-top: -15px;background:violet ;">
    <p style="visibility: hidden;"> sjchvjsvhj </p>
 </div>

 <div class="parallax-container valign-wrapper" id="para" style="margin-top: -15px;"> 
    <div id="How" class="container">
        <div class="col s12 m12 l12 scrollspy" id="about-us" style="height:auto">
        <br>
	 		<center>
	 			<h4 style="color:#fff;letter-spacing: 2px;padding: 5px;font-weight:bol;">
	 			- <i class="fa fa-sign-in"></i> Answer Security Question -
	 			</h4>
	 		</center>

	 		<br/><br>
	 		<div>
	 		
	 			<form method="post">

	 				<div class="row">

					   <?php

				    	$query = $con->query("SELECT * FROM aques ORDER BY id DESC");
				    	if($query->num_rows > 0){

				    		while($f = $query->fetch_object()){
				    ?>

				     <div class="input-field col s12">
				        <input id="last_name" name="ans" type="password" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> <?=$f->ques?> ?</label>
				    </div>


				    <?php

				    	}

				    	}

				    ?>
				    

				    </div>

				    <br/>
				    <center>

				    <button name="sub" class="waves-effect waves-light purple darken-1 btn-large">login <i class="fa fa-arrow-right"></i></button>

	 				</center>

	 			</form>
	 			<br>
		 		
		 		<?php
		 			if(isset($_POST['sub'])){

		 				$em = $_SESSION['admint'];

		 				$pa = $_POST['ans'];
		 				
		 				$get = $con->query("SELECT * FROM admin WHERE ans = '$pa'");
		 				if($get->num_rows > 0){

		 					$_SESSION['admin'] = $em;
		 				
		 					header('location:adminp.php');

		 				}else{

		 					echo'<script>alert("Sorry Wrong Answer to Question !!");</script>';
		 					echo"<meta http-equiv='refresh'content='1;url=adminlogin.php'>";
		 				}

		 			}

		 		?>


	 			<br>

	 		</div>

 		</div>
        <div class="parallax"><img src="" alt=""></div>
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
<script src="../javascript/jquery-2.1.1.min.js"></script>
<script src="../javascript/materialize.js"></script>
<script src="../javascript/init.js"></script>

</body>
</html>