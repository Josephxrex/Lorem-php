<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
    <?php
    include "lib/conn.php";
    //Majemos los errores
    $error = array();
    //Manejo de errores SQL
    $msg = array();
    if (isset($_POST["bandera"])) {
        //Obtenemos los datos del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $puesto = $_POST['puesto'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        //Para mas tarde ultilizar el mismo para actualizar un usuario
        $id = (isset($_POST["id"])) ? $_POST["id"] : "";

        if ($nombre == "") {
            $error[0] = "Error: El nombre del usuario no puede estar vacío";
        }
        if ($apellido == "") {
            $error[1] = "Error: El apellido del usuario no puede estar vacío";
        }
        if ($usuario == "") {
            $error[2] = "Error: El usuario no puede estar vacío";
        }
        if ($password == "") {
            $error[3] = "Error: La clave de acceso no puede ser vacía";
        }
        if (isset($puesto)) {
            if ($puesto == "") {
                $error[4] = "Error: Debe de seleccionar al menos un puesto";
            }
        } else {
            $error[5] = "Error: Debe de seleccionar al menos un puesto";
        }
    }

    //Gettin the data from the user to update
    if (isset($_GET["a"])) {
        $a = $_GET["a"];
        $idUpdate = $_GET['id'];
        if ($a == "update") {
            $sql = "SELECT * FROM usuarios WHERE idUser = $idUpdate";
            $r = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($r);
            $nombre = $data['nombre'];
            $apellido = $data['apellidos'];
            $usuario = $data['usuario'];
            $password = $data['password1'];
            $puesto = $data['puesto'];
            $valorP = True;
        }
    } else {
        $a = "insert";
    }

    //Update a user

    if (isset($_POST['idUpdate'])) {
        $id = $_POST['idUpdate'];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $puesto = $_POST["puesto"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $sql = "UPDATE usuarios SET ";
        $sql .= "nombre='" . $nombre . "',";
        $sql .= "apellidos='" . $apellido . "',";
        $sql .= "usuario='" . $usuario . "',";
        $sql .= "password1='" . $password . "',";
        $sql .= "puesto='" . $puesto . "'";
        $sql .= "WHERE idUser=" . $id;
        print($sql . "<br>");
        if (mysqli_query($conn, $sql)) {
            array_push($msg, "Se modificó el registro correctamente");
            echo "<script>location.href='AdministracionUsers.php'</script>";
        } else {
            array_push($msg, "Error al modificar el registro");
        }
    } else {
        //Insert a user
        if ($a == "insert") {
            if (isset($_POST['nombre'])) {
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $puesto = $_POST["puesto"];
                $usuario = $_POST["usuario"];
                $password = $_POST["password"];
                $sql = "INSERT INTO usuarios(nombre,apellidos,puesto,usuario,password1) VALUES('$nombre','$apellido','$puesto','$usuario','$password')";
                if (mysqli_query($conn, $sql)) {
                    array_push($msg, "Se insertó el usuario correctamente");
                    echo "<script>location.href='AdministracionUsers.php'</script>";
                } else {
                    array_push($msg, "Error al insertar el registro");
                }
            }
        }
    }




    ?>
</head>

<body>

    <div class="pr-container">
        <aside class="scd-container-user">

            <form class="form-user" method="post" action="RegisterUser.php">
                <h1 class="title-pr"><?php
                                        if (isset($_GET["a"])) {
                                            $a = $_GET["a"];
                                            if ($a == "update") {
                                                echo "Actualización";
                                            } else {
                                                echo "Registro";
                                            }
                                        } else {
                                            echo "Registro";
                                        }
                                        ?>
                    <br>
                    Usuario
                </h1>
                <p class="somepr-user">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.sit amet consectetur adipisicing elit.sit amet consectetur adipisicing elit.
                </p>

                <input class="input-cl" type="text" name="nombre" id="nombre" placeholder=" Nombre" value="<?php print isset($nombre) ? $nombre : ''; ?>" /><br>
                <?php
                if (isset($error[0])) print "<p class='error'>" . $error[0] . "</p>"; ?>

                <input class="input-cl" type="text" name="apellido" id="apellido" placeholder=" Apellido" value="<?php print isset($apellido) ? $apellido : ''; ?>" /><br>
                <?php
                if (isset($error[1])) print "<p class='error'>" . $error[1] . "</p>"; ?>
                <select class="input-cl" name="puesto" id="puesto">
                    <option value="MTN">Mantenimiento</option>
                    <option value="RH">Recursos Humanos</option>
                    <option value="TI">Tecnologias de la Informacion</option>
                </select><br>


                <?php
                if (isset($error[4])) print "<p class='error'>" . $error[4] . "</p>";
                ?>
                <input class="input-cl" type="text" name="usuario" id="usuario" placeholder=" Usuario" value="<?php print isset($usuario) ? $usuario : ''; ?>" /><br>
                <?php
                if (isset($error[2])) print "<p class='error'>" . $error[2] . "</p>"; ?>

                <input class="input-cl" type="password" name="password" id="password" placeholder=" Password" value="<?php print isset($password) ? $password : ''; ?>" /><br>
                <?php
                if (isset($error[2])) print "<p class='error'>" . $error[2] . "</p>"; ?>


                <input type="hidden" name="bandera" id="bandera" value="bandera">
                <?php
                if (isset($_GET['a'])) {
                    $a = $_GET['a'];
                    if ($a == "update") {
                        echo "<input type='text' name='idUpdate' id='idUpdate' value='$idUpdate'>";
                    }
                }
                ?>
                <input class="bnt-pr" type="submit" <?php
                                                    if (isset($_GET["a"])) {
                                                        $a = $_GET["a"];
                                                        if ($a == "update") {

                                                            echo "value='Actualizar'";
                                                        } else {
                                                            echo "value='Registrar'";
                                                        }
                                                    } else {
                                                        echo "value='Registrar'";
                                                    }
                                                    ?> />
            </form>
        </aside>
        <img src="./assets/form-user.jpg" alt="">
    </div>
</body>

</html>