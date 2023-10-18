<?php
    include "db-connect.php";
    
    $song_id = intval($_GET['songID']);

    $query = "SELECT * FROM mydb.songs WHERE id=".$song_id;
    $res = mysqli_query($connection, $query);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        $fh = fopen("../lyrics/".$row['lyrics'], 'r');
        $pageText = fread($fh, 25000);
        echo "<p>";
        echo nl2br($pageText);
        echo "</p>";
    }
    $connection->close();
?>