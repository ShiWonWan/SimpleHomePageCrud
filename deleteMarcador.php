
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
        include_once('db.php');
        
        $nok = mysqli_real_escape_string($conexion, (strip_tags($_GET["nok"], ENT_QUOTES)));
        $sql = mysqli_query($conexion, "DELETE FROM marcadores WHERE id_marcadores='$nok'");
        echo '<script>alert("SUCCESSFULLY REMOVED BOOKMARK");window.location = "crud.php";</script>';

        if (mysqli_num_rows($sql) == 0) {
            header("Location: crud.php");
        } else {
            $row = mysqli_fetch_assoc($sql);
        }


    ?>


</body>
</html>

