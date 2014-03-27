<?php
	session_start();
	require('banan_dbcon.php');
  if(!isset($_SESSION['UserID']) && !isset($_SESSION['Username'])){
    header('Location: index.php');
  }
  else{
    if($_SESSION['UserType']=="system_admin"){
     header('Location: admin_profile.php');
    }
    else if($_SESSION['UserType']=="emp"){
      header('Location: employee_profile.php');
    }
    else if($_SESSION['UserType']=="cust"){
      header('Location: customer_profile.php');
    }

  }	
  echo"{$_SESSION['UserType']}"
?>
