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
                    <li><a href="services.php">Services</a></li>
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
		<div class="center well span4 alert alert-info" style="height:90px; top:20%;" id="signinViewCust">
            <form name="signincust" id="signincust">
                email<input style="margin-left:28px" type="text" style="padding-right:60px"/> <br/>
                Password<input type="password" /> 
                <br>
            	<input class="btn btn-primary" type="submit" name="login" id="login" value="Login">
            </form>
        </div>

        <div class="center well span4 alert alert-info" style="height:90px; top:20%;" id="signinViewEmp">
            <form name="signinemp" id="signinemp">
                ID<span style="margin-left:48px"></span><input  type="text" style="padding-right:60px"/> <br/>
                Password<input type="password" /> 
                <br>
            	<input class="btn btn-primary" type="submit" name="login" id="login" value="Login">
            </form>
        </div>

        <div class="center well span3 text-center alert alert-info" id="choose">
            <h3>Sign in as</h3>
            <button class="btn btn-link" id="cost">Customer</button></span>|
            <button class="btn btn-link" id="emp">Employee</button></span>
        </div>
		<script type="text/javascript">
            $(window).load(function(){

   
                $("#signinViewCust").hide();
                $("#signinViewEmp").hide();

              

                $("#cost").click(function(){
                    $("#signinViewCust").fadeIn();
                    $("#servicessView").hide();
                    $("#registersView").hide();
                    $("#choose").hide();
                    $("#signinViewEmp").hide();
                });

                $("#emp").click(function(){
                    $("#signinViewEmp").fadeIn();
                    $("#servicessView").hide();
                    $("#registersView").hide();
                    $("#choose").hide();
                    $("#signinViewCust").hide();
                });
            });
        </script>
	</body>
</html>