 <?php
require('banan_dbcon.php');

	$prog ="select * from request where req_id='{$_POST['req_field']}'";
    $resultprog= mysql_query($prog) or die(mysql_error());
    $row = mysql_fetch_array($resultprog);

    if($row['progress']=="Pick"){
    	$tempprog="Drop";  
    }
    else if($row['progress']=="Drop"){
    	$tempprog="Done";
    }
  $query ="update request set progress='$tempprog' where req_id='{$_POST['req_field']}'";
  $result= mysql_query($query) or die(mysql_error());

  $query ="update delivery_assignment set process='done' where del_track_no='{$_POST['del_assign_field']}'";
  $result= mysql_query($query) or die(mysql_error());
?>
           