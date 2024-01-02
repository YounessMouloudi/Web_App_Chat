<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #82ccddad;
            font-size: 15px;
        }
        h2 {
            color: rgba(255, 217, 0, 0.9);
	        background-color: black ;
        }
        hr {
            border:gold solid 2px;
            opacity:1;
            margin: -2px 0 0;
        }
        legend {
            color: rgba(255, 0, 0, 0.8);
        }
        .fieldset{
            width: 600px;
	        background-color: black;
        }
        .btn {
            background-color: #82ccdd !important;
        }
        .btn:hover {
            background-color: rgba(255, 217, 0, 0.88) !important;
        }
    </style>
</head>
<body class="bg">
    <div class="mb-4">
        <h2 class="text-center p-3 mb-0">Page Login</h2>
        <hr>    
    </div>
    <?php
        session_start();
        if(isset($_SESSION['login'])){
            echo "<div class='container w-50 mx-auto alert alert-danger' role='alert'>
                    <strong>Login Failed : </strong>
                    Votre Email ou Mot de Passe Incorrecte !
                </div>";
            unset($_SESSION['login']);
            // session_destroy();
        }
    ?>
    <div class="container d-flex justify-content-center">
        <form action="../Controller/Controller.php?action=login" class="" method="post" id="form">
            <legend class="py-2 px-1 fw-semibold">.:: Login ::.</legend>
                <div class="fieldset card px-3 py-4 text-white">
                    <div class="form-group fw-semibold pt-3 px-2">
                        <div class="row mb-4">
                            <label id="texte" class="col-5 mt-2 form-label" for="">E-mail :</label>
                            <div class="col-7">
                                <input type="email" class="form-control" name="email" id="email" autofocus>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label id="texte" class="form-label mt-2 col-5" for="">Mot de passe :</label>
                            <div class="col-7 mb-3">
                                <input type="password" class="form-control" name="pass" id="pass">
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <button id="btn" class="btn btn-md text-black fw-bold" onclick="valid()">Connecter</button>
                            <input type="reset" class="btn btn-md text-black fw-bold" value="Effacer">  
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <script>
        var form = document.getElementById("form");
        function valid() {
            var email = document.getElementById("email");
            var pass = document.getElementById("pass");
            if(email.value =="" || pass.value ==""){
                alert("Saisir votre email et mot de passe pour vous connecter !!");
                return form.action="";
            }
        }
    </script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>