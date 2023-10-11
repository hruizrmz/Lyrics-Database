<!DOCTYPE html>
<html lang="es">
<head>
    <meta name "viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Upload Song Lyrics</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="scripts.js"></script>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="title">Song Title: </label>
            <input type="text" name="title" id="title" required pattern="{1,40}">
        <br>
        <label for="artist">Artist: </label>
            <input type="text" name="artist" id="artist" required pattern="{1,40}">
        <br>
        <label for="album">Album: </label>
            <input type="text" name="album" id="album" required pattern="{1,40}"> 
        <br><br>
        <label for="cover">Album Cover: </label>
            <input type="file" name="cover" id="cover" accept=".jpg, .jpeg, .png, .hfif" required>
        <br>
        <label for="alt_text">Alt-Text: </label>
            <input type="text" name="alt_text" id="alt_text" required pattern="{1,40}">
        <br><br>
        <label for="genre">Genre: </label>
            <select name="genre" id="genre" onchange="genreSelectCheck(this);">
                <?php
                    include "db-connect.php";
                    $query = "SELECT * FROM mydb.genres";
                    $res = mysqli_query($connection, $query);
                    echo '<option value="-1"></option>';
                    while ($row = $res->fetch_assoc()) {
                        echo '<option value="'.$row['name'].'">';
                        echo $row['name'];
                        echo '</option>';
                    }
                ?>
                <option value="0">Other Genre</option>
            </select>
            <div id="otherGenreDiv" style="display:none;">
                <label for="other_genre">Which one?: </label>
                    <input type="text" name="other_genre" id="other_genre" pattern="{1,40}">
            </div>
        <br><br>
        <label for="link">YouTube Link: </label>
            <input type="url" name="link" id="link" required>
        <br><br>
        <button type="submit" name="submit">Create New Song Entry</button>
    </form>
</body>
</html>