<?php
    include "db-connect.php";

    $song_id = intval($_GET['songID']);

    $query = "SELECT * FROM mydb.songs WHERE id=".$song_id;
    $res = mysqli_query($connection, $query);
    echo "<div class='container'>";
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        echo '<iframe class="responsive-iframe" src="https://www.youtube.com/embed/'.$row["link"].'" frameborder="0"></iframe>';
        echo "</div><br>";
        echo "<h1>".$row["title"]."</h1>";
        echo "<h2>".$row["artist"]."</h2>";
        echo "<img src='song-covers/".$row["cover"]."' alt='".$row["cover-alt-text"]."' onload='setBGColor()'>";
        $connection->close();
    }
?>