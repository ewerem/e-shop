<?php

session_start();
ob_start();
include'connect/connect.php';

if(!isset($_SESSION['customer'])){

  header('location:login.php');

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>products - customer</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css" />
    <link rel="stylesheet" href="style/materialize.css" type="text/css"/>
    <link rel="stylesheet" href="style/scroll.css" type="text/css"/>
    <link rel="stylesheet" href="style/mystyle.css" type="text/css"/>
</head>
<body style="background:url(image/woodback.jpg);">
 
<div id="navigate" class="nav-wrappers">
	<a href="v-order.php" title="View Orders">
	<i class="fa fa-shopping-cart" style="padding:10px;margin-left: 50px;font-size:60px;color:violet"></i>
	<span style="font-size: 40px;color: violet;">
					<?php

	 					$em = $_SESSION['customer'];

				        $get = $con->query("SELECT * FROM order_g WHERE email = '$em' ");
				        if($get->num_rows > 0){
				         echo '('. $get->num_rows.')';  
				    	}
				    ?>
	</span>
	</a>

	<br><br><br>

	    <center style="margin-top: -100px;">
	    	
	    	<a class="waves-effect waves-light btn-large purple lighten-2 dropdown-button" href='#' data-activates='dropdown1' style="border-radius: 50px;">Our Products <i class="fa fa-gift"></i></a>
	    	<!-- Dropdown Structure -->
			  <ul id='dropdown1' class='dropdown-content' style="background:white;">
			  					<?php

				                    $get = $con->query("SELECT * FROM product_g");
				                    if($get->num_rows > 0){
				                      while($f = $get->fetch_object()){
				                 ?>

			    					<li>
			    						<a href="cus-v.php?pg=<?= $f->name?>" style="color:#990000;font-size:12px">
			    							<?=$f->name?>
			    						</a>
			    					</li>			    					

			    				 <?php
					 			 	}

					 			 }

					 			 ?>
			    

			  </ul>
			  <a href="logout.php" id="mynav" style="color: red !important;background: none;box-shadow: 0 0 10px red;border: none;"><i class="fa fa-sign-out" style="font-size: 16px;color: red !important"></i> logout</a>
	    </center>

	    <p style="color: white;float: right;margin-top: -20px;margin-right: 10px;"> <i class="fa fa-user"></i> <?=$_SESSION['customer']?></p>

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
	 			- <i class="fa fa-gift"></i> All Products -
	 			</h3>

	 		</center>

	 		<br/>
	 		<div class="container-fluid">
	 		
		 		<center>
		 			
			 		<div class="row">

			 			<?php

		                    $get = $con->query("SELECT * FROM product ORDER BY id DESC");
		                    if($get->num_rows > 0){

		                      while($f = $get->fetch_object()){
		                ?>
		                		<div class="col s12 m6 l6">

				 				<table>
		                		<tr style="height: 270px;overflow: auto;">
		                		<td>
				 				<center>
				 		
				 						<img src="admin/<?=$f->photo?>" style="width:160px;height:120px;border:5px solid violet;border-radius: 20px; ">
				 				
					 					<p style="color:white;letter-spacing: 1px;font-size: 14px;margin-top: -5px;">
					 						<i style="color: gold;">Name <i class="fa fa-arrow-right"></i></i> 
					 						<?= strtoupper($f->pname) ?> <br>
					 						<i style="color: gold;">Price <i class="fa fa-arrow-right"></i></i>
					 						&#x20A6;<?= strtoupper($f->price) ?>
					 					</p>

					 					<a href="order.php?id=<?=$f->id?>&pn=<?=$f->pname?>&pr=<?=$f->price?>&ps=<?=$f->size?>&pm=<?=$f->model?>" class="btn purple lighten-1" style="width: 100%;">
					 						<i class="fa fa-plus"></i> order
					 					</a>
				 					
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

		 		</center>

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