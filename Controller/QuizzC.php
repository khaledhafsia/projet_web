<?php
require_once "../Model/Quizz.php";
require_once  "../Model/Quizz_Question.php";
function get_quizz_info ($id)
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM Quizz WHERE ID=:id'
        );
        $query->execute([":id"=>$id]);
        $count=$query->rowCount();
        if ($count==0){
            return 0;
        }
        else
        {
            $X=$query->fetchAll();
            foreach ($X as $x) {

            }

            return $Cours_info;
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}



?>