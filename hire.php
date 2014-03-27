<?php
	require('banan_dbcon.php');
	
    $query ="update users set user_type='{$_POST['Husertype']}' where user_id='{$_POST['HUid']}'";
    $result= mysql_query($query) or die(mysql_error());

    header('Location: profile.php');
	
?>