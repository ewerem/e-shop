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
	<title>view order</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css" />
    <link rel="stylesheet" href="style/materialize.css" type="text/css"/>
    <link rel="stylesheet" href="style/scroll.css" type="text/css"/>
    <link rel="stylesheet" href="style/mystyle.css" type="text/css"/>
</head>
<body style="background:url(image/woodback.jpg);">

<div id="navigate" class="nav-wrappers">

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

	    <center style="margin-top: -50px;">
	    	<a href="cus-viewp.php" id="mynav3"><i class="fa fa-arrow-left" style="font-size: 16px"></i> Products</a>
	    </center>

	    <p style="color: white;float: right;margin-top: -20px;margin-right: 10px;"> <i class="fa fa-user"></i> <?=$_SESSION['customer']?></p>

	    <br>

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
	 			- <i class="fa fa-file-text"></i> Orders -
	 			</h4> 

        <?php
        $em = $_SESSION['customer'];
              $sel = $con->query("SELECT * FROM order_g WHERE email = '$em' ORDER BY id DESC");
              if($sel->num_rows > 0){
                $sum = 0;
                while($f = $sel->fetch_object()){

                  $sum += $f->price;
                }
                echo '<p style="color:gold; font-size: 20px; font-famili:times new roman;"> Total Amount of product ordered is &#x20A6;'.$sum.'</p>';

              }

        ?>

	 		</center>

	 		<br/>
	 		<div class="container-fluid">


	 		<?php
	 		  $em = $_SESSION['customer'];
              $sel = $con->query("SELECT * FROM order_g WHERE email = '$em' ORDER BY id DESC");
              if($sel->num_rows > 0){
                while($f = $sel->fetch_object()){

            ?>

             <table style="border-bottom: 1px solid #eee;">
               <tr>
                 <td width="100px">
                   <i class="fa fa-user" style="font-size:60px;color:yellowgreen"></i>
                 </td>
                 <td>
                   <h6 style="color:yellowgreen"><?=$f->email?></h6>
                   <p></p>
                   <a href="view-ord2.php?id=<?=$f->id?>&pid=<?=$f->pid?>" style="padding:5px; border: 1px solid yellowgreen;">view details</a>
                   <a href="v-order.php?rvo&id=<?=$f->id?>" id="vd" style="float: right;margin-right: 20px;margin-top: -10px;"><i class="fa fa-times" style="font-size: 16px;color: orange;"></i></a>
                 </td>
               </tr>
             </table>

             <?php
              }}else{
                echo'<h5 style="color:red">No orders !!</h5>';
              }
             ?>
	 			
	 		
	 		<br>
		 		
	 		</div>

 		</div>
        <div class="parallax"><img src="image/sh1.jpg" alt="Unsplashed background img 2"></div>
    </div>
</div>

<?php

      if(isset($_GET['rvo'])){

        $id = $_GET['id'];

        $del = $con->query("DELETE FROM order_g WHERE id = '$id'");

        if($del){
          header('location:v-order.php');
        }

      }


    ?>


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