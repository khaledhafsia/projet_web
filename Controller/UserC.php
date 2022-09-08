<?php
include_once "../config.php";
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

function Update_User(User $New_User)
{
    try
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'UPDATE `user` SET Username=:Username, Email= :Email, Password=:Password, Role= :Role WHERE (ID = :id)'
        );
        $query->execute([
            ':Username' => $New_User->getUsername(),
            ':Email' => $New_User->getEmail(),
            ':Password' => $New_User->getPassword(),
            ':Role' => $New_User->getRole(),
            ':id' => $New_User->getId()

        ]);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function Delete_User($id)
{
    try
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'DELETE FROM `user` WHERE (`ID` = :id)'
        );
        $query->execute([
            ':id' => $id

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

function Check_Info1 ($email,$Login,$id)
{
    $conn = config::getConnexion();

    $sql="SELECT Username, Email FROM user WHERE ((Username='$Login') OR (Email='$email')) AND id != '$id'";
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
            $User_info = new User ($x["ID"],$x["Username"],$x["Password"],$x["Email"],$x["Role"],[]);
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
function Get_All_User_Info_back ()
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
            $A=[];
            $x=$query->fetchAll();
            foreach ($x as $X)
            {
                $User_info = new User ($X["ID"],$X["Username"],$X["Password"],$X["Email"],$X["Role"],[]);
                array_push($A,$User_info);
            }
            return $A;
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
            return 0;

        }
        else
        {
            $x=$query->fetch();
            return $x;
        }}
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}


function email_account($Acc)
{

    $msg = "New Account Created\nWelcome".$Acc->getUsername();

// use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 70);

// send email
    mail($Acc->getEmail(), "Welcome To Online Learning", $msg);

}

