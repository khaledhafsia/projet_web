<?php
include_once "../config.php";
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



function search_filter($search,$list)
{
    $A=[];
    foreach ($list as $i)
    {
        if (strpos($i->getTitre(),$search)!==false)
        {
            array_push($A,$i);
        }
    }
    return $A;
}

function filter_mat($M,$list)
{
    $A=[];
    foreach ($list as $i)
    {
        if ($i->getMatiere()->getId()==$M)
        {
            array_push($A,$i);
        }
    }
    return $A;
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

function get_all_matieres ()
{
    $sql="SELECT * FROM Matiere";
    $db=config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();
        $count=$query->rowCount();
        if ($count==0){
            return 0;
        }
        else
        {
            $A=[];
            $x=$query->fetchAll();
            foreach ($x as $M)
                {
                    $matiere=new Matiere($M["ID"],$M["Titre"]);
                    array_push($A,$matiere);
                }
            return $A;
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
function Add_Cours ($Cours)
{

        try
        {
            $pdo = config::getConnexion();
            $query = $pdo->prepare(
                'INSERT INTO `cours`( `Titre`, `Enseignant`, `Matiere`, `File`, `Contenu`) VALUES (:Titre,:Enseignant,:Matiere,:File,:Contenu)'
            );
            $query->execute([
                ':Titre' => $Cours->getTitre(),
                ':Enseignant' => $Cours->getEnseignat()->getID(),
                ':Matiere' => $Cours->getMatiere()->getId(),
                ':File' => $Cours->getFile(),
                ':Contenu' =>$Cours->getContenu()

            ]);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

}

function Update_Cours (Cours $Cours)
{
    try
    {
        $pdo = config::getConnexion();
        if ($Cours->getFile()==""){
        $query = $pdo->prepare(
            'UPDATE `cours` SET  `Titre`= :Titre,`Matiere`= :Matiere, `Contenu`= :Contenu  WHERE ID= :id'
        );
            $query->execute([
                ':id' => $Cours->getId(),
                ':Titre' => $Cours->getTitre(),
                ':Matiere' => $Cours->getMatiere()->getId(),
                ':Contenu' =>$Cours->getContenu()

            ]);
        }
        else{
            $query = $pdo->prepare(
                'UPDATE `cours` SET  `Titre`=:Titre,`Matiere`=:Matiere, `File`=:File, `Contenu`=:Contenu  WHERE ID= :id'
            );
            $query->execute([
                ':id' => $Cours->getId(),
                ':Titre' => $Cours->getTitre(),
                ':Matiere' => $Cours->getMatiere()->getId(),
                ':File' => $Cours->getFile(),
                ':Contenu' =>$Cours->getContenu()

            ]);
        }

    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

}
function Delete_Cours ($id)
{
    try
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'DELETE FROM `cours` WHERE ID=:id'
        );
        $query->execute([
            ':id' => $id
        ]);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}



function Upload_Image($image,$err)
{
    $err="";
    $target_dir = "../Assets/images_cours/";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($image["tmp_name"]);
        if($check !== false) {
            $err="File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file)) {
        $err= "Sorry, file already exists.";
        $uploadOk = 0;
    }

// Check file size
    if ($image["size"] > 500000) {
        $err= "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $err= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $err= "Sorry, your file was not uploaded.";
        return false;
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            return true;
        } else {
            $err= "Sorry, there was an error uploading your file.";
        }
    }


}
