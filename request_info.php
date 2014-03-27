<?php
	require('banan_dbcon.php');
	$query  = "select req_id from delivery_assignment where del_assign_id ='{$_POST['delivery_id']}'";
    $result = mysql_query ($query)or die(mysql_error());
    $row = mysql_fetch_array($result);

    $queryreq  = "select * from request where req_id ='{$row['req_id']}'";
    $resultreq = mysql_query ($queryreq)or die(mysql_error());
    $rowreq = mysql_fetch_array($resultreq);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		echo"<tr>
			<td>".$rowreq['req_item']."</td>
			<td>".$rowreq['req_pick_up']."</td>
			<td>".$rowreq['req_drop_off']."</td>
			<td>".$rowreq['req_total_weight']."</td>
			<td>".$rowreq['progress']."</td>
		</tr>";
	?>
</body>
</html>
