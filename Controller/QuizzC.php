<?php
include_once "../config.php";
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


function get_All_Quizzes ()
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM Quizz '
        );
        $query->execute();
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
                array_push($A,$Q);

            }
            return $A;

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
            'UPDATE `quizz` SET (`Titre`, `Cours`, `Time`, `Question1`, `Question2`, `Question3`, `Question4`, `Question5`, `Question6`, `Question7`, `Question8`, `Question9`, `Question10`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `answer6`, `answer7`, `answer8`, `answer9`, `answer10`) VALUES ( :Title , :Cours , 20 , :Question_1 , :Question_2 , :Question_3, :Question_4, :Question_5, :Question_6, :Question_7, :Question_8, :Question_9, :Question_10, :Answer_1,:Answer_2,:Answer_3,:Answer_4,:Answer_5,:Answer_6,:Answer_7,:Answer_8,:Answer_9,:Answer_10) WHERE ID= :id');
        $query->execute(
            [
            ":Title" =>$Quizz->getTitre(),
                ":Cours" =>$Quizz->getCours(),
                ":Question_1"=>$Quizz->getQuestions()[0]->getQuestion(),
                ":Question_2"=>$Quizz->getQuestions()[1]->getQuestion(),
                ":Question_3"=>$Quizz->getQuestions()[2]->getQuestion(),
                ":Question_4"=>$Quizz->getQuestions()[3]->getQuestion(),
                ":Question_5"=>$Quizz->getQuestions()[4]->getQuestion(),
                ":Question_6"=>$Quizz->getQuestions()[5]->getQuestion(),
                ":Question_7"=>$Quizz->getQuestions()[6]->getQuestion(),
                ":Question_8"=>$Quizz->getQuestions()[7]->getQuestion(),
                ":Question_9"=>$Quizz->getQuestions()[8]->getQuestion(),
                ":Question_10"=>$Quizz->getQuestions()[9]->getQuestion(),
                ":Answer_1"=>$Quizz->getQuestions()[0]->getAnswer(),
                ":Answer_2"=>$Quizz->getQuestions()[1]->getAnswer(),
                ":Answer_3"=>$Quizz->getQuestions()[2]->getAnswer(),
                ":Answer_4"=>$Quizz->getQuestions()[3]->getAnswer(),
                ":Answer_5"=>$Quizz->getQuestions()[4]->getAnswer(),
                ":Answer_6"=>$Quizz->getQuestions()[5]->getAnswer(),
                ":Answer_7"=>$Quizz->getQuestions()[6]->getAnswer(),
                ":Answer_8"=>$Quizz->getQuestions()[7]->getAnswer(),
                ":Answer_9"=>$Quizz->getQuestions()[8]->getAnswer(),
                ":Answer_10"=>$Quizz->getQuestions()[9]->getAnswer(),
            ]
        );
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function update_quizz (Quizz $Quizz)
{
    try
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'INSERT INTO `quizz` (`Titre`, `Cours`, `Time`, `Question1`, `Question2`, `Question3`, `Question4`, `Question5`, `Question6`, `Question7`, `Question8`, `Question9`, `Question10`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `answer6`, `answer7`, `answer8`, `answer9`, `answer10`) VALUES ( :Title , :Cours , 20 , :Question_1 , :Question_2 , :Question_3, :Question_4, :Question_5, :Question_6, :Question_7, :Question_8, :Question_9, :Question_10, :Answer_1,:Answer_2,:Answer_3,:Answer_4,:Answer_5,:Answer_6,:Answer_7,:Answer_8,:Answer_9,:Answer_10)');
        $query->execute(
            [
                ":id"=>$Quizz->getId(),
                ":Title" =>$Quizz->getTitre(),
                ":Cours" =>$Quizz->getCours()->getId(),
                ":Question_1"=>$Quizz->getQuestions()[0]->getQuestion(),
                ":Question_2"=>$Quizz->getQuestions()[1]->getQuestion(),
                ":Question_3"=>$Quizz->getQuestions()[2]->getQuestion(),
                ":Question_4"=>$Quizz->getQuestions()[3]->getQuestion(),
                ":Question_5"=>$Quizz->getQuestions()[4]->getQuestion(),
                ":Question_6"=>$Quizz->getQuestions()[5]->getQuestion(),
                ":Question_7"=>$Quizz->getQuestions()[6]->getQuestion(),
                ":Question_8"=>$Quizz->getQuestions()[7]->getQuestion(),
                ":Question_9"=>$Quizz->getQuestions()[8]->getQuestion(),
                ":Question_10"=>$Quizz->getQuestions()[9]->getQuestion(),
                ":Answer_1"=>$Quizz->getQuestions()[0]->getAnswer(),
                ":Answer_2"=>$Quizz->getQuestions()[1]->getAnswer(),
                ":Answer_3"=>$Quizz->getQuestions()[2]->getAnswer(),
                ":Answer_4"=>$Quizz->getQuestions()[3]->getAnswer(),
                ":Answer_5"=>$Quizz->getQuestions()[4]->getAnswer(),
                ":Answer_6"=>$Quizz->getQuestions()[5]->getAnswer(),
                ":Answer_7"=>$Quizz->getQuestions()[6]->getAnswer(),
                ":Answer_8"=>$Quizz->getQuestions()[7]->getAnswer(),
                ":Answer_9"=>$Quizz->getQuestions()[8]->getAnswer(),
                ":Answer_10"=>$Quizz->getQuestions()[9]->getAnswer(),



            ]
        );
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function get_all_quizz_passage ($id)
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM `quizz_passage` WHERE id_Quizz=:id'
        );
        $query->execute([":id"=>$id
            ]);
        $count=$query->rowCount();
        if ($count==0){
            return 0;
        }
        else
        {
            $x=$query->fetchAll();
            $A=[];
            foreach ($x as $X) {
                $P = new passage($X["id"], $X["id_user"], $X["id_quizz"], $X["Date_Passage"], $X["Note"]);
                array_push($A,$P);
            }
            return $A;

        }
    } catch (PDOException $e) {
        $e->getMessage();
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

function get_quizz_passage_id ($id)
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM `quizz_passage` WHERE id=:id'
        );
        $query->execute([":id"=>$id,
            ":id"=>$id]);
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

function Delete_Quizz($id)
{
    try
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'DELETE FROM `Quizz` WHERE (`ID` = :id)'
        );
        $query->execute([
            ':id' => $id

        ]);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function Delete_Passage($id)
{
    try
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'DELETE FROM `quizz_passage` WHERE (`ID` = :id)'
        );
        $query->execute([
            ':id' => $id

        ]);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}




?>