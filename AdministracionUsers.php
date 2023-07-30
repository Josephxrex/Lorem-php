<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion Usuarios</title>
    <link rel="stylesheet" href="./Styles/adminUser.css">
    <link rel="stylesheet" href="./Styles/dashboardPR.css">
    <?php
    include "lib/conn.php";
    $sql = "SELECT * FROM usuarios";
    $r = mysqli_query($conn, $sql);



    if (isset($_GET["a"])) {
        $a = $_GET["a"];
        $idDelete = $_GET['id'];
        if ($a == "delete") {
            $sql = "DELETE FROM usuarios WHERE idUser = $idDelete";
            $r = mysqli_query($conn, $sql);
            echo "<script>alert('Se ha eliminado el usuario')</script>";
            header("Location: AdministracionUser.php");
        }
    }
    ?>
</head>

<body>
    <div class="container-userAdmin">
        <div class="title-content">
            <h1 class="title-pr">Administración de
                <br>Usuarios

            </h1>
            <p class="somepr-user">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.sit amet consectetur adipisicing elit.sit amet consectetur adipisicing elit.
            </p>
        </div>

        <div class="All-targets">
            <div class="target-dash">
                <div class="dash-statesman">
                    <p class="statesman-title">Usuarios</p>
                    <p class="statesman-subtitle">150 Usuarios</p>

                </div>
                <div class="detail-graphics">
                    <img src="./assets/arrow-growth.svg" alt="" srcset="">
                    <p>2.15 %</p>
                    <p>Último mes</p>
                </div>
            </div>
            <div class="target-dash">
                <div class="dash-statesman">
                    <p class="statesman-title">Usuarios</p>
                    <p class="statesman-subtitle">150 Usuarios</p>

                </div>
                <div class="detail-graphics">
                    <img src="./assets/arrow-growth.svg" alt="" srcset="">
                    <p>2.15 %</p>
                    <p>Último mes</p>
                </div>
            </div>
            <div class="target-dash">
                <div class="dash-statesman">
                    <p class="statesman-title">Usuarios</p>
                    <p class="statesman-subtitle">150 Usuarios</p>

                </div>
                <div class="detail-graphics">
                    <img src="./assets/arrow-growth.svg" alt="" srcset="">
                    <p>2.15 %</p>
                    <p>Último mes</p>
                </div>
            </div>

        </div>
    </div>
    <div class="container-table">
        <div class="table-users">
            <div class="table-tr">
                <div>Id</div>
                <div>Nombre</div>
                <div>Apellidos</div>
                <div>Ocupación</div>
                <div>Usuario</div>
                <div>Contraseña</div>
                <div>Acciones</div>
            </div>

            <?php
            while ($data = mysqli_fetch_assoc($r)) {
                echo "<div class='table-td'>";
                echo "<div>" . $data['idUser'] . "</div>";
                echo "<div class='target-user'>
                <img src='./assets/Avatars.svg' alt='Imagen Usuario'>
                " . $data['nombre'] . "</div>";
                echo "<div>" . $data['apellidos'] . "</div>";
                echo "<div>" . $data['puesto'] . "</div>";
                echo "<div>" . $data['usuario'] . "</div>";
                echo "<div>" . $data['password1'] . "</div>";
                echo "<div class='target-accion'>";
                echo "<a href='RegisterUser.php?a=update&id=" . $data['idUser'] . "'><img src='./assets/pen.svg' alt='' srcset=''></a>";
                echo "<a href='AdministracionUsers.php?a=delete&id=" . $data['idUser'] . "'><img src='./assets/trash.svg' alt='' srcset=''></a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

</body>

</html>