<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bookmark</title>
    <link rel="stylesheet" href="src/css/styleCrud.css">
    <link rel="shortcut icon" href="src/img/plus.png" type="image/x-icon">
</head>

<body>
    <div class="header">
    <a href="./crud.php">
        <img src="src/img/back.png" alt="Back button" class="back">
    </a>

    <?php
        include_once('db.php');
        
        $nok = mysqli_real_escape_string($conexion, (strip_tags($_GET["nok"], ENT_QUOTES)));
        $sql = mysqli_query($conexion, "SELECT * FROM marcadores WHERE id_marcadores='$nok'");

        if (mysqli_num_rows($sql) == 0) {
            header("Location: crud.php");
        } else {
            $row = mysqli_fetch_assoc($sql);
        }

    ?>

    <h1>Edit Bookmark | <?php echo $row['nombre'] ?></h1>
    </div>
    

    <form method="post">

        <label for="nMarcador">Name</label><br>
        <input type="text" id="nMarcador" name="nMarcador" maxlength="100" require value='<?php echo $row["nombre"] ?>'><br><br>

        <label for="urlMarcador">URL</label><br>
        <input type="url" id="urlMarcador" name="urlMarcador" maxlength="300" placeholder="https://example.com" require value='<?php echo $row["direccion_url"] ?>'><br><br>

        <input name="id" type="hidden" value="<?php echo $nok ?>">
        <input type="submit" value="Save" class="submit" name="newMarcador">

    </form>

    <?php

    if (isset($_POST['newMarcador'])) {
        if (strlen($_POST['nMarcador']) >= 1 && strlen($_POST['urlMarcador']) >= 1) {
            $nMarcador = $_POST['nMarcador'];
            $urlMarcador = $_POST['urlMarcador'];
            $id = $_POST['id'];

            $query = 'UPDATE marcadores SET nombre = "'.$nMarcador.'", direccion_url = "'.$urlMarcador.'" WHERE id_marcadores = '.$id.'';

            include_once('db.php');
            $r = $conexion->query($query);
            echo '<script language=\'javascript\'>alert(\'SUCCESSFUL EDITED BOOKMARK\');window.location = "crud.php";</script>';
        } else {
            echo '<script language=\'javascript\'>alert(\'EDIT FAILED BOOKMARK\');window.location = "crud.php";</script>';
        }
    }

    ?>

</body>

</html>