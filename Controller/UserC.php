<?php
include "../config.php";
require_once "../Model/User.php";


function Create_User(User $New_User)
{
    try
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'INSERT INTO user (Username, Email, Password, Role) VALUES (:Username, :Email, :Password, :Role )'
        );
        $query->execute([
            ':Username' => $New_User->getUsername(),
            ':Email' => $New_User->getEmail(),
            ':Password' => $New_User->getPassword(),
            ':Role' => $New_User->getRole()

        ]);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function Check_Info ($email,$Login,$id)
{
    $conn = config::getConnexion();

    $sql="SELECT Username, Email FROM user WHERE (Username='$Login') OR (Email='$email')";
    $result = $conn->query($sql);
    if (isset($result->num_row))
    {if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            if (row["Login"]===$Login)
                echo "Login déja utilisé";
            if (row["Email"]===$email)
                echo "Email déja utilisé";
        }
        return 0;
    }
    else return 1;}
    else return 1;
}


function verification_sign_in ($Username, $Password)
{
    $sql="SELECT * FROM User WHERE Username= :Username AND Password= :Password";
    $db=config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([':Username' => $Username,
            ':Password' =>  $Password]);
        $count=$query->rowCount();
        if ($count==0){
            return 0;
        }
        else
        {
            $x=$query->fetch();
            $User_info = new User ($x["id"],$x["Username"],$x["Password"],$x["Email"],$x["Role"],[]);
            return $User_info;
        }}
    catch (Exception $e)
    {
        echo $e->getMessage();
    }


}

function Connect ($id)
{
    session_start();
    try{
        $sql="SELECT * FROM user WHERE id=$id";
        $db=config::getConnexion();
        $query=$db->prepare($sql);
        $query->execute();
        $count=$query->rowCount();
        $x=$query->fetch();
        echo $sql;
        echo $x;
        $_SESSION["id"]=$id;
        $_SESSION["Username"]=$x["Username"];
        $_SESSION["Password"]=$x["Password"];
        $_SESSION["Role"]=$x["Role"];
        $_SESSION["Email"]=$x["Email"];
    }
    catch (Exception $e)
    {
        echo "error while connecting :";
        echo $e->getMessage();
        session_destroy();
    }
}

function Get_All_User_Info ()
{
    $sql="SELECT * FROM user";
    $db=config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();
        $count=$query->rowCount();
        if ($count==0){
            echo "Aucun Resultat";

        }
        else
        {
            $x=$query->fetchAll();
            return $x;
        }}
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}
function Get_one_User_Info($id)
{
    $sql="SELECT * FROM user where id=$id";
    $db=config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();
        $count=$query->rowCount();
        if ($count==0){
            echo "Aucun Resultat";

        }
        else
        {
            $x=$query->fetchAll();
            return $x;
        }}
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}



