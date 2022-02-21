<?php

session_start();
ob_start();
include'connect/connect.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>products</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css" />
    <link rel="stylesheet" href="style/materialize.css" type="text/css"/>
    <link rel="stylesheet" href="style/mystyle.css" type="text/css"/>
</head>
<body style="background:url(image/woodback.jpg);">

<div id="navigate" class="nav-wrappers">

	<i class="fa fa-shopping-cart" style="padding:10px;margin-left: 50px;font-size:60px;color:violet"></i>

	    <center style="margin-top: -50px;">
	    	<a href="index.php" id="mynav"><i class="fa fa-home" style="font-size: 16px"></i> Homepage</a>
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
	 
	 			<h3 style="color:#fff;letter-spacing: 2px;padding: 5px;font-weight:bol;">
	 			- <i class="fa fa-gift"></i> 
	 					<?php

			 				$pg = $_GET['pg'];

		                      	echo strtoupper($pg);

		                    
		                ?>
		         -
	 			</h3>

	 		</center>

	 		<br/>
	 		<div class="container-fluid">
	 		
		 			
			 		<div class="row">

			 			<?php

			 				$pg = $_GET['pg'];

		                    $get = $con->query("SELECT * FROM product WHERE pgroup = '$pg' ORDER BY id DESC");
		                    if($get->num_rows > 0){

		                      while($f = $get->fetch_object()){
		                ?>

		                		<div class="col s12 m6 l6">

		                		<table>
		                		<tr>
		                		<td>
				 				<center>
				 		
				 						<img src="admin/<?=$f->photo?>" style="width:160px;height:120px;border:5px solid violet;border-radius: 20px; ">
				 				
					 					<p style="color:white;letter-spacing: 1px;font-size: 14px;margin-top: -5px;">
					 						<i style="color: gold;">Name <i class="fa fa-arrow-right"></i></i> 
					 						<?= strtoupper($f->pname) ?> <br>
					 						<i style="color: gold;">Price <i class="fa fa-arrow-right"></i></i>
					 						&#x20A6;<?= strtoupper($f->price) ?>
					 					</p>

					 					<a href="login.php" class="btn purple lighten-1" style="width: 100px;">Buy</a>
				 					
				 				</center>
				 				</td>
				 				<td style="background: white;height: 190px;">

				 				<i style="color: black;font-weight: bold;color:purple;">Model <i class="fa fa-arrow-right"></i></i>
				 				<?= $f->model?>
				 				<p></p>
				 				<i style="color: black;font-weight: bold;color:purple;">Size <i class="fa fa-arrow-right"></i></i>
				 				<?= $f->size?>
				 				<p></p>
				 				<i style="color: black;font-weight: bold;color:purple;">Description <i class="fa fa-arrow-right"></i></i>
				 				<p style="font-size:12px important;height: 100px;overflow: auto;">
				 					<?= $f->description?>
				 				</p>

				 				</td>
				 				</tr>
				 				</table>
				 				<br>

				 				</div>

				 		<?php
			 			 	}


			 			 }

			 			 ?>

			 		</div>

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