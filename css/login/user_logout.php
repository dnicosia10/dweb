<?php
session_start();
$con = mysql_connect("localhost","root");
            $db = mysql_select_db("aiis_db");
            if (!$con) {
              echo "connection lost";
            }if (!$db) {
              echo "DB lost";
            }
              $desc = "The admin LOG-OUT";
               $act = "LOG";
            $audit = mysql_query("INSERT INTO sdmo_audit(   AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

session_destroy();

echo 'You have successfully logged out!';
echo '<br><a href = "index.php">Go to Login</a>';

?>
<html>
  <head>
      <title>Logged of successfully</title>
      <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<body>
  <div class="login-container" >
    <center><h2 >
  You have logged off successfully
  </h2>
<a href="../index.php" style="background-color:rgb(46, 199, 255) !important;color:white;padding:8px;margin-top:-3px;">Go to Login page</a></center>
<p></p>
    </form>
  </div>
</body>
</html>
