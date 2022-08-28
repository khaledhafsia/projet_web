<?php
session_start();
if (isset($_SESSION["id"])) {
    echo "welcome ".$_SESSION["Role"];
}
else echo "not connectedd : (";

