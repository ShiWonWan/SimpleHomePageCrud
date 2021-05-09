<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | BOOKMARKS</title>
    <link rel="stylesheet" href="src/css/styleCrud.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="src/img/crud.png" type="image/x-icon">
</head>

<body>
    <?php
    include_once("db.php");
    ?>
    <div class="header">
        <a href="./index.php">
            <img src="src/img/back.png" alt="Back button" class="back">
        </a>
        <h1>CRUD</h1>
    </div>
    
    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>URL</th>
            <th>Operations</th>
        </tr>
        <!--
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        -->
        <?php 
             $sql = 'SELECT * FROM marcadores';
             $result = $conexion->query($sql);


             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                     echo '<tr>';
                     echo '<td>'.$row["id_marcadores"].'</td>';
                     echo '<td>'.$row["nombre"].'</td>';
                     echo '<td>'.$row["direccion_url"].'</td>';
                     echo '<td><a href="editMarcador.php?nok='.$row["id_marcadores"].'" ><img src="src/img/edit.png" alt="Edit"></a><a href="deleteMarcador.php?nok='.$row["id_marcadores"].'"><img src="src/img/delete.png" alt="Edit"></a></td>';
                     echo '</tr>';
                 }
             }
        ?>
    </table>
    <br>
    <p><a href="newMarcador.php">New bookmark</a></p>
</body>

</html>