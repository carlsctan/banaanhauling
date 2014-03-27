<?php
require('banan_dbcon.php');
	


    //$query ="update request set progress='In Progress' where req_id='{$_POST['deliv_req_id']}'";
    //$result= mysql_query($query) or die(mysql_error());
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/jquery.dataTables.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link href="css/carousel.css" rel="stylesheet">
        <link href="css/sticky-footer.css" rel="stylesheet">
	<title></title>
</head>
<body>
 <form id="something">
 	<input type="text" name="a"/>
 	<input type="text" name="b"/>
 	<button>a</button>

 </form>
<script src="js/jquery.js" type="text/javascript"></script>   
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript">

	  		$(document).ready(function() {
	  			$("#something").submit(function(){
	  				var data=$("#something").serliazie();
	  				alert(data);
	  			});

	  		}

</body>
</html>