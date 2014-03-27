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
			#map_canvas {
				width: 500px;
				height: 400px;
			}
		</style>
	</head>
	<body>
		<?php
				require('navbar.php');                                       
		?>
        <div class="wrap">  <!--Body-->
        	<div class="container-fluid"><!-- headings/news coloums -->       		
				<div class="row" id="learn_more">
					<h2>Learn More</h2>
					<div class="col-md-3"> 
						<div class="bs-docs-sidebar hidden-print affix" role="complementary">
							<ul class="nav bs-docs-sidenav">
								<li><a href="#freight">Freight Company</a></li>
								<li><a href="#pics">Company Pictures</a></li>
								<li><a href="#banan">What is BHS</a></li>
								<li><a href="#trucks">Truck Rates</a></li>
								<li><a href="#findus">Find Us</a></li>
								<li><a href="#cv">Validation</a></li>
								<li><a href="#facts">Facts</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-9" role="main">
						<div id="freight">
							<p><font color="black">&nbsp Freight companies are companies that specialize in the moving (or "forwarding") of freight, or cargo, from one place to another. 
								These companies are divided into several variant sections. For example, international freight forwarders ship goods internationally from country to country, 
								and domestic freight forwarders, ship goods within a single country. 
							<p>
						</div>
						<div id="pics">
							<img src="images/1.jpg"  class="img-responsive" alt="Responsive image">
							<img src="images/2.jpg"  class="img-responsive" alt="Responsive image">	
							<img src="images/3.jpg"  class="img-responsive" alt="Responsive image">
							<img src="images/4.jpg"  class="img-responsive" alt="Responsive image">
						</div>
						<div id="banan">
							<p>&nbsp <b>Banan Hauling Services(<font color="red">BHS</font>)</b> is also a domestic freight company here in the Philippines, specifically 
							here in Cebu City. BHS has been operating since <font color="red"><b>2000!</b></font>, before there was still 5 employees and little connections but the employees are already experts in the business.
							Now, we have more than 2 dozens of employees with many connections and an experience far greater than when it started last 2000. 
							Through the years the company has been improving from quality services and punctual deliveries. The company also takes responsibility of any error from the company's side and pays it in <font color="red"><b>full with the calculated profit</b></font> towards the customer.</p>
						</div>
						<div id="trucks">
							<p>&nbsp Below is the average minimum rate per truck and every kind of truck has different rate. Also payment is very <font color="red">NEGOTIABLE!</font></p>
							<table style="width:500px">
								<tr>
									<td><font color="Blue">Trucks</font></td>
									<td><font color="Blue">Minimum Rate Every 3 KM </font></td>		
								</tr>
								<tr>
									<td>Elf</td>
									<td>1500 pesos</td>		 
								</tr>
								<tr>
									<td>Forward</td>
									<td>2500 pesos</td>		
								</tr> 
								<tr>
								  <td>Wingban</td>
								  <td>3500 pesos</td>	
								</tr>
								<tr>
								  <td>10 Wheeler</td>
								  <td>5000 pesos</td>	
								</tr>
							</table>
						</div>
						<div id="findus">
							<p> &nbsp Below is the google map location of the main office. For more accurate direction please visit our address <a href="https://www.google.com.ph/maps/@10.2936975,123.9065904,154m/data=!3m1!1e3">HERE!.</a></p>
							<img src="images/5.png"   class="img-responsive" alt="Responsive image" >
							<!--<div id="map_canvas"></div>-->
						</div>
						<div id="cv">
							<p> &nbsp Below is a proof of BHS as a valid company business who pays full tax to the government. The document looks so old due to the fact and a proof that our business started since late 2000.</font></p>
							<img src="images/9.png"   class="img-responsive" alt="Responsive image" >
						</div>
						<div id= "facts">
							<p> &nbsp The company has been serving other huge companies like Purefoods, 
							Del Monte, and other large companies in delivering their products safely and on time.</p>
							<p> &nbsp The company has long been known for contributing in one of the most famous festivals here in the Philippines, Sinulog!, by delivering the props and other 
							machines needed for the Sinulog festival, including the participants of the Sinulog within the agreed time.</p>
							<p> &nbsp The company's manager Mr. Oscar Banan is known and called as "Daddy" by his clients and the majority of people staying 
							near the vicinity of the office due to the fact that he has built an outstanding reputaion and is admired by both his customers and employees for being a man of his word. 
							So if you go to the said location and don't know where the manager is, just ask the bystanders "Where is daddy?" and they will help you look for him.</p>
						</div> 
					</div><!-- /information -->
				</div>
            </div> <!-- /container -->  
        </div>


        <div id="footer">
            <div class="container">
                <p class="text-center text-muted credit">Banan hauling prototype website</p>
            </div>
        </div>
	</body>
</html>