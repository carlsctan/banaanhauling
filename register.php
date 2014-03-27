<?php
session_start();
require('banan_dbcon.php');
    if(isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) && isset($_POST['addr']) && isset($_POST['email']) && isset($_POST['mob_num']) && isset($_POST['username']) && isset($_POST['password']))
    {
    	$check = "select user_id, username, user_email from users where
		username = '$_POST[username]' OR 
		user_email = '$_POST[email]' ";
		$r = mysql_query($check);
		if(!mysql_num_rows($r)){
	        $q = "insert into users (username,password,fname,mname,lname, user_email, user_address, contact_no, user_type) values"
	    	."('{$_POST['username']}','{$_POST['password']}',"
	    	."'{$_POST['fname']}','{$_POST['mname']}',"
			."'{$_POST['lname']}','{$_POST['email']}',"
			."'{$_POST['addr']}','{$_POST['mob_num']}', 'cust')";	
			$res = mysql_query($q) or die(mysql_error());

			if($res){
				//echo "<form action='customerLogin.php' method='post'>
				//		<input type='text' name='Email' value='{$_POST['email']}' />
				//		<input type='password' name='Password' value='{$_POST['password']}' />
				//	  <\form>";
			}
		}
	}
?>
<html>
	<head>
		<script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
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
		<div class="navbar navbar-inverse navbar-fixed-top" >    <!--Header-->
            <div class="container-fluid">
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Banaan Hauling Services</a>
				</div>
				<nav class="navbar-collapse collapse" role="navigation">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="index.php#contact_us">Contact us</a></li>
                        <li><a href="learnmore.php">Learn More</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							require('navbar.php');
						?>
					</ul>
				</nav>
            </div>
        </div>
		
		<div class="wrap">  <!--Body-->
			<div class="container center" id="wrap">
				<h3>Personal Information</h3>
				<form name="register" id="register" action="register.php" method="post">
					FirstName<br>
					<input type="text" name="fname" class="col-sm-12">
					<br><br>
					
					MiddleName<br>
					<input type="text" name="mname" class="col-sm-12">
					<br><br>
					
					LastName<br>
					<input type="text" name="lname" class="col-sm-12">
					<br><br>
					
					Address<br>
					<input type="text" name="addr" class="col-sm-12">
					<br><br>
					
					Mobile no<br>
					<input type="number" name="mob_num" class="col-sm-12">
					<br><br>
					
					Email<br>
					<input type="email" name="email" class="col-sm-12">
					<br><br>
					
				<h3 class="subindex">Account Information</h3>
					Username<br>
					<input type="username" name="username" value="" class="col-sm-12">
					<br><br>
					
					Password<br>
					<input type="password" name="password" id="pass1" value="" class="col-sm-12">
					<br><br>
					
					Confirm Password<br>				
					<input type="password" id="pass2" onkeyup="checkPass(); return false;" value="" class="col-sm-12"><span id="confirmMessage" class="confirmMessage"></span>
					<br><br>
					
					<span class="position"><button id="regsubmit" class="btn btn-primary" disabled>Submit</button></span>
				</form>
			</div>
		</div>	<!--Body-->
        <div id="footer">
            <div class="container">
                <p class="text-center text-muted credit">Banan hauling prototype website</p>
            </div>
        </div>
	</body>
	<script type="text/javascript">
		function checkPass()
		{
	    	var pass1 = document.getElementById('pass1');
    		var pass2 = document.getElementById('pass2');
		    var message = document.getElementById('confirmMessage');
		    var goodColor = "#66cc66";
		    var badColor = "#ff6666";
			    if(pass1.value == pass2.value){
			        //pass2.style.backgroundColor = goodColor;
	        		message.style.color = goodColor;
	        		message.innerHTML = "Passwords Match!";
	        		document.getElementById('regsubmit').removeAttribute("disabled");
			    }else{
			        //pass2.style.backgroundColor = badColor;
			        message.style.color = badColor;
			        message.innerHTML = "Passwords Do Not Match!";
			    	document.getElementById('regsubmit').setAttribute("disabled","disabled");
			    }
		}
		</script>  
</html>