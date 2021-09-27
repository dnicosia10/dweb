 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">  
    <link href="../css/index_style.css" rel="stylesheet">  
    <link href="../css/style.css" rel="stylesheet"> 
    <title>Register Borrowers</title> 
  </head> 
  <body>
<nav class="navbar navbar-inverse" id="navbar-top">
<div class="container-fluid">
<div class="navbar-header">
  <a class="navbar-brand" href=""><img src="../aiis-logo.png" style="height:40px; margin-top:-15px; position:relative;"></a>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">

</ul>
<ul class="nav navbar-nav navbar-right">


</ul>
</div>
</div>
</nav>
   <?php
 
 
	$server = "127.0.0.1";
	$user = "root";
	$con = mysql_connect("$server","$user");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "1";
	}if (!$db) {
		echo "2";
	}
	$error1 = $error2 = $error3 = $error4 = $error5 = $error6 = " ";
	if (isset($_POST['submit'])) { //restriction variable
	if (empty($_POST['username'])) {
		$error1 = "*";
	}else{
		$error1 = "";
	}if (empty($_POST['password'])) {
		$error2 = "*";
	}else{
		$error2 = "";
	}if (empty($_POST['confirm_password'])) {
		$error3 =  "*";
	}else{
		$error3 = "";
	}

//condition for redunduncy restriction
	
	$a = "";
if ( (!empty($_POST['username'])) && (!empty($_POST['password'])) && (!empty($_POST['confirm_password']))   ) {
	$sql1 = mysql_query("SELECT * FROM user_login_db WHERE login_username = '$_POST[username]' ");
	while ($row = mysql_fetch_array($sql1)) {
		$a = $row['login_username'];
		
	}
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	
	if ( $a == $username ) { 
		echo "<script type='text/javascript'>alert('Username already register!')</script>";
	}else{
    if ($password == $confirm_password) {
      $password = sha1(chop($password));
    $sql = mysql_query("INSERT INTO user_login_db(login_username,login_password)
      VALUES('$username','$password')");
    
    echo "<script type='text/javascript' onClick='window.location.reload(true)'>alert('Successful registered')</script>"; 
    $desc = "The admin ADD in Logs information ID " . $username ;
    $act = "ADD";
    $audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");
    echo "<script> location.replace('../index.php'); </script>";
    }else {echo "<script type='text/javascript'>alert('Password does not match!')</script>";}
		
	
	}
	
		}else
		echo "<script type='text/javascript'>alert('fill all the filled')</script>";
					//header("location:SDMO_EQUIPMENTS_ADD.php");
			
}

?>
<div class="" style="width: 70%;margin: 0 auto;">
  <div class="panel panel-primary">
  <div class="panel-heading">FIELDS</div>
  <div class="panel-body">
              	 <fieldset>
					<legend>Register admin</legend>
					<form action="" method="POST">
						
						Username:
						<span class='error'><?php echo $error1; ?></span>
						<input type="text" name="username" placeholder="Username" class="form-control"></br>
						Password:
						<span class='error'><?php echo $error2; ?></span>
							<input type="password" name="password"  class="form-control"> 
              Password Confirmation 
						<span class='error'><?php echo $error3; ?></span>
							<input type="password" name="confirm_password"  class="form-control"> 
						</br>

									 
					  	<input type="submit" name="submit" value="Register Now" class="btn btn-success"> 
					  	<a class="pull-right" href="../index.php">Or Login</a>
					</form>
				</fieldset>
              </div>
             </div>
            </div> 
          </div> 


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script> 
    <script type="text/javascript">
       
    </script>
    <style type="text/css">
      ul#cal-tabs > li > a{
        color: #333;
        width: 150px;
        margin-left: 30px;
        transition: 0.3s; 
        background-color: #00e6e6;
        border-radius: 5px;
      }
       ul#cal-tabs > li > a:hover{
          color: #fff;
       }
       form{
        text-align: center;
       }
       .form-control{
        width: 100%; 
       }
       .btn{
        width: 200px;
        padding: 10px;
        background-color: #00cccc;
        border: none;
       }
       .error{
        color: red;
       }
      
       #t-heads{
          background: linear-gradient(to bottom, #99ffff, #e6ffff);
          color: #999;
          font-size: 0.9em;
        }
    </style>
  </body>
</html>
 
 <?php

 ?>