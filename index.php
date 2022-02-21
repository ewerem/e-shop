<?php

session_start();
ob_start();
include'connect/connect.php';

?>

<!--
	DESIGNED AND DEVELOPED BY
	WEBMASTER - 08141989603
-->

<!DOCTYPE html>
<html>
<head>
	<title>Home - shop</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css" />
    <link rel="stylesheet" href="style/materialize.css" type="text/css"/>
   
    <link rel="stylesheet" href="style/mystyle.css" type="text/css"/>
</head>
<body style="background:url(image/woodback.jpg);">

<div id="slider-image">
	
	<div id="navigate" class="nav-wrappers">

	<i class="fa fa-shopping-cart" style="padding:10px;margin-left: 50px;font-size:60px;color:violet"></i>

	    <center style="margin-top: -40px;">
	    	<a href="reg.php" id="mynav2"><i class="fa fa-user" style="font-size: 16px"></i> Sign Up</a>
	    	<a href="login.php" id="mynav2"><i class="fa fa-sign-in" style="font-size: 16px"></i> Login</a>
	    </center>

	</div>

	<br><br><br>
	<center>
		
	<h1 style="color:#880000;font-weight: bold;">
		- E - Commerce - <br>
		<i style="color:#440000;font-size: 16px;">Try us and you will never try any other...</i>
	</h1>
	
	  <a class="waves-effect waves-light btn-large purple lighten-2 dropdown-button" href='#' data-activates='dropdown1' style="border-radius: 50px;">Our Products <i class="fa fa-gift"></i></a>

	  <!-- Dropdown Structure -->
	  <ul id='dropdown1' class='dropdown-content' style="background:white;">
	  					<?php

		                    $get = $con->query("SELECT * FROM product_g");
		                    if($get->num_rows > 0){
		                      while($f = $get->fetch_object()){
		                 ?>

	    					<li>
	    						<a href="viewp.php?pg=<?= $f->name?>" style="color:#990000;font-size:12px">
	    							<?=$f->name?>
	    						</a>
	    					</li>

	    				 <?php
			 			 	}

			 			 }else{
			 			 	echo'<center style="color:red">No products Group !!</center>';
			 			 }

			 			 ?>
	    
	  </ul>

	</center>



</div>

 <nav class="nav-wrapper" style="background:violet;margin-top: -16px;">
    <p style="visibility: hidden;"> sjchvjsvhj </p>
 </nav>

 <div class="parallax-container valign-wrapper" id="para"> 
    <div id="How" class="container">
        <div class="col s12 m12 l12 scrollspy" id="about-us" style="height:auto">
	 		<center>
	 
	 			<h3 style="color:#fff;letter-spacing: 2px;padding: 5px;font-weight:bol;">
	 			- <i class="fa fa-gift"></i> OUR PRODUCTS -</h3>

	 		</center>

	 		<br/>
	 		<div class="container-fluid">
	 		
		 		<center>
		 			
			 		<table> 

			 			<tr>

			 			 <?php

		                    $get = $con->query("SELECT * FROM product_g");
		                    if($get->num_rows > 0){
		                      while($f = $get->fetch_object()){
		                 ?>

			 				<td>
				 				<center>
				 					<a href="viewp.php?pg=<?= $f->name?>">	
				 						<img src="admin/<?=$f->photo?>" style="width:150px;height:110px;border:5px solid violet;border-radius: 20px; ">
				 					</a>
				 					<a href="viewp.php?pg=<?= $f->name?>">
					 					<p style="color:white;letter-spacing: 1px;font-size: 18px;border:1px solid violet;padding:10px;border-radius: 50px;">
					 						<?= strtoupper($f->name) ?>
					 					</p>
				 					</a>
				 				</center>
			 				</td>
 
			 			 <?php
			 			 	}

			 			 }else{
			 			 	echo'<center style="color:yellow">No products Group !!</center>';
			 			 }

			 			 ?>
			 			
			 			</tr>

			 		</table>

		 		</center>

	 		</div>

 		</div>
        <div class="parallax"><img src="image/b4.jpg" alt="Unsplashed background img 2"></div>
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
<script src="javascript/jquery.backstretch.js"></script>
<script src="javascript/materialize.js"></script>
<script src="javascript/init.js"></script>

</body>
</html>