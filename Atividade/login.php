<?php
    $login = "admin";
    $senha = "admin";

    if(isset($_POST["login"])){
        if($_POST["login"] == $login and $_POST["senha"] == $senha){
            echo "";?>
            <!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sessão</title>
    <link rel="stylesheet" type="text/css" href="StyleSheet.css">
</head>
<body>
    <div class="login_confirmado">
        <br>
    <img src="img/login_confirmado.jpg">
    <a href="inicio.php" class="continuar">Continuar</a>

    </div>
    
</body>
</html>
<?php
        }else{
            echo "Login ou senha invalidos";?>
            <!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sessão</title>
</head>
<body>
    <br>
    <a href="index.php">Voltar</a>

</body>
</html>
<?php
        }
    }

    ?>