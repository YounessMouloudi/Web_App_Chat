<?php

include "../Model/Message.php";

class DaoMessage {
    
    private $dbh;

    public function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=test_db',"root","");
        } 
        catch (PDOException $e) {
            print"erreur!".$e->getMessage()."<br>";
            die();
        }
    }

    public function insertMessage(Message $msg){
        $stm = $this->dbh->prepare("Insert into message(message,emetteur,date) values(?,?,NOW())");
        $stm->bindValue(1,$msg->getMessage());
        $stm->bindValue(2,$msg->getEmetteur());
        $stm->execute();
    }
    public function listerMsgs() {
        // hna madrnach where hit bghina n affichiw tous les messages machi ghir les msgs dial une personne
        $stm = $this->dbh->prepare("select * from message order by date");
        $stm->execute();
        $result = $stm->fetchAll();
        return $result;
    }
}

?>
