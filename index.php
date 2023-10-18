<!DOCTYPE html>
<html lang="es">
<head>
    <meta name "viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Lyrics Viewer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="scripts.js"></script>
    <!-- color picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
</head>
<body>
    <div class="song-search">
        <!-- search id -->
        <label for="results_query">Search By...</label><br>
            <select name="results_query" id="results_query">
                <option value=""></option>
                <option value="title">Song Title</option>;
                <option value="artist">Artist</option>;
                <option value="genre">Genre</option>;
            </select>
        <input type="search" name="lyrics_query" id="lyrics_query" minlength="1" maxlength="80">
        <button onclick="showResults(document.getElementById('results_query').value, document.getElementById('lyrics_query').value)">Search</button>
        <br>
        <!-- results box -->
        <div class="song-results" id="song-results">
        <br>
        <select name="search_results" id="search_results" size=4 onchange="showLyrics(this.value)">
        <?php
            include "php/db-connect.php";            
            $query = "SELECT * FROM mydb.songs";
            $res = mysqli_query($connection, $query);
            while ($row = $res->fetch_assoc()) {
                echo '<option value="'.$row['id'].'">';
                echo $row['title']." by ".$row['artist'];
                echo '</option>';
            }
            $connection->close();
        ?>
        </select>
        </div>
        <!-- buttons -->
        <br>
        <script>
            function clicked(e)
            {
                if(confirm('Are you sure?')) {
                    window.location.href="php/delete-song.php?songID="+document.getElementById('search_results').value;
                }
                else {
                    return false;
                }
            }
        </script>
        <button name="delete_song" onclick="clicked(event)">Delete this song</button>
        <button onclick="window.location.href='submit-song.php'">Add another song</button>
    </div>
    <div class="song-lyrics" id="song-lyrics">
    </div>
    <div class="song-info" id="song-info">
    <br>
    </div>
</body>
</html>