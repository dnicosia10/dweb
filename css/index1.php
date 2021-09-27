<?php
session_start();
  if(isset($_SESSION["uName"])) {
    header("Location: redirect.php");

  }

?>
<html>
  <head> 
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="login/style.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <style type="text/css">
        #login-btn2{
          background: #54cf00;
          width: 99%;
          height: 40px;
          border: none;
          font-size: 16px;
          border-radius: 6px;
        }
      </style>
  </head>
<body>
  <div class="login-container">
  <center><img src="imgs/Lgo2.png" class="logo-img"></center>
    <form method="POST" >
      Username<input type="text" style="color:black;" name="login-name" class="inputs"><br>
      Password<input type="password" style="color:black;" name="login-pass" class="inputs">
      <input type="submit" name="submit-but" id="login-btn" value="Login">
      <a href="login/login_register.php" type="button" class="btn btn-success" id="login-btn2" >Register </a>
    </form>
  </div>
</body>
</html>
<?php
//  session_start();
    if(isset($_POST['submit-but'])){
      require 'login/connect.php';
        $login_userName = $_POST['login-name'];
        $login_passWord = $_POST['login-pass'];
        $hashed_pass = sha1($login_passWord);
        $result = mysql_query("SELECT * FROM appl_acct ");
        while ($row = mysql_fetch_array($result)) {
         $user = $row['acct_email'];
         $pass = $row['acct_pass'];
          if (($user == $login_userName)&&($pass == $hashed_pass)){
          $_SESSION["uName"] = $login_userName;
          $_SESSION["uPass"] = $login_passWord;
          $_SESSION["num"] = 0;
          $desc = "The admin LOG -IN";
          $act = "LOG";

          $audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

          header('Location:dashboard-page.php');

        }

        }
              
         
    }
?>
