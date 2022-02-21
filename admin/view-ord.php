<?php

session_start();
ob_start();
include'../connect/connect.php';

if(!isset($_SESSION['admin'])){

  header('location:adminlogin.php');

}

?>




<!DOCTYPE html>
<html>
<head>
	<title>admin-dashboard</title>

	<link rel="stylesheet" type="text/css" href="../style/materialize.css"/>
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome.css"/>

<style type="text/css">
  
  #v{
    text-decoration: none;
    color:#000066;
    
  }
  #vd:hover{
    background: black;
    color:white;
    padding:5px;
  }
  #plink{
    color:#000055 !important;
    border-bottom: 1px solid #ccc;
    font-family: candara;
    font-size: 14px;
  }
  #plink:hover{
    background: black !important;
    color:white !important;
  }
  #rm:hover{
    background: red;
    color:white !important;
    padding:5px;
  }

</style>

</head>
<body style="background:url(../image/woodback.jpg);">

 <nav  class=" purple lighten-3 nav-wrapper">

      <ul class="right" id="pro-links">
        <li><a href="logout.php" class="hide-on-med-and-down waves-effect waves-red" style="color:red;">
        <span class="fa fa-power-off"></span> Logout</a></li>
      </ul>
 </nav>

<!-- navigation -->
    <div class="col s3 l3 hide-on-med-and-down">
      <ul class="side-nav fixed" id="pro-nav2">
         <center style="border-bottom: 1px solid #ccc">
          <br/>
           <i class="fa fa-shopping-cart" style="padding:10px;margin-left: 10px;font-size:60px;color:violet"></i>
           <br/><br>
          </center>

          <br/>

        <li style="padding-bottom:5px;">
          <a href="adminp.php" class="waves-effect waves-green"><i class="fa fa-user" style="color:black"></i> Customers</a>
        </li>

        <li style="padding-bottom:5px;">
          <a href="#" class="waves-effect waves-green dropdown-button" data-activates='dropdown1'><i class="fa fa-shopping-cart" style="color:black"></i>Product Added</a>
          <ul id='dropdown1' class='dropdown-content' style="color: red!important;height:200px !important;overflow: auto !important;">
            <li>

                  <?php

                    $get = $con->query("SELECT * FROM product_g");
                    if($get->num_rows > 0){
                      while($f = $get->fetch_object()){
                        echo'<li><a href="pg.php?pgroup='.$f->name.'" id="plink">'.strtoupper($f->name).'</a></li>';
                      }

                    }

                   ?>


            </li>
          </ul>
        </li>
       
       <li style="padding-bottom:5px;">
          <a href="addpg.php" class="waves-effect waves-green"><i class="fa fa-plus" style="color:black"></i>Add Product Group</a>
        </li>

        <li style="padding-bottom:5px;">
          <a href="addp.php" class="waves-effect waves-green"><i class="fa fa-gift" style="color:black"></i>Add Product</a>
        </li>

        <li style="padding-bottom:5px;">
          <a href="s-act.php" class="waves-effect waves-green"><i class="fa fa-tasks" style="color:black"></i>Product Order</a>
        </li>


      </ul>
    </div>

<div class="row">

    <div class="col s12 m12 l9 offset-l3">
          <div class="row">
            
            <h4 style="font-family:lucida sans;color:#fff">
            ADMIN | Order-Details
              
            </h4>

            <br/>
          
             <div class="col s12 m12" style="height:auto;">
              
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
                  <img src="<?=$fp->photo?>" style="width:100%;border:5px solid violet;border-radius: 20px;">
                  ggg
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

             <br/>

          	</div>
         </div>



    </div>
</div>
 


<!-- scripting -->

<script src="../javascript/jquery-2.1.1.min.js"></script>
<script src="../javascript/materialize.js"></script>
<script src="../javascript/init.js"></script>

</body>
</html>