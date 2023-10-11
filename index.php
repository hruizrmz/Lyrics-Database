<!DOCTYPE html>
<html lang="es">
<head>
    <meta name "viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Lyrics Viewer</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>  
    <?php
        include "db-connect.php";
        $query = "SELECT * FROM mydb.songs WHERE title='Desvelado'";
        $res = mysqli_query($connection, $query);
        echo "<div class='container'>";
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            echo '<iframe class="responsive-iframe" src="https://www.youtube.com/embed/qyMp1ADlRD8" frameborder="0"></iframe>';
            echo "</div>";
            echo "<h1>".$row["title"]."</h1>";
            echo "<h2>".$row["artist"]."</h2>";
            echo "<img src='song-covers/".$row["cover"]."' alt='".$row["cover-alt-text"]."' >";
            $connection->close();
        }
    ?>

    <section>
        <p>
            Será fe que yo encontré
            <br>Una voz de ternura
            <br>Que me llena de placer
            <br>Cuando la oigo hablar
            <br>
            <br>Con ella me enamoré
            <br>Que nunca la conocí
            <br>Sueño en su querer
            <br>Y en sus brazos quiero dormir
            <br>
            <br>Escucho cada día la radio
            <br>Seguro que la vuelvo a oír
            <br>Por el cielo busco mi estrella
            <br>A la luna quiero subir
            <br>
            <br>Voy desvelado
            <br>Por estas calles esperando encontrar
            <br>A esa voz de ángel que quiero amar
            <br>¿Dónde andará?
            <br>Voy desvelado
            <br>Y mi deseo no me deja descansar
            <br>Porque despierto y no me pongo a llorar
            <br>Yo seguiré, desvelado y sin amor
            <br>
            <br>&hearts;
        </p>
    </section>
</body>
</html>