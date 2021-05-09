<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bookmark</title>
    <link rel="stylesheet" href="src/css/styleCrud.css">
    <link rel="shortcut icon" href="src/img/plus.png" type="image/x-icon">
</head>

<body>
    <div class="header">
    <a href="./crud.php">
        <img src="src/img/back.png" alt="Back button" class="back">
    </a>
    <h1>New bookmark</h1>
    </div>
    

    <form method="post">

        <label for="nMarcador">Name</label><br>
        <input type="text" id="nMarcador" name="nMarcador" maxlength="100" require><br><br>

        <label for="urlMarcador">URL</label><br>
        <input type="url" id="urlMarcador" name="urlMarcador" maxlength="300" placeholder="https://example.com" require><br><br>

        <input type="submit" value="Save" class="submit" name="newMarcador">

    </form>

    <?php

    if (isset($_POST['newMarcador'])) {
        if (strlen($_POST['nMarcador']) >= 1 && strlen($_POST['urlMarcador']) >= 1) {
            $nMarcador = $_POST['nMarcador'];
            $urlMarcador = $_POST['urlMarcador'];
            $query = 'INSERT INTO `marcadores` (`nombre`, `direccion_url`) VALUES ("' . $nMarcador . '", "' . $urlMarcador . '");';

            include_once('db.php');
            $r = $conexion->query($query);
            echo '<script language=\'javascript\'>alert(\'BOOKMARK ADDED SUCCESSFULLY\');window.location = "crud.php";</script>';
        } else {
            echo '<script language=\'javascript\'>alert(\'ADD FAILED BOOKMARK\');window.location = "crud.php";</script>';
        }
    }

    ?>

</body>

</html>