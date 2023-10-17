<?php
    include "db-connect.php";
    
    $song_id = intval($_GET['songID']);

    $query = "SELECT * FROM mydb.songs WHERE id=".$song_id;
    $res = mysqli_query($connection, $query);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        echo '<object data="lyrics/'.$row["lyrics"].'" width="300" height="200">Not supported</object>';
        $connection->close();
    }
?>