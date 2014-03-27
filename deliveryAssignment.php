<?php
	require('banan_dbcon.php');
    

	$query = "insert into delivery_assignment (truck_id ,req_id,emp_id,process) 
	values({$_POST['selc_t_n']},{$_POST['deliv_req_id']},{$_POST['selc_e_i']},'activate')";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result)
/*
    echo $row['del_assign_id'];

    $querycom = "insert into commission (del_assign_id ,com_amount) 
    values({$row['del_assign_id']},{$_POST['commission']})";
    $resultcom = mysql_query($querycom) or die(mysql_error());
*/
    $prog ="select * from request where req_id='{$_POST['deliv_req_id']}'";
    $resultprog= mysql_query($prog) or die(mysql_error());
    $row = mysql_fetch_array($resultprog);

    if($row['progress']=="Order"){
    	$tempprog="Pick";
    }
    else if($row['progress']=="Drop"){
    	$tempprog="Drop";
    }

    $query ="update request set progress='$tempprog' where req_id='{$_POST['deliv_req_id']}'";
    $result= mysql_query($query) or die(mysql_error());

    header('Location: profile.php');
	
?>