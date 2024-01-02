<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> -->
    <style>
        body {
            background-color: #ced4da;
        }
        .btn-envoyer,.btn-envoyer:hover,.btn-envoyer:active {
            background-color: black !important;
            color: rgba(255, 255, 255, 0.9)!important;
        }
        #conversation {
            height: 450px;
        }
        .date,h6{
            font-size: smaller;
        }
    </style>
</head>
<body>
    <div>
        <?php
            include "bienvenue.php";
        ?>
    </div>
        <div id="conversation" class="card px-3 pt-2 mx-auto mb-3 w-50 overflow-y-scroll"></div>

        <div id="zoneMessage" class="form-group d-flex gap-3 w-50 mx-auto mb-4">
            <textarea name="" cols="" id="Msg" rows="1" class="form-control" autofocus></textarea>
            <div class="">
                <button class="btn btn-md btn-envoyer fw-bold" onclick="sendMessages()">Envoyer</button>
            </div>
        </div>
    <script>

        window.onload = loadMessages();

        function sendMessages() {

            var message = document.getElementById("Msg");

            if(message.value == "") {
                alert("Saisir un message pour l'envoyer");
                loadMessages();
                return;
            }
            else {

                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200 ) {
                        message.value =""; // hadi drnaha bach mnin tatssift lmsg khass tkhwa dik input
                    }
                    else {
                        console.log(xhr.responseText);
                    }            
                }

                xhr.open('POST',"../Controller/MessageController.php?action=send",true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send(" msg= " + message.value);
                /* had "msg" khass darori tkon b7al hadi li f ($_POST['msg']) li kayna f Messagecontroller f case send 
                ila drtiha mkhtalfa ghay3tik error w khass tkon mlass9a m3a = la drti binathom espace ghay3tik error */
                loadMessages();
            }
        }

        function loadMessages() {

            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200 ) {
                    document.getElementById("conversation").innerHTML = xhr.responseText;
                }
                else {
                    console.log(xhr.responseText);
                }
            }
            xhr.open('GET',"../Controller/MessageController.php?action=messages",true);
            xhr.send();
        };
    </script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>