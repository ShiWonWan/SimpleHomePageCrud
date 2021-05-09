<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="src/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;900&display=swap" rel="stylesheet">
</head>

<body onload="startTime()">

<?php
    include_once('db.php');
?>
    <div class="container">

        <div id="clock"></div>
        <h1 id="title"></h1>

        <form method="get" action="http://www.google.com/search">
            <input type="text" name="q" size="25" maxlength="255" placeholder="Google site search"
                onfocus="if(this.value==this.defaultValue)this.value='';"
                onblur="if(this.value=='')this.value=this.defaultValue; " />
            <input type="hidden" name="sitesearch" value="">
        </form>



        <ul>
            <?php
                $sql = 'SELECT * FROM marcadores';
                $result = $conexion->query($sql);


                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<li><a href="'.$row["direccion_url"].'">'.$row["nombre"].'</a></li>';
                    }
                }
        
            ?>
        </ul>
    <p><a href="crud.php">CRUD</a></p>

    </div>


</body>

</html>

<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('clock').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 1000);
        var title = document.getElementById('title');
        if (h < 12 && h >= 5) {
            title.textContent = "Hi, good morning";
        }
        else if (h < 20 && h >= 5) {
            title.textContent = "Hi, good afternoon";
        }
        else {
            title.textContent = "Hi, good night";
        }
    }
    function checkTime(i) {
        if (i < 10) { i = "0" + i };
        return i;
    }
</script>