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
            ADMIN | add product
              
            </h4>

            <br/><br/><br/>
          
             <div class="col s12 m12" style="height:auto;">
              
              <form method="post" enctype="multipart/form-data">

                   <div class="file-field input-field">
                    <div class="btn purple">
                      <span>Photo</span>
                      <input name="photo" type="file">
                    </div>
                    <div class="file-path-wrapper">
                      <input name="photo" class="file-path validate" type="text" style="color:gold;">
                    </div>
                  </div>

                  <div class="input-field col s12">
                  <input id="last_name" name="pname" type="text" class="validate" style="color:gold;" required/>
                  <label for="last_name" style="color:#fff;">Product Name</label>
                  </div>

                  <select name="grp" class="browser-default" style="color:white;background: url(../image/woodback.jpg);border-left: 0px;border-top: 0px;border-right: 0px;">
                    <option value="" disabled selected>Choose product group</option>
                    <?php

                    $get = $con->query("SELECT * FROM product_g");
                    if($get->num_rows > 0){
                      while($f = $get->fetch_object()){
                        
                        echo'<option value="'.$f->name.'" style="color:black;">'.$f->name.'</option>';
                      }

                    }

                   ?>

                  </select>

                  <div class="input-field col s12">
                  <input id="last_name" name="price" type="number" class="validate" style="color:gold;" required/>
                  <label for="last_name" style="color:#fff;">Product Price</label>
                  </div>

                  <div class="input-field col s12">
                  <input id="last_name" name="pmod" type="text" class="validate" style="color:gold;" required/>
                  <label for="last_name" style="color:#fff;">Product Model</label>
                  </div>

                  <div class="input-field col s12">
                  <input id="last_name" name="psize" type="text" value="not applicable" class="validate" style="color:gold;" required/>
                  <label for="last_name" style="color:#fff;"></label>
                  </div>

              
                  <div class="input-field col s12">
                    <textarea id="textarea1" name="pdes" class="materialize-textarea" style="color:gold;"></textarea>
                    <label for="textarea1" style="color: white;">Description</label>
                  </div>
              

          

                <br/>
                <center>
                <button name="sub" class="waves-effect waves-light purple darken-1 btn-large" style="width:100%;"> Submit <i class="fa fa-send"></i></button>
              </center>
                
              </form>

              <?php

                if(isset($_POST['sub'])){

                  $photo = $_FILES['photo']['tmp_name'];
                  $photo_name = $_FILES['photo']['name'];
                  $location = "photo/". $photo_name;
                  move_uploaded_file($photo, $location);

                  $pg =$_POST['grp'];
                  $pn =$_POST['pname'];
                  $pr =$_POST['price'];
                  $pm = $_POST['pmod'];
                  $ps = $_POST['psize'];
                  $pd = $_POST['pdes'];

                  $ecp = $location;
                  $ecpg = $pg;
                  $ecpn = $pn;
                  $ecpr = $pr;

                  $ins = $con->query("INSERT INTO product VALUES(null, '$ecp', '$ecpn', '$ecpg', '$ecpr', '$pm', '$ps', '$pd')");

                  if($ins){

                    echo'<script>alert("Successful !!");</script>';

                  }


                }

              ?>


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