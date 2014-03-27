<?php
session_start();
require('banan_dbcon.php');
    if(isset($_SESSION['UserID']) && isset($_SESSION['Username'])){
        if(isset($_POST['req_item']) && isset($_POST['req_pick_up']) && isset($_POST['req_drop_off']) && isset($_POST['req_weight']))
        {
            $q = "insert into request (req_item,req_pick_up,req_drop_off,req_total_weight,cust_id,progress) values"
            ."('{$_POST['req_item']}','{$_POST['req_pick_up']}',"
            ."'{$_POST['req_drop_off']}','{$_POST['req_weight']}',"
            ."'{$_SESSION['UserID']}',"."'Order')"; 
            $res = mysql_query($q) or die(mysql_error());
          //  if()
        }
    }else
    {
        header('Location: signin.php');
    }
?>
<html>
	<head>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link href="css/sticky-footer.css" rel="stylesheet">
		<style>
			.center {
     			float: none;
     			margin-left: auto;
     			margin-right: auto;
     			margin-top: 100;
     		}
		</style>
	</head>

	<body background="">
  		<?php
			require('navbar.php');
		?>
  		<div class="wrap">  <!--Body-->
            <div class="container center" id="servicessView">
                <h3>Order</h3>
    		    <form class="form-horizontal" name="services" id="services" action="services.php" method="post">
                    Item<br>
                    <input type="text" class="col-sm-12" name="req_item" required>
                    <br><br>
					
                    Weight<br>
                    <input type="text" class="col-sm-12" name="req_weight" required>
                    <br><br>
					
                    Pick-up point<br>
                    <input type="text" class="col-sm-12" name="req_pick_up" required>
                    <br><br>
					
                    Destination<br>
                    <input type="text" class="col-sm-12" name="req_drop_off" required>
                    <br><br>
					
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        
        <div id="footer">
            <div class="container">
                <p class="text-center text-muted credit">Banan hauling prototype website</p>
            </div>
        </div>
		
		<script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
	</body>
</html>