<?php

session_start();
ob_start();
include'../connect/connect.php';

if(isset($_SESSION['admin'])){

	unset($_SESSION['admin']);

  header('location:adminlogin.php');

}else{

	header('location:adminlogin.php');

}