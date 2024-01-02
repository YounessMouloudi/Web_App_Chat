<?php

include "../Dao/DaoUtilisateur.php";

$action = $_GET['action'];
$dao = new DaoUtilisateur(); 

switch($action){
    case "insert":
        $visible = $_POST["visibility"];
        $name = $_POST["pseudo"];
        $site = $_POST["site"];
        $tel = $_POST["telephone"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $birth = $_POST["birthdate"];
        $desc = $_POST["description"];
        
        if(isset($visible,$name,$site,$tel,$email,$pass,$birth,$desc)){
            $utilisateur = new Utilisateur($email,$pass,$name,$birth,$tel,$visible,$site,$desc);
            $dao -> insertUser($utilisateur);
            header('location: ../View/Conversation.php');
        }
        break;

    case "login":
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $utilisateur = $dao -> loginUser($email,$pass);
        if ($utilisateur != null) {
            session_start();
            $_SESSION['utilisateur'] = $utilisateur;
            header('location: ../View/Conversation.php');
        }
        else {
            session_start();
            $_SESSION['login'] = true ;
            header('location: ../View/login.php');
        }
        break;
        
    case "logout":
        session_start();
        session_destroy();
        // ila drna had location man7tajoch ndiro f bienvenue else
        // header('location: ../View/login.php');
        header('location: ../View/bienvenue.php');
        break;
}
?>