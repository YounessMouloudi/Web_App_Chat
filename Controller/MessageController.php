<?php

include "../Model/Utilisateur.php";
include "../Dao/DaoMessage.php";

session_start();
$action = $_GET['action'];
$dao = new DaoMessage();

switch($action){

    case "messages":
        $result = $dao->listerMsgs();
        $user = $_SESSION['utilisateur'];

        foreach ($result as $row) {
            $message = new Message($row['id'],$row['message'],$row['emetteur'],$row['date']);
            if(substr($message->getDate(),0,10) == date('Y-m-d')){
                echo "<h6 class='date badge bg-dark-subtle fw-semibold text-black mx-auto mb-2'>Aujourd'hui</h6>";
            }
            else {
                echo "<h6 class='date badge bg-dark-subtle fw-semibold text-black mx-auto mb-2'>".substr($message->getDate(),0,16)."</h6>";
            }
            if($user->getEmail() == $message->getEmetteur()) {
                echo"<div class='w-50 align-self-end'>
                    <div class='message bg-primary-subtle fw-medium p-2 mb-4 float-end rounded-bottom-4 rounded-end-4 text-black'>
                        <h6 class='text-end text-secondary'>"
                            .$message->getEmetteur().
                        "</h6>"
                        .$message->getMessage().
                    "</div>
                </div>";
            }
            else {
                echo "<div class='w-50'>
                    <div class='message bg-primary-subtle fw-medium p-2 mb-4 float-start rounded-bottom-4 rounded-end-4 text-black'>
                        <h6 class='text-end text-secondary'>"
                            .$message->getEmetteur().
                        "</h6>"
                        .$message->getMessage().
                    "</div>
                </div>";
            }
        }
        break;

    case "send":
        $msg = new Message(0,$_POST['msg'],$_SESSION['utilisateur']->getemail(),getDate());
        $dao->insertMessage($msg);
        break;
}

?>