<?php

include "../Model/Utilisateur.php";

class DaoUtilisateur {

    private $dbh;

    public function __construct(){
        try{
            $this -> dbh = new PDO('mysql:host=localhost;dbname=test_db',"root","");
        }
        catch(PDOException $e){
            print"erreur".$e->getmessage()."</br>";
            die();
        }
    }
    public function insertUser(Utilisateur $utilisateur){
        $stm = $this -> dbh -> prepare("INSERT INTO utilisateur VALUES(?,?,?,?,?,?,?,?)");
        $stm -> bindValue(1,$utilisateur->getemail());
        $stm -> bindValue(2,$utilisateur->getpassword());
        $stm -> bindValue(3,$utilisateur->getnom());
        $stm -> bindValue(4,$utilisateur->getdate());
        $stm -> bindValue(5,$utilisateur->getTelephone());
        $stm -> bindValue(6,$utilisateur->getvisibilite());
        $stm -> bindValue(7,$utilisateur->getSiteWeb());
        $stm -> bindValue(8,$utilisateur->getdescription());
        $stm -> execute();
    }
    public function loginUser($email,$pass){
        $utilisateur = null;
        $stm = $this -> dbh -> prepare("SELECT * FROM utilisateur WHERE email=? AND password =?");
        $stm -> bindValue(1,$email);
        $stm -> bindValue(2,$pass);
        $stm -> execute();
        $res = $stm -> fetch(PDO::FETCH_ASSOC);
        if (!empty($res)) {
            $utilisateur = new Utilisateur($res['email'],$res['password'],$res['name'],$res['birthdate'],$res['telephone'],$res['visibility'],$res['website'],$res['description']);
        }
        return $utilisateur;
    }
}

?>