<?php
session_start();
if(isset($_SESSION['auth'])){
  header('location: Welcome.php');

}
else {
  header('location: index.php');
}

?>
