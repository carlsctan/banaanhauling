<?php
session_start();
require('db_con.php');
   if(isset($_POST['Username']) && isset($_POST['Password'])){

  		$query = "select * from users where
		username = '$_POST[Username]' AND 
		password = '$_POST[Password]'";
		$res = mysql_query($query);

		if(mysql_num_rows($res) == 1){
			$row = mysql_fetch_array($res);
			$_SESSION['UserID'] = $row['user_id'];
			$_SESSION['Username'] = $row['username'];
			$_SESSION['UserType'] = $row['user_type'];
			header('Location: profile.php');
		}
		else{
			echo mysql_error();	
			header('Location: signin.php');
		}
	}
?>