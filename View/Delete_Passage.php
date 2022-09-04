<?php
require "../Controller/QuizzC.php";
require_once "../Model/Matiere.php";
require_once "../Model/User.php";

session_start();
if (!isset ($_GET["id"]))
    header("Location: home.html");
if (get_quizz_passage_id ($_GET["id"])) {
    $Cours=get_quizz_passage_id ($_GET["id"]);

    if (isset ($_SESSION["id"])) {
        if ($_SESSION["Role"] == "user")
            header("Home.html");
        else {
            Delete_Passage($_GET["id"]);
            echo "done";
            header("List_Quizz_Passage.php");
        }
    } else
        header("Location: login.php");
}
else header("Location: home.html");

header("AddQuizz.php");
?>