<?php
session_start();
if (isset($_SESSION["id"])) {
    echo "welcome ".$_SESSION["Username"];
}
else echo "not connectedd : (";

