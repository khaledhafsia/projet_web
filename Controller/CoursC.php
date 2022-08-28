<?php
include "../config.php";
require_once "../Model/Cours.php";
function Get_All_Cours ()
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM Cours'
        );
        $query->execute();
        return $query->fetch();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}