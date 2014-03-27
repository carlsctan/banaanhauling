<?php
  session_start();
  require('banan_dbcon.php');
  if(!isset($_SESSION['UserID']) && !isset($_SESSION['Username'])){
    header('Location: index.php');
  }
  else{
    $query="select * from users where user_id='{$_SESSION['UserID']}'";
    $result= mysql_query($query) or die("".mysql_error());
    $queryrequest = "select * from request where cust_id='{$_SESSION['UserID']}'";
    $resultrequest = mysql_query ($queryrequest) or die("".mysql_error());
  }
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
        <link href="css/sticky-footer.css" rel="stylesheet">
    </head>
    <body>
      <?php
        require('navbar.php');
      ?>
        <div class="wrap">  <!--Body-->
          <div class="container center">
              <div class="row">
                  <div class="col-md-3">
                    <img src="images/profilepic.jpg" alt="" class="img-rounded" style="width: 100px;hight: 100px"/>
                    <div class="well">
                      <?php
                          $row = mysql_fetch_array($result);
                          echo  "ID:{$_SESSION['UserID']}
                                <br>Name:{$_SESSION['Username']}
                                <br>E-mail Address:<br>{$row['user_email']}"; 
                      ?>
                      <br><a href="setting.php">edit</a>
                  </div>
              </div>

              <div class="col-md-9">  
                    <h2>Service history</h2>
                    <br>
                    <div>
                      <table  id='tbl' class='table table-hover span8' style='background-color:#39C'>
                        <thead>
                            <tr>
                              <th>Request ID</th>
                              <th>Item</th>
                              <th>Pick Up</th>
                              <th>Drop Off</th>
                              <th>Weight</th>
                              <th>Amout</th>
                              <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          while($row = mysql_fetch_array($resultrequest)){ 
                            $querytemp = "select quoted_price from delivery_assignment where req_id='{$row['req_id']}'";
                            $resulttemp = mysql_query ($querytemp) or die("".mysql_error());
                            $temp=0;
                            while ($rowtemp = mysql_fetch_array($resulttemp)){
                              $temp+=$rowtemp['quoted_price'];
                            }
                            echo "<tr>
                                      <td>{$row['req_id']}</td>
                                      <td>{$row['req_item']}</td>
                                      <td>{$row['req_pick_up']}</td>
                                      <td>{$row['req_drop_off']}</td>
                                      <td>{$row['req_total_weight']}</td>
                                      <td>$temp</td>
                                      <td>{$row['progress']}<td>
                                  </tr>";
                          }
                        ?>
                        </tbody>
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

          $('#tbl').dataTable( {
                "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>"
          });
          
         });
      </script>
    </body>
</html>