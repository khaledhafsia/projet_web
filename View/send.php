<?php
require_once "../Model/User.php";
require_once "../Controller/UserC.php";
$acc=new User(0,"AAAAAAAA","","jaouaniw@gmail.com","",[]);
email_account($acc);
?>