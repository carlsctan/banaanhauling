<?php
	session_start();
	require('banan_dbcon.php');
  if(!isset($_SESSION['UserID']) && !isset($_SESSION['Username'])){
    header('Location: index.php');
  }
  	$querydeliverassig = "select * from delivery_assignment";
  	$resultdeliverassig = mysql_query($querydeliverassig);
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
                			<div id="delivery_assignment">
                				<table  id='tbl' class='table table-hover span8' style='background-color:#39C'>
                					<thead>
                  						<tr>
                                <th>Delivery #</th>
                    						<th>Request ID</th>
                                <th>Track Assign</th>
                                <th>Progress</th>
                  						</tr>
                					</thead>
               					 	<tbody>

                            <?php
                              $querydeliverassig = "select * from delivery_assignment where emp_id={$_SESSION['UserID']} and progress='activate'";
                              $resultdeliverassig = mysql_query($querydeliverassig);
                 					 		while($rowd = mysql_fetch_array($resultdeliverassig)){ 
                                $query="select progress from request where req_id='{$rowd['req_id']}'";
                                $result= mysql_query($query);
                                $row = mysql_fetch_array($result);
                 					 			  echo "

                                        <tr class='deliv_info_row'>
                                            <td class='delivery_id'>".$rowd['del_track_no']."</td>
                                          <td>".$rowd['req_id']."</td>
                                          <td>".$rowd['truck_id']."</td>
                                          <td><button class='btn terminate_bt'>".$row['progress']."</button></td>
                 					 			        </tr> ";
                              }
                            ?>
               					 	</tbody>
                				</table>            
                      </div>   
                      <div id="request_info">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <td>
                                Request Item
                              </td>
                              <td>
                                Pick up point
                              </td>
                              <td>
                                Drop off point
                              </td>
                              <td>
                                Weight
                              </td>
                              <td>
                                Progress
                              </td>
                            </tr>
                          </thead>
                          <tbody id="request_info_body">
                            
                            
                          </tbody>
                        </table>
                      </div> 
                  </div>
                  <div class="col-md-3">
                    <table class="table table-hover">
                      <tr>
                        <td id="emp_pro_bt">Profile</td>
                      </tr>
                      <tr>
                        <td id="emp_deli_assig_bt">Delivery Assignmeent</td>
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
            $("#delivery_assignment").hide();
            $("#request_info").hide();    
          }
          hideall();
          $("#empprofile").fadeIn();

          $("#emp_pro_bt").click(function(){
            hideall();
            $("#empprofile").fadeIn();
          });

          $("#emp_deli_item_bt").click(function(){
            hideall();  
          });

          $("#emp_deli_assig_bt").click(function(){
            hideall();
            $("#delivery_assignment").fadeIn();
          });

          $(".deliv_info_row").click(function(){
               hideall();
              $("#request_info").fadeIn();
              var pass ="delivery_id="+$(this).find(".delivery_id").html();
            $.ajax({
                type:"post",
                url:"request_info.php",
                datatype:"",
                data:pass,
                success:function(data){
                 $("#request_info_body").html(data);
                },
                error:function(){
                  alert("error");
                },
              });
              return false;
          });

          $(".terminate_bt").click(function(){
            $(this).hide();
            if($(this).html()==='Pick'){
              $(this).html("Drop");
            }
            if($(this).html()==='Pick'){
              $(this).html("Drop");
            }
           // alert($(this).parents().prev().prev().prev().prev().html());
            var data ="req_field="+$(this).parents().prev().prev().html()+"&"+"del_assign_field="+$(this).parents().prev().prev().prev().prev().html();
           // alert(data);
             $.ajax({
                type:"post",
                url:"request_update.php",
                datatype:"",
                data:data,
                success:function(){
                },
                error:function(){
                  alert("No conection");
                },
              });
              return false;
          });

   		 		$('#tbl').dataTable( {
      		  		"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>"
   			 	} );
			} );
    	</script>
   	</body>
</html>