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
    background: white;
    color:red;
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
            ADMIN | <?=$_GET['pgroup']?>
              
            </h4>

            <br/><br/><br/>
          
             <div class="col s12 m12" style="height:auto;">

             <?php

                    $pg = $_GET['pgroup'];

                        $get = $con->query("SELECT * FROM product WHERE pgroup = '$pg' ORDER BY id DESC");
                        if($get->num_rows > 0){

                          while($f = $get->fetch_object()){
              ?>
                        <div class="col s12 m6 l6">

                <table>
                  <tr style="height: 250px;overflow: auto;">
                  <td>
                <center>
            
                    <img src="<?= $f->photo?>" style="width:160px;height:120px;border:5px solid violet;border-radius: 20px; ">
                
                    <p style="color:white;letter-spacing: 1px;font-size: 14px;margin-top: -5px;">
                      <i style="color: gold;">Name <i class="fa fa-arrow-right"></i></i> 
                      <?= strtoupper($f->pname) ?> <br>
                      <i style="color: gold;">Price <i class="fa fa-arrow-right"></i></i>
                      &#x20A6;<?= strtoupper($f->price) ?>
                    </p>

                    <a href="pg.php?rvo&id=<?=$f->id?>&pgroup=<?=$_GET['pgroup']?>" id="vd" style="background: red; padding: 5px;"><i class="fa fa-times" style="font-size: 16px;color: white;"></i></a>
                  
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
</div>
 

 <?php

      if(isset($_GET['rvo'])){

        $id = $_GET['id'];

        $del = $con->query("DELETE FROM product WHERE id = '$id'");

        if($del){
          header('location:pg.php?pgroup='.$_GET['pgroup']);
        }

      }


    ?>


<!-- scripting -->

<script src="../javascript/jquery-2.1.1.min.js"></script>
<script src="../javascript/materialize.js"></script>
<script src="../javascript/init.js"></script>
</body>
</html>