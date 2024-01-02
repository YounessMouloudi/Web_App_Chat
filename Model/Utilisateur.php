<?php

class Utilisateur{
    
    private $nom,$email,$telephone,$password,$siteWeb,$description,$visibilité,$dateNaissance;

    public function __construct($email,$password,$nom,$dateNaissance,$telephone,$visibilité,$siteWeb,$description){
        $this -> nom = $nom;
        $this -> email = $email;
        $this -> telephone = $telephone;
        $this -> password = $password;
        $this -> siteWeb = $siteWeb;
        $this -> description = $description;
        $this -> visibilité = $visibilité;
        $this -> dateNaissance = $dateNaissance;
    }
    public function getnom(){
        return $this -> nom;
    }
    public function setnom($nom){
        $this -> nom = $nom;
    }
    public function getemail(){
        return $this -> email;
    }
    public function getpassword(){
        return $this -> password;
    }
    public function getSiteWeb(){
        return $this -> siteWeb;
    }
    public function getdescription(){
        return $this -> description;
    }
    public function getvisibilite(){
        return $this -> visibilité;
    }
    public function getdate(){
        return $this -> dateNaissance;
    }
    public function getTelephone(){
        return $this -> telephone;
    }
    public function setTelephone($telephone){
        $this -> telephone = $telephone;
    }
}

?>