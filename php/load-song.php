<?php
    include "db-connect.php";

    $song_id = intval($_GET['songID']);

    $query = "SELECT * FROM mydb.songs WHERE id=".$song_id;
    $res = mysqli_query($connection, $query);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        echo "<div class='container-fluid'>";
        echo "<div class='row justify-items-center'>";
        echo "<h1>".$row["title"]."</h1><br><br></div>";
        echo "<div class='row align-items-center'>";
        echo "<div class='col'>";
        echo "<li>Artist: ".$row["artist"]."</h2><br>";
        echo "<li>Album: ".$row["album"]."</h3><br>";
        echo "<li>Genre: ".$row["genre"]."</h3><br><br></div>";
        echo "<div class='col'>";
        echo "<img src='../song-covers/".$row["cover"]."' alt='".$row["cover-alt-text"]."' onload='setBGColor()'><br></div></div>";
        echo "<div class='row'>";
        echo '<iframe class="responsive-iframe" src="https://www.youtube.com/embed/'.$row["link"].'" frameborder="0"></iframe>';
        echo "</div>";   
        echo "</div>";   
    }
    $connection->close();
?>