<br>
<select name="search_results" id="search_results" size=4 onchange="showLyrics(this.value)">
<?php
    include "db-connect.php";

    $search_id = $_GET['resultsQuery'];
    $search_query = $_GET['lyricsQuery'];

    echo '<script>alert('.$search_id.')</script>';
    echo '<script>alert('.$search_query.')</script>';
    echo '<script>window.location.replace("../index.php")</script>';
    
    if ($search_id === "" || $search_query === "") {
        $query = "SELECT * FROM mydb.songs";
    }
    else {
        $query = "SELECT * FROM mydb.songs WHERE ".$search_id."='".$search_query."'";
    }
    $res = mysqli_query($connection, $query);
    while ($row = $res->fetch_assoc()) {
        echo '<option value="'.$row['id'].'">';
        echo $row['title']." by ".$row['artist'];
        echo '</option>';
    }
    $connection->close();
?>
</select>