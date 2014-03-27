<?php
	session_start();
	require('banan_dbcon.php');
  if(!isset($_SESSION['UserID']) && !isset($_SESSION['Username'])){
    header('Location: index.php');
  }
  	$querydeliverassig = "select * from delivery_assignment";
  	$resultdeliverassig = mysql_query($querydeliverassig);
    $queryrequest = "select * from request where cust_id='{$_SESSION['UserID']}'";
    $resultrequest = mysql_query ($queryrequest);
?>

<html>
	<head>
<style>
      .center {
          float: none;
          margin-left: auto;
          margin-right: auto;
          margin-top: 70;
        }
</style>
		<link rel="stylesheet" href="css/jquery.dataTables.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link href="css/carousel.css" rel="stylesheet">
        <link href="css/sticky-footer.css" rel="stylesheet">
    </head>
    <body>
			<?php
				require('navbar.php');
			?>
        <div class="wrap">  <!--Body-->
        	<div class="container center">
            <div class="row">
                    <div class="col-md-9">
                        <div class="span8 well" id="empprofile">
                          <div class="row">
                            <div class="col-md-3">
                              <img src="images/profilepic.jpg" alt="" class="img-rounded" style="width: 100px;hight: 100px"/>
                            </div>
                            <div class="col-md-5">
                              <?php
                                $row = mysql_fetch_array($resultdeliverassig);
                                echo  "ID:{$_SESSION['UserID']}
                                <br>Name:{$_SESSION['Username']}
                                "; 
                              ?>
                                <br><a href="setting.php">edit</a>
                            </div>
                          </div>
                        </div>
                        <div id="delivery_assignment_adimin">
                          <?php
                              $queryrequest = "select * from delivery_assignment where progress ='activate'";
                              $resultrequest = mysql_query ($queryrequest);
                          ?>
                          <h2>Order Request List</h2>
                          <table  class='tbl' class='table table-hover span8' style='background-color:#39C'>
                          <thead>
                              <tr>
                                  <th>Delivery ID</th>
                                  <th>Requst ID</th>
                                  <th>Truck</th>
                                  <th>Employee ID</th>
                                </tr>
                          </thead>
                          <tbody>
                            <?php
                                while($row = mysql_fetch_array($resultrequest)){ 
                                    echo "<tr>
                                          <td>".$row['del_track_no']."</td>
                                          <td>".$row['req_id']."</td>
                                          <td>".$row['truck_id']."</td>
                                          <td>".$row['emp_id']."</td>
                                        </tr> ";
                                }
                              ?>
                          </tbody>
                          </table>         
                       </div> 
                        <div id="request_pick">
                          <?php
                              $queryrequest = "select * from request where progress ='Order'";
                              $resultrequest = mysql_query ($queryrequest);
                          ?>
                          <h2>Pick up Request List</h2>
                          <table  class='tbl' class='table table-hover span8' style='background-color:#39C'>
                          <thead>
                              <tr>
                                  <th>Requst ID</th>
                                  <th>Item</th>
                                  <th>Pick Up</th>
                                  <th>Weight</th>
                                  <th>Progress</th>
                                </tr>
                          </thead>
                          <tbody>
                            <?php
                                while($row = mysql_fetch_array($resultrequest)){ 
                                    echo "<tr class='request_row'>
                                            <td class='request_id'>".$row['req_id']."</td>
                                            <td>".$row['req_item']."</td>
                                            <td>".$row['req_pick_up']."</td>
                                            <td>".$row['req_total_weight']."</td>
                                            <td>".$row['progress']."</td>
                                          </tr> ";
                                }
                              ?>
                          </tbody>
                          </table>         
                        </div>   


                        <div id="request_drop">
                          <?php
                              $queryrequest = "select * from request where progress ='Drop'";
                              $resultrequest = mysql_query ($queryrequest);
                          ?>
                          <h2>Pick up Request List</h2>
                          <table  class='tbl' class='table table-hover span8' style='background-color:#39C'>
                          <thead>
                              <tr>
                                  <th>Requst ID</th>
                                  <th>Item</th>
                                  <th>Pick Up</th>
                                  <th>Weight</th>
                                  <th>Progress</th>
                                </tr>
                          </thead>
                          <tbody>
                            <?php
                                while($row = mysql_fetch_array($resultrequest)){ 
                                    echo "<tr>
                                            <td class='request_id'>".$row['req_id']."</td>
                                            <td>".$row['req_item']."</td>
                                            <td>".$row['req_drop_off']."</td>
                                            <td>".$row['req_total_weight']."</td>
                                            <td>".$row['progress']."</td>
                                          </tr> ";
                                }
                              ?>
                          </tbody>
                          </table>         
                        </div>   



                        <div id="assignment">
                          <h2>Delivery Assignment</h2>
                          
                          <form id="deliveryform" action="deliveryAssignment.php" method="post">
                            Request ID :<input class="form-control" name="deliv_req_id" type="text" id="placeID"/><br>
                            Truck no :
                             <select class="form-control" name="selc_t_n">
                             <?php
                                $querytruck = "select * from truck where truck_status= 'ok'";
                                $resulttruck = mysql_query($querytruck);
                                while($rowt = mysql_fetch_array($resulttruck)){
                                 
                                  echo"
                                        <option value=".$rowt['truck_id'].">".$rowt['truck_id']."-".$rowt['truck_type']."</option>
                                  ";
                                
                              }
                              ?>  
                            </select>
                            <br/>

                            Employee ID:
                            <select class="form-control" name="selc_e_i">
                              <?php
                                $queryemp = "select * from users where user_type='emp'";
                                $resultemp = mysql_query($queryemp);
                                while($rowe = mysql_fetch_array($resultemp)){
                                  echo"
                                        <option value=".$rowe['user_id'].">".$rowe['user_id']."-".$rowe['username']."</option>
                                  ";
                                }
                              ?>  
                            </select>
                            <br/>
                            Price :<input class="form-control" name="price" type="text"/><br>
                            <button class="btn btn-primary">submit</button>
                          </form>
                        </div> 


                        <div id="hire">
                          <?php
                              $query  = "select * from users where user_type ='cust'";
                              $result = mysql_query ($query);
                          ?>
                          <h2>Hiring Employee</h2>
                          <table  class='tbl' class='table table-hover span8' style='background-color:#39C'>
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>User Type</th>
                                  </tr>
                            </thead>
                            <tbody>
                              <?php
                                  while($row = mysql_fetch_array($result)){ 
                                      echo "<tr class='hirerow'>
                                              <td class='HUser'>".$row['user_id']."</td>
                                              <td>".$row['username']."</td>
                                              <td>".$row['user_type']."</td>
                                            </tr> ";
                                  }
                                ?>
                            </tbody>
                          </table>         
                        </div>

                        <div id="hireassig">
                          <h2>Hiring</h2>
                          
                          <form id="hireform" action="hire.php" method="post">
                            User ID :<input class="form-control" name="HUid" type="text" id="hireplace"/><br>
                            User Type:
                             <select class="form-control" name="Husertype">
                                        <option value="cust">Customer</option>
                                        <option value="emp">Employee</option>
                                        <option value="system_admin">Admin</option>             
                            </select>
                            <br/>
                            <button class="btn btn-primary">submit</button>
                          </form>
                        </div>


                    </div>
                    <div class="col-md-3">
                      <table class="table table-hover">
                        <tr>
                          <td id="emp_pro_bt">Profile</td>
                        </tr>
                        <tr>
                          <td id="request_pick_bt">Pickup Assigment</td>
                        </tr>
                        <tr>
                          <td id="request_drop_bt">Drop off Assigment</td>
                        </tr>
                        <tr>
                          <td id="emp_deli_assig_admin_bt">Delivery Assignment List</td>
                        </tr>
                        <tr>
                          <td id="hier_bt">Hiering employee</td>
                        </tr>
                      </table>
                    </div>
            </div>	
          </div>
        </div>
        
        <div id="footer">
            <div class="container">
                <p class="text-muted credit">Banan hauling prototype website</p>
            </div>
        </div>

		<script src="js/jquery.js" type="text/javascript"></script>   
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.dataTables.js"></script>
        <script type="text/javascript">

	  		$(document).ready(function() {
          function hideall (){
            $("#empprofile").hide();
            $("#request_pick").hide();
            $("#request_drop").hide();
            $("#delivery_assignment_adimin").hide();
            $("#assignment").hide();
            $("#hire").hide();
            $("#hireassig").hide();
          };

          hideall();
          $("#empprofile").fadeIn();

          $("#emp_pro_bt").click(function(){
            hideall();
            $("#empprofile").fadeIn();
          });

          $("#request_pick_bt").click(function(){
            hideall();
            $("#request_pick").fadeIn();
          });

          $("#emp_deli_assig_admin_bt").click(function(){
            hideall();
            $("#delivery_assignment_adimin").fadeIn();
          });

          $("#request_drop_bt").click(function(){
            hideall();
            $("#request_drop").fadeIn();
          });

          $(".request_row").click(function(){
            hideall();
            $("#assignment").fadeIn();
            $("#placeID").val($(this).find(".request_id").html());
          });

          $(".hirerow").click(function(){
            hideall();
            $("#hireassig").fadeIn();
            $("#hireplace").val($(this).find(".HUser").html());
          });

          $("#hier_bt").click(function(){
            hideall();
            $("#hire").fadeIn();
          });

   		 		$('.tbl').dataTable( {
      		  		"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>"
   			 	});

          
			});
</script>
   	</body>
</html>