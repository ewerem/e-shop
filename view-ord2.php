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
        <a href="v-order.php" id="mynav3"><i class="fa fa-arrow-left" style="font-size: 16px"></i> Back</a>
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
        - <i class="fa fa-file-text"></i> Order Details -
        </h4> 

      </center>

      <br/>
      <div class="container-fluid">


      <?php

              $id = $_GET['id'];
              $sel = $con->query("SELECT * FROM order_g WHERE id = '$id'");
              if($sel->num_rows > 0){
                while($f = $sel->fetch_object()){

            ?>
              <div class="row">
                
              <div class="col s12 m6 l5">
              <?php
                $pid = $_GET['pid'];
                $selp = $con->query("SELECT * FROM product WHERE id = '$pid'");
                if($selp->num_rows > 0){
                  while($fp = $selp->fetch_object()){
              ?>
                  <br>
                  <img src="admin/<?=$fp->photo?>" style="width:100%;border:5px solid violet;border-radius: 20px; ">
              <?php
                }}
              ?>

              </div>
              <div class="col s12 m6 l7">
                <table class="table">
                    <tbody>

                      <tr style="background: white;">
                        <td style="width: 100px">
                        <i style="color:black;font-size: 16px;">Full <br> Name</i>
                        </td>
                        <td style="color:#000;font-size: 20px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 20px;"></i> <?=strtoupper($f->fname)?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 100px">
                        <i style="color:black;font-size: 16px;">Phone</i>
                        </td>
                        <td style="color:#000;font-size: 20px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 20px;"></i> <?=$f->phone?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 100px">
                        <i style="color:black;font-size: 16px;">E - mail</i>
                        </td>
                        <td style="color:#000;font-size: 20px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 20px;"></i> <?=$f->email?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 100px">
                        <i style="color:black;font-size: 16px;"> Address</i>
                        </td>
                        <td style="color:#000;font-size: 20px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 20px;"></i> <?=$f->address?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 100px">
                        <i style="color:black;font-size: 16px;"> Product Name</i>
                        </td>
                        <td style="color:#000;font-size: 20px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 20px;"></i> <?=$f->pname?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 100px">
                        <i style="color:black;font-size: 16px;"> Product Model</i>
                        </td>
                        <td style="color:#000;font-size: 20px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 20px;"></i> <?=$f->model?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 100px">
                        <i style="color:black;font-size: 16px;"> Product Size</i>
                        </td>
                        <td style="color:#000;font-size: 20px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 20px;"></i> <?=$f->size?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 100px">
                        <i style="color:black;font-size: 16px;"> Product Price</i>
                        </td>
                        <td style="color:#000;font-size: 20px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 20px;"></i> &#x20A6; <?=$f->price?>
                        </td>
                      </tr>
                      
                    </tbody>
                </table>
              </div>
            </div>

             <?php
              }}else{
                echo'<h5 style="color:red">No affiliators !!</h5>';
              }
             ?>

        
      
      <br>
        
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