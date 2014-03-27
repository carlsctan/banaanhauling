<?php
session_start();
if(isset($_SESSION['UserID']) && isset($_SESSION['Username'])){
    header("Location:profile.php");
}
?>
<html>
	<head>

        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
		<link href="css/signin.css" rel="stylesheet">
        <link href="css/sticky-footer.css" rel="stylesheet">
		<style>
			.center {
     			float: none;
     			margin-left: auto;
     			margin-right: auto;
     			margin-top: 50;
     		}
		</style>
	</head>

	<body background="">
		<?php
			require('navbar.php');
		?>
        <div class="wrap">  <!--Body-->
		
			<div class="container form-signin center" id="signin">
				<form class="form-signin" action="login.php" method="post">
					<h2 class="form-signin-heading">Please sign in</h2>
					<input type="text" class="form-control" placeholder="Username" name="Username" required autofocus>
					<input type="password" class="form-control" placeholder="Password" name="Password" required>
					<br>
					<input class="btn btn-lg btn-primary btn-block" type="submit" name="login" id="login" value="Login">
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
		<script type="text/javascript">
            $(window).load(function(){
             

         
            });
        </script>
	</body>
</html>