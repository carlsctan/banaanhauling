<div class="navbar navbar-inverse navbar-fixed-top">    <!--Header-->
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
if(isset($_SESSION['UserID']) && isset($_SESSION['Username'])){
		echo "
				<li class='dropdown'>
				<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Welcome {$_SESSION['Username']}!
				<span class='caret'></span>
				</a>
				<ul class='dropdown-menu' role='menu' aria-labelledby='dLabel'>
					<li><a href='profile.php'>Profile</a></li>
					<li><a href='setting.php'>Settings</a></li>
					<li><a href='logout.php'>Logout</a></li>
				</ul>
				</li>
			  ";                                           
		}
	else{
		echo "
				<li><a href='register.php'>Register</a></li>
				<li><a href='signin.php'>Sign In</a></li>						
			 ";
	}					
?>
			</ul>
		</nav>
    </div>
</div>