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
	<title>order</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css" />
    <link rel="stylesheet" href="style/materialize.css" type="text/css"/>
    <link rel="stylesheet" href="style/scroll.css" type="text/css"/>
    <link rel="stylesheet" href="style/mystyle.css" type="text/css"/>
</head>
<body style="background:url(image/woodback.jpg);">

<div id="navigate" class="nav-wrappers">

	    <center style="margin-top: 50px;">
	    	<a href="cus-viewp.php" id="mynav3"><i class="fa fa-arrow-left" style="font-size: 16px"></i> Products</a>
	    	<a href="v-order.php" id="mynav3"><i class="fa fa-star" style="font-size: 16px"></i> View Orders</a>
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
	 			- <i class="fa fa-file-text"></i> Order Here -
	 			</h4> 

	 		</center>

	 		<br/>
	 		<div class="container-fluid">


	 			<form method="post">

	 				<div class="row">


	 				<?php

	 					$em = $_SESSION['customer'];

				        $get = $con->query("SELECT * FROM customer WHERE email = '$em' ");
				        if($get->num_rows > 0){
				            while($f = $get->fetch_object()){
				    
				    ?>


	 				<label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Fullname</label>
	 		
				    	<input id="last_name" name="fname" type="text" value="<?=$f->fname?>" readonly class="validate" style="color:gold;border-bottom: 1px solid #bbb;" required/>
				    <br>

				    <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> E - mail</label>
				  
				        <input id="last_name" name="email" type="email" value="<?=$_SESSION['customer']?>" readonly class="validate" style="color:gold;border-bottom: 1px solid #bbb;" required/>
				    <br>

				    <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Phone Number</label>
				 
				    	<input id="last_name" name="phone" type="number" value="<?=$f->phone?>" readonly class="validate" style="color:gold;border-bottom: 1px solid #bbb;" required/>
				    <br>

				    <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Delivery Address</label>
				
				        <input id="last_name" name="add" type="text" value="<?=$f->address?>"  class="validate" style="color:gold;" required/>
				    <br>

				    <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Product Name</label>
				 
				        <input id="last_name" name="pname" type="text" value="<?=$_GET['pn']?>" readonly class="validate" style="color:gold;border-bottom: 1px solid #bbb;" required/>
				    <br>

				    <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Product Model</label>
				 
				        <input id="last_name" name="pmod" type="text" value="<?=$_GET['pm']?>" readonly class="validate" style="color:gold;border-bottom: 1px solid #bbb;" required/>
				    <br>

				    <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Product Size</label>
				 
				        <input id="last_name" name="psize" type="text" value="<?=$_GET['ps']?>" readonly class="validate" style="color:gold;border-bottom: 1px solid #bbb;" required/>
				    <br>

				    <label for="last_name" style="color:#fff;"><i class="fa fa-lock"></i> Price</label>
				  
				        <input id="last_name" name="price" type="text" value="<?=$_GET['pr'] ?>" readonly class="validate" style="color:gold;border-bottom: 1px solid #bbb;" required/>

				     <?php

				     		}

					 	}

				     ?>

				    <br>

				    <input type="hidden" name="pid" value="<?=$_GET['id']?>">

				    <input type="hidden" name="message" value="Hello admin, an order as been made !!">

				    <input type="hidden" name="sender_name" value="eshop">
				    
				    </div>

				    <br/>
				    <center>
				    <button name="sub" class="waves-effect waves-light purple darken-1 btn-large	">Submit order  <i class="fa fa-send"></i></button>

				    <a href="cus-viewp.php" class="waves-effect waves-light btn-large" style="background: violet;">Make Another order <i class="fa fa-arrow-right"></i></a>

	 				</center>

	 			</form>
	 			<br>
		 		
		 		<?php

		 			$json_url = "http://api.ebulksms.com:8080/sendsms.json";

		 			if(isset($_POST['sub'])){

		 				$fn = $_POST['fname'];
		 				$em = $_POST['email'];
		 				$ph = $_POST['phone'];
		 				$ad = $_POST['add'];
		 				$pn = $_POST['pname'];
		 				$pr = $_POST['price'];
		 				$pid = $_POST['pid'];
		 				$ps = $_POST['psize'];
		 				$pm = $_POST['pmod'];


		 					$ins = $con->query("INSERT INTO order_g VALUES (null, '$fn', '$em', '$ph', '$ad', '$pn', '$pr', '$pm', '$ps', '$pid', CURRENT_TIMESTAMP)");

		 					echo'<script>alert("successful !!");</script>';


		 					if($ins){

		 						//sending sms to admin

		 						$ph = 08141989603;

		 						$username = 'israelewerem94@gmail.com';
								$apikey = 'c908a2b34b90e9a42756effa40aa66b132433e69';

							    $sendername = substr($_POST['sender_name'], 0, 11);
							    $recipients = $ph;
							    $message = $_POST['message'];
							    $flash = 0;
							    if (get_magic_quotes_gpc()) {
							        $message = stripslashes($_POST['message']);
							    }
							    $message = substr($_POST['message'], 0, 160);

							    $result = useJSON($json_url, $username, $apikey, $flash, $sendername, $message, $recipients);
							  
					 		}


					 		function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) {
							    $gsm = array();
							    $country_code = '234';
							    $arr_recipient = explode(',', $recipients);
							    foreach ($arr_recipient as $recipient) {
							        $mobilenumber = trim($recipient);
							        if (substr($mobilenumber, 0, 1) == '0'){
							            $mobilenumber = $country_code . substr($mobilenumber, 1);
							        }
							        elseif (substr($mobilenumber, 0, 1) == '+'){
							            $mobilenumber = substr($mobilenumber, 1);
							        }
							        $generated_id = uniqid('int_', false);
							        $generated_id = substr($generated_id, 0, 30);
							        $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
							    }
							    $message = array(
							        'sender' => $sendername,
							        'messagetext' => $messagetext,
							        'flash' => "{$flash}",
							    );

							    $request = array('SMS' => array(
							            'auth' => array(
							                'username' => $username,
							                'apikey' => $apikey
							            ),
							            'message' => $message,
							            'recipients' => $gsm
							    ));
							    $json_data = json_encode($request);
							    if ($json_data) {
							        $response = doPostRequest($url, $json_data, array('Content-Type: application/json'));
							        $result = json_decode($response);
							        return $result->response->status;
							    } else {
							        return false;
							    }
							}


							function doPostRequest($url, $arr_params, $headers = array('Content-Type: application/x-www-form-urlencoded')) {
							    $response = array();
							    $final_url_data = $arr_params;
							    if (is_array($arr_params)) {
							        $final_url_data = http_build_query($arr_params, '', '&');
							    }
							    $ch = curl_init();
							    curl_setopt($ch, CURLOPT_URL, $url);
							    curl_setopt($ch, CURLOPT_POSTFIELDS, $final_url_data);
							    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
							    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							    curl_setopt($ch, CURLOPT_POST, 1);
							    curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
							    curl_setopt($ch, CURLOPT_VERBOSE, 1);
							    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
							    $response['body'] = curl_exec($ch);
							    $response['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
							    curl_close($ch);
							    return $response['body'];

		 						//end of sending sms to admin


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