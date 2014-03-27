<?php
session_start();
require('banan_dbcon.php');
  if(isset($_SESSION['UserID']) && isset($_SESSION['Username']) && isset($_SESSION['UserType'])){
      $query="select * from users where user_id = {$_SESSION['UserID']}";
      $result = mysql_query($query);
      $row = mysql_fetch_array($result);
      $Uid =$_SESSION['UserID'];
  }
  else {
      header('Location: index.php');
  }
  if(isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['addr']))
  {
          $query="update users SET username = '{$_POST['uname']}',fname = '{$_POST['fname']}',mname = '{$_POST['mname']}',lname = '{$_POST['lname']}',user_email = '{$_POST['email']}',user_address = '{$_POST['addr']}',contact_no = '{$_POST['cont_no']}' where user_id = '$Uid'";
          $result = mysql_query($query) or die(mysql_error());
          $_SESSION['Username'] = $row['username'];
          header('Location: profile.php');
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
        		  <div>
                  <form class="form-horizontal" name="register" id="register" action="setting.php" method="post">
                    <h3>Personal Information</h3>
                    User Name<br>
                    <input type="text" name="uname" class="col-sm-6" value='<?php echo"$row[username]"?>' required>
                    <br><br>

                    Password<br>
                    <input type="text" name="pass" class="col-sm-6" value='<?php echo"$row[password]"?>' required>
                    <br><br>

                    FirstName<br>
                    <input type="text" name="fname" class="col-sm-6" value='<?php echo"$row[fname]"?>' >
                    <br><br>

                    MiddleName<br>
                    <input type="text" name="mname" class="col-sm-6" value='<?php echo"$row[mname]"?>' >
                    <br><br>

                    LastName<br>
                    <input type="text" name="lname" class="col-sm-6" value='<?php echo"$row[lname]"?>' >
                    <br><br>

                    e-mail<br>
                    <input type="text" name="email" class="col-sm-6" value='<?php echo"$row[user_email]"?>' >
                    <br><br>

                    Address<br>
                    <input type="text" name="addr"class="col-sm-12" value='<?php echo"$row[user_address]"?>' required>
                    <br><br>

                    Contact number<br>
                    <input type="text" name="cont_no"class="col-sm-12" value='<?php echo"$row[contact_no]"?>' >
                    <br><br>
                    
                    <button id="regsubmit" class="btn btn-primary">Submit</button>
                  </form>
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

        $(window).load(function(){
        
	  		});
    	</script>
   	</body>
</html>