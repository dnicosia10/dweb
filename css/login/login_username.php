<?php
session_start();
  if(!isset($_SESSION["uName"])) {
    header("Location: ../unauthorized.php");
  }
//### start connection
include_once '../importants/link.php';

$error1 = $error2 = $error3  = " ";
if (isset($_POST['submit'])) { //restriction variable
  if (empty($_POST['newuser'])) {
    $error1 = "*";
  }else{
    $error1 = "";
  }if (empty($_POST['password'])) {
    $error2 = "*";
  }else{
    $error2 = "";
  }if (empty($_POST['olduser'])) {
    $error3 =  "*";
  }else{
    $error3 = "";
  }
}

 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/general.css">
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>
<title>ATT . Register</title>
<style type="text/css">
  .error{
    color:red;
  }
  input{
    text-align: center;

  }.div1{
    width: 100%;
    background-color: red;
    color: red;

  }.div2{

    width: 100%;
    background-color: green;
    color:green;
  }
  </style>
</head>
<body>

<!-- ******************************************************-->
<nav class="navbar navbar-inverse" id="navbar-top">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="../dashboard-page.php"><img src="../aiis-logo.png" style="height:40px; margin-top:-15px; position:relative;"></a>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li class="active"><a href="../dashboard-page.php">Dashboard<span class="sr-only">(current)</span></a></li>
<li><a href="../gallery-page.php">Gallery</a></li>
<li><a href="../inventory-page.php">Equipments</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">

<li><a href="user_logout.php">Logout</a></li>
</ul>
</div>
</div>
</nav>

<div class="container-fluid" style="padding: 10px;">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="col-md-12 text-left" style="padding:5px;">
      <ul class="nav nav-pills pull-left">
          <li><a href="../dashboard-page.php"><span class="glyphicon glyphicon-menu-left"></span>  Back</a></li>
      </ul>
    </div>
  </div>
  </nav>
</div>
<!-- ******************************************************-->
<div class="container-fluid">
<div class="row">
  <!-- ******************************************************-->
  <div class="" style="width: 70%;margin: 0 auto;">
  <div class="panel panel-primary">
  <div class="panel-heading">Changing Username</div>
  <div class="panel-body">
    <form action="" method="POST">
  
    <div class="form-group">
      Old Username:
            <span class='error'><?php echo $error1; ?></span>
              <input type="text" name="olduser"  class="form-control">
           
    </div>
    <div class="form-group">
      New Username:
            <span class='error'><?php echo $error3; ?></span>
            <input type="text" name="newuser"  class="form-control">
    </div>
      <div class="form-group">
     Password:
            <span class='error'><?php echo $error2; ?></span>
            <input type="password" name="password"  class="form-control">
    </div>

        <input type="submit" name="submit" value="Save" class="btn btn-success pull-right">
    </form>
  </div>
  <div class="panel-footer">
  <?php
  //### start connection  
       
  include_once '../importants/link.php';
  if (isset($_POST['submit']))
  {

        


if ( (!empty($_POST['password'])) && (!empty($_POST['olduser'])) && (!empty($_POST['newuser']))  ) {
  $sql1 = mysql_query("SELECT * FROM user_login_db WHERE login_id =1 ");
  while ($row = mysql_fetch_array($sql1)) {
   
    $login_username = $row['login_username'];
    $login_password = $row['login_password'];

  }

  $password = sha1($_POST['password']) ;
  $newuser = trim($_POST['newuser']);
   $olduser = trim($_POST['olduser']);
  $newuserlen = strlen($newuser);
 
  if ( $password != $login_password ) {
    echo '<div class="alert alert-danger text-center" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <label>Password did not match!</label>
            </div>';
  }if ( $olduser != $login_username ) {
    echo '<div class="alert alert-danger text-center" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <label>Username did not match!</label>
            </div>';
  } if ( $newuserlen < 5 ) {
    echo '<div class="alert alert-danger text-center" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <label>New username must be minimum 5  characters!</label>
            </div>';
  } if (( $password == $login_password )&&( $olduser == $login_username )&&( $newuserlen >= 5 ) ){
    
    $sql = mysql_query("UPDATE user_login_db  SET login_username='$newuser' WHERE login_id =1");


    $desc = "The admin change username Successful " . $login_username ;
    $act = "Change";
    $audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

    echo '<div class="alert alert-success text-center" role="alert">
              <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
              <label>Change password Successful</label>
             
              </div>';//### redirect to login page
              
               

  }

    }else
      echo '<div class="alert alert-danger text-center" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <label>Fill All Fields </label>
          </div>';
      }

















  //### end of script
  ?>
  </div>
  </div>
  </div>
  <!-- ******************************************************
          ANOTHER PANEL
      ******************************************************-->
</div>
</div>
<!-- ******************************************************-->
</body>
</html>
