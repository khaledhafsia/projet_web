<?php
require "../Controller/UserC.php";
require_once "../Model/Matiere.php";
require_once "../Model/User.php";

session_start();
if (!isset ($_GET["id"]))
    header("Location: List_Users_Back.php");
if (Get_All_User_Info_back ($_GET["id"])) {
    if (isset ($_SESSION["id"])) {
        if ($_SESSION["Role"] != "admin")
            header("Home.php");
        else {
            Delete_User($_GET["id"]);
            echo "done";
            header("List_Users_Back.php");
        }
    } else
        header("Location: login.php");
}
else header("Location: home.html");

header("Add_Cours.php");
?>