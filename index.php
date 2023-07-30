<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PRACTICA MYSQL</title>
    <?php
    //Majemos los errores
    $error = array();
    if (isset($_POST["bandera"])) {
        //Obtenemos los datos del formulario
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        if ($nombre == "") {
            $error[0] = "Error: el nombre del usuario no puede estar vacío";
        }
        if ($password == "") {
            $error[1] = "Error: la clave de acceso no puede ser vacía";
        }
    }
    ?>
</head>

<body>
    <div class="pr-container">
        <aside class="scd-container">
            <h1 class="title-pr">Inicio de sesion</h1>
            <p class="somepr-ol">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.sit amet consectetur adipisicing elit.sit amet consectetur adipisicing elit.

            </p>

            <form class="form-init" method="post" action="index.php">
                <input class="input-cl" type="text" name="nombre" id="nombre" placeholder=" Usuario" value="<?php print isset($nombre) ? $nombre : ''; ?>" /><br>
                <?php
                if (isset($error[0])) print "<p class='error'>" . $error[0] . "</p>"; ?>
                
                <input class="input-cl" type="password" name="password" id="password" placeholder=" Contraseña" value="<?php print isset($password) ? $password : ''; ?>" /><br>
                <?php
                if (isset($error[1])) print "<p class='error'>" . $error[1] . "</p>"; ?>
                <input type="hidden" name="bandera" id="bandera" value="bandera">
                <input class="bnt-pr" type="submit" value="Enviar">
            </form>
        </aside>
        <img src="./assets/background.jpg" alt="">

    </div>




</body>

</html>