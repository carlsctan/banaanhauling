<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link href="css/carousel.css" rel="stylesheet">
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
            <div id="myCarousel" class="carousel slide" style="top: -21px;" data-ride="carousel">   <!--Carousel-->
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/1.jpg" alt="First slide">
                        <div class="container">
                            <?php
                                if(!isset($_SESSION['UserID'])){
                                    echo '<div class="carousel-caption">
                                        <h1>Banan Hauling</h1>
                                        <p>Do you have an account?</p>
                                        <p><a class="btn btn-lg btn-primary" href="register.php" role="button">Sign up today</a></p>
                                    </div>';
                                }
                                else{
                                    echo '<div class="carousel-caption">
                                        <h1>Spread the word! Use Banan!</h1>
                                        <p><a class="btn btn-lg btn-primary" href="index.php#contact_us" role="button">Contact Us</a></p>       
                                    </div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/2.jpg" alt="Second slide">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Banan Hauling</h1>
                                <p>Need to learn more about our company?</p>
                                <p><a class="btn btn-lg btn-primary" href="learnmore.php" role="button">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/3.jpg" alt="Third slide">
                        <div class="container">
                            <?php
                                if(!isset($_SESSION['UserID'])){
                                    echo '<div class="carousel-caption">
                                        <h1>Use our system to its maximum potential</h1>
                                        <p>Already have an account?</p>
                                        <p><a class="btn btn-lg btn-primary" href="signin.php" role="button">Sign In</a></p>
                                    </div>';
                                }
                                else{
                                    echo '<div class="carousel-caption">
                                        <h1>See our rates!</h1>
                                        <p><a class="btn btn-lg btn-primary" href="learnmore.php#trucks" role="button">Rates</a></p>
                                    </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
            </div><!-- /.carousel -->
        
            <div class="container-fluid"><!-- headings/news coloums -->

                <!-- START THE FEATURETTES -->
                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h1>Freight companies</h1>
                        <h3>Freight companies are companies that specialize in the moving (or "forwarding") of 
                        freight, or cargo, from one place to another.... 
                        </h3>
                        <p><a class="btn btn-default" href="learnmore.php#freight" role="button">View details &raquo;</a></p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-responsive" src="images/haul.jpg" height="341" width="341" alt="Generic placeholder image">
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-5">
                        <img class="featurette-image img-responsive" src="images/bananhauling_logo.jpg" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h1>Banan Hauling</h1>
                        <h3>Banan Hauling Services is also a domestic freight company here in the Philippines, 
                        specifically here in Cebu City....</h3>
                        <p><a class="btn btn-default" href="learnmore.php#banan" role="button">View details &raquo;</a></p>
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h1>Company History</h1>
                        <h3>The company has been serving other huge companies like Purefoods, 
                        Del Monte, and other large companies in delivering their products safely and on time....
                        </h3>
                        <p><a class="btn btn-default" href="learnmore.php#facts" role="button">View details &raquo;</a></p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-responsive" src="images/book.png" height="40" width="400" alt="Generic placeholder image">
                    </div>   
                </div>

                <hr class="featurette-divider">


                <div  id="contact_us" class="row featurette">
                    <div class="col-md-3">
                        <img class="featurette-image img-responsive" src="images/contact.jpg" height="300" width="300" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-9">
                        <h2>Contact us</h2><br>
                        <p>Telephone No.    <ins>512-5916</ins></p>
                        <p>Celphone No.     <ins>09222844400 or 09192038020</ins><br>
                        <p>Email Address:   <ins>bananhaulingservices@gmail.com</ins><p>
                        <p>Office Address:  <ins>21 Madrigal Comp. Legaspi Extension San Roque Cebu City </ins></p>
                    </div>       
                </div>
                <!-- /END THE FEATURETTES -->

            </div> <!-- /container -->   
        </div>     <!--Body-->  
        

      
        <div id="footer">
            <div class="container">
                <p class="text-center text-muted credit">Banan hauling prototype website</p>
            </div>
        </div>

		<script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript">
        </script>
	</body>
</html>