<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['Username']);
unset($_SESSION['Password']);
unset($_SESSION['Role']);
unset($_SESSION['Email']);
session_destroy();
header("Location: home.php");
?>