<?php

class Message {
    
    private $id, $message, $emetteur, $date;

    public function __construct($id,$message,$emetteur,$date) {
        $this->id = $id;
        $this->message = $message;
        $this->emetteur = $emetteur;
        $this->date = $date;
    }

    public function getid() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getMessage() {
        return $this->message;
    }
    public function setMessage($message) {
        $this->message = $message;
    }
    public function getDate() {
        return $this->date;
    }
    public function setdate($date) {
        $this->date = $date;
    }
    public function getEmetteur() {
        return $this->emetteur;
    }
    public function setEmetteur($emetteur) {
        $this->emetteur = $emetteur;
    }
}
?>
