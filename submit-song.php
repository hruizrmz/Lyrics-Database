<!DOCTYPE html>
<html lang="en">
<head>
    <meta name "viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <title>Upload a Song</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="scripts.js"></script>
    <style>
        body {
            display: grid;
            height: 100vh;
        }
        .container{
            display: flex;
            padding-top: 50px;
            padding-bottom: 50px;
            justify-content: center;
        }
        input {
            width: 50vh;
        }
        .row {
            align-items: center;
        }
    </style>
</head>
<body style="background:url(microphone.jpg); background-size:cover;">
    <header class="fixed-top"><h2>Please fill the following information!</h2></header>
    <div class="container">
        <div class="row" style="background-color: rgba(0,0,0,.5); color: #fff;">
            <form action="php/upload.php" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Song Title: </label>
                        <div class="col-sm-4"><input type="text" name="title" id="title" required minlength="1" maxlength="80" placeholder="What is your song called?"></div>
                </div>
                <div class="row mb-3">
                    <label for="artist" class="col-sm-2 col-form-label">Artist: </label>
                        <div class="col-sm-4"><input type="text" name="artist" id="artist" required minlength="1" maxlength="80" placeholder="Who made it?"></div>
                </div>
                <div class="row mb-3">
                    <label for="album" class="col-sm-2 col-form-label">Album: </label>
                        <div class="col-sm-4"><input type="text" name="album" id="album" required minlength="1" maxlength="80" placeholder="Was it in an album or single?"> </div>
                </div>
                <div class="row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Album Cover: </label>
                        <div class="col-sm-4"><input type="file" name="cover" id="cover" required accept=".jpg, .jpeg, .png"></div>
                </div>
                <div class="row mb-3">
                    <label for="alt_text" class="col-sm-2 col-form-label">Alt-Text: </label>
                        <div class="col-sm-4"><input type="text" name="alt_text" id="alt_text" minlength="1" maxlength="80" placeholder="What is in your image?"></div>
                </div>
                <div class="row mb-3">
                    <label for="genre" class="col-sm-2 col-form-label">Genre: </label>
                        <div class="col-sm-1">
                            <select name="genre" id="genre" required onchange="genreSelectCheck(this);">
                                <?php
                                    include "php/db-connect.php";
                                    $query = "SELECT * FROM mydb.genres";
                                    $res = mysqli_query($connection, $query);
                                    echo '<option value="-1"></option>';
                                    while ($row = $res->fetch_assoc()) {
                                        echo '<option value="'.$row['name'].'">';
                                        echo $row['name'];
                                        echo '</option>';
                                    }
                                    $connection->close();
                                ?>
                                <option value="0">Other Genre</option>
                            </select>
                        </div>
                </div>
                <div id="otherGenreDiv" style="display:none;">
                    <div class="row mb-3">
                        <label for="other_genre" class="col-sm-2 col-form-label">Other Genre: </label>
                            <div class="col-sm-4"><input type="text" name="other_genre" id="other_genre" minlength="1" maxlength="40" placeholder="What genre will you add?"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="link" class="col-sm-2 col-form-label">YouTube Link: </label>
                        <div class="col-sm-4"><input type="url" name="link" id="link" required placeholder="Which video do you want to play?"></div>
                </div>
                <div class="row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Lyrics: </label>
                        <div class="col-sm-4"><input type="file" name="lyrics" id="lyrics" required accept=".txt"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 offset-sm-1"><button type="submit" name="submit_song" class="btn btn-primary">Add New Song</button></div>
                    <div class="col-sm-4 offset-sm-1"><button onclick="window.location.href='index.php'" class="btn btn-secondary">Return to List</button></div>
                </div>
            </form>
        </div>
    </div>
    <footer class="fixed-bottom">
        <p><a href="https://www.istockphoto.com/photo/microphone-against-blur-on-beverage-in-pub-and-restaurant-background-gm1141693171-305966842">Photo uploaded by Vershinin to iStock</a></p>
    </footer>
        
</body>
</html>