<?php
require "../Controller/CoursC.php";
require_once "../Model/Matiere.php";
require_once "../Model/User.php";

session_start();
if (!isset ($_GET["id"]))
    header("Location: home.html");
if (Get_Cours ($_GET["id"])) {
    $Cours=Get_Cours ($_GET["id"]);

    if (isset ($_SESSION["id"])) {
        if ($_SESSION["Role"] == "user")
            header("Home.html");
        else {
            Delete_Cours($_GET["id"]);
            echo "done";
            header("List_Cours_Back.php");
        }
    } else
        header("Location: login.php");
}
else header("Location: home.html");

header("Add_Cours.php");
?>