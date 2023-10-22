<!DOCTYPE html>
<html lang="en">
<head>
    <meta name "viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <title>Lyrics Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="scripts.js"></script>
    <!-- color picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
</head>
<body class="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="song-search">
                    <!-- search by -->
                    <h2><label for="results_query">Search By... </label></h2>
                        <select name="results_query" id="results_query">
                            <option value=""></option>
                            <option value="title">Song Title</option>;
                            <option value="artist">Artist</option>;
                            <option value="genre">Genre</option>;
                        </select>
                    <br>
                    <input type="search" name="lyrics_query" id="lyrics_query" minlength="1" maxlength="80">
                    <button onclick="showResults(document.getElementById('results_query').value, document.getElementById('lyrics_query').value)">Search</button>
                    <br><br>
                    <hr class="solid">
                    <br>
                    <!-- results box -->
                    <div class="song-results" id="song-results">
                    <select class="song-select" name="search_results" id="search_results" size=4 width="100" onchange="showLyrics(this.value)">
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
                    <hr class="solid">
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
                    <br><br>
                    <button onclick="window.location.href='submit-song.php'">Add another song</button>
                </div>
            </div>
            <div class="col-md-5">
                <div class="song-lyrics" id="song-lyrics">
                </div>
            </div>
            <div class="col-md-4">
                <div class="song-info" id="song-info">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>