<?php
session_start();
if (isset($_SESSION["id"])) {
    echo "welcome ".$_SESSION["id"];
}
else echo "not connectedd : (";

