<?php
include "../config.php";
require_once "../Model/Cours.php";
require_once "../Model/Matiere.php";
require_once "../Model/User.php";
function Get_All_Cours ()
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM Cours ORDER BY  DATE_UPLOAD DESC'
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
                $Cours_info = new Cours ($x['ID'], $x['Titre'], get_matiere($x['Matiere']), get_teacher_name($x["Enseignant"]), $x["Contenu"], $x["Date_Upload"]);
                $Cours_info->setFile($x["File"]);
                array_push($A,$Cours_info);
            }

            return $A;
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function Get_Cours ($id)
{
    try {
        $pdo = Config::getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM Cours WHERE ID=:id'
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
                $Cours_info = new Cours ($x['ID'], $x['Titre'], get_matiere($x['Matiere']), get_teacher_name($x["Enseignant"]), $x["Contenu"], $x["Date_Upload"]);
                $Cours_info->setFile($x["File"]);
            }

            return $Cours_info;
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function get_teacher_name ($id)
{
    $sql="SELECT * FROM User WHERE id= :id";
    $db=config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([':id' => $id]);
        $count=$query->rowCount();
        if ($count==0){
            return 0;
        }
        else
        {
            $x=$query->fetch();
            $User_info = new User ($x["ID"],$x["Username"],$x["Password"],$x["Email"],$x["Role"],[]);
            return $User_info;
        }}
    catch (Exception $e)
    {
        echo $e->getMessage();
    }

}

function get_matiere ($id)
{
    $sql="SELECT * FROM Matiere WHERE id= :id";
    $db=config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([':id' => $id]);
        $count=$query->rowCount();
        if ($count==0){
            return 0;
        }
        else
        {
            $x=$query->fetch();
            $matiere=new Matiere($x["ID"],$x["Titre"]);
            return $matiere;
        }}
    catch (Exception $e)
    {
        echo $e->getMessage();
    }

}

function filter_search ($A,$search)
{
    $X=[];
    foreach ($A as $a)
        {
            if (strpos($a->getTitre(),$search))
            {
                array_push($X,$a);
            }
        }
    return $X;
}

function filter_Matiere ($A,$matiere)
{
    $X=[];
    foreach ($A as $a)
    {
        if (strpos($a->getMatiere()->getTitre(),$matiere))
        {
            array_push($X,$a);
        }
    }
    return $X;
}

