<html>
	<head>
		<script src="jquery.js" type="text/javascript"></script>
 		<script src="bootstrap.js"></script>
		<link type="text/css" rel="stylesheet" href="bootstrap.css">
		<style>
			.center {
     			float: none;
     			margin-left: auto;
     			margin-right: auto;
     			margin-top: 100;
     		}
		</style>
	</head>

	<body background="1.jpg">
		<div class="navbar navbar-inverse navbar-static-top">
            <div class="navbar-inner">
             	<a class="brand" href="banan.php">Banaan Hauling Services</a>
             	<ul class="nav">
       	 			<li><a href="banan.php">Home</a></li>
                    <li><a href="services.php" id="servicess">Services</a></li>
                    <li><a href="#">Contact us</a></li>
   				</ul>
        		<ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            Account
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a href="signin.php">Sign in</a></li>
                            <li><a href="register.php">Register</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
		<div class="center well span11 alert alert-info" style="width:745px;height:420px" id="registersView">
            <form name="register" id="register">
				<h3>Personal Information</h3>
				FirstName<span style="margin-left:48px">
				<input type="text" class="span8" id="request">
				<br>
				MiddleName<span style="margin-left:35px">
				<input type="text" class="span8">
				<br>
				LastName<span style="margin-left:49px">
				<input type="text" class="span8">
				<br>
				Birthday<span style="margin-left:60px">
				<input type="text" class="span8">
				<br>
				Address<span style="margin-left:60px">
				<input type="text" class="span8">
				<h3 class="subindex">Account Information</h3>
				
				Email<span style="margin-left:118px">
				<input type="text" class="span8">
				<br>
				
				Password<span style="margin-left:53px">
				<input type="text" class="span8">
				<br>
				Confirm Password				
				<input type="text" class="span8">
				<br>
				<span class="position"><button class="btn btn-primary">Submit</button></span>
				</form>
        </div>
	</body>
</html>