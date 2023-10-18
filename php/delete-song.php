<?php
    include "db-connect.php";

    if ($song_id = intval($_GET['songID'])) {
        $query = "SELECT * FROM mydb.songs WHERE id=".$song_id;
        $res = mysqli_query($connection, $query);
        echo "<div class='container'>";
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink("../song-covers/".$imgName=$row["cover"]);
            unlink("../lyrics/".$imgName=$row["lyrics"]);
            $query = "DELETE FROM mydb.songs WHERE id=".$song_id;
            mysqli_query($connection, $query);
        }
        else {
            echo '<script>alert("We could not delete the song you selected.")</script>';
        }
    }
    else {
        echo '<script>alert("Please select a song to delete first!")</script>';
    }

    echo '<script>window.location.replace("../index.php")</script>';
    $connection->close();
?>