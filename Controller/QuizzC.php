<?php
require_once "../Model/Quizz.php";
require_once  "../Model/Quizz_Question.php";
require_once  "../Model/Passage.php";
function get_quizz_info ($id)
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT Q.* FROM Quizz AS Q WHERE Q.ID=:id'
        );
        $query->execute([":id"=>$id]);
        $count=$query->rowCount();
        if ($count==0){
            return 0;
        }
        else
        {
            $A=[];
            $X=$query->fetchAll();
            foreach ($X as $x) {
                $F=[];
                for ($i=1;$i<11;$i++)
                {
                    $q=new Quizz_Question($x['Question'.$i],$x['answer'.$i],$i);
                    array_push($F,$q);
                }
                $Q=new Quizz($x["ID"], $x["Titre"], $x["Time"], $x["Cours"], $F);

            }
            return $Q;

        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function get_quizz_info_from_cours ($id)
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM `Quizz` WHERE Cours=:id'
        );
        $query->execute([":id"=>$id]);
        $count=$query->rowCount();
        if ($count==0){
            return 0;
        }
        else
        {
            $A=[];
            $X=$query->fetchAll();
            foreach ($X as $x) {
                $F=[];

                $Q=new Quizz($x["ID"], $x["Titre"], $x["Time"], $x["Cours"], $F);
                array_push($A,$Q);
            }
            return $A;

        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function add_quizz_passage($id,$idu,$note)
{
    try
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'INSERT INTO `quizz_passage` (`id_user`, `id_quizz`, `Note` ) VALUES (:iduser,:idquizz,:note)'
        );
        $query->execute([
            ':iduser' => $idu,
            ':idquizz' => $id,
            ':note' => $note
        ]);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function add_quizz(Quizz $Quizz)
{
    try
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'INSERT INTO `quizz`(`Titre`, `Cours`, `Time`, `Question1`, `Question2`, `Question3`, `Question4`, `Question5`, `Question6`, `Question7`, `Question8`, `Question9`, `Question10`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `answer6`, `answer7`, `answer8`, `answer9`, `answer10`) VALUES (' .$Quizz->getTitre().','.$Quizz->getCours()->getId().' , '.$Quizz->getTime().' , '.$Quizz->getQuestions()[0]->getQestion().' , ' .$Quizz->getQuestions()[1]->getQestion().' , '.$Quizz->getQuestions()[2]->getQestion().','.$Quizz->getQuestions()[3]->getQestion().','.$Quizz->getQuestions()[4]->getQestion().','.$Quizz->getQuestions()[5]->getQestion().','.$Quizz->getQuestions()[6]->getQestion().','.$Quizz->getQuestions()[7]->getQestion().','.$Quizz->getQuestions()[8]->getQestion().','.$Quizz->getQuestions()[9]->getQestion().','.$Quizz->getQuestions()[0]->getAnswer().','.$Quizz->getQuestions()[1]->getAnswer().','.$Quizz->getQuestions()[2]->getAnswer().','.$Quizz->getQuestions()[3]->getAnswer().','.$Quizz->getQuestions()[4]->getAnswer().','.$Quizz->getQuestions()[5]->getAnswer().','.$Quizz->getQuestions()[6]->getAnswer().','.$Quizz->getQuestions()[7]->getAnswer().','.$Quizz->getQuestions()[8]->getAnswer().','.$Quizz->getQuestions()[9]->getAnswer()
        );
        $query->execute();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function get_quizz_passage ($id,$iduser)
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM `quizz_passage` WHERE id_user=:idu AND id_quizz=:id'
        );
        $query->execute([":id"=>$id,
            ":idu"=>$iduser]);
        $count=$query->rowCount();
        if ($count==0){
            return 0;
        }
        else
        {
            $X=$query->fetch();
            $P=new passage($X["id"],$X["id_user"],$X["id_quizz"],$X["Date_Passage"],$X["Note"]);
            return $P;

        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}





?>