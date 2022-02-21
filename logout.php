<?php

session_start();
ob_start();
include'connect/connect.php';

if(isset($_SESSION['customer'])){

	unset($_SESSION['customer']);

  header('location:login.php');

}else{

	header('location:login.php');

}