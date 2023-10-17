<?php
    include "db-connect.php";
    if (isset($_POST['submit_song'])) {
        echo '<script type="text/javascript"></script>';

        $song_title = $_POST["title"];
        $song_artist = $_POST["artist"];
        $song_album = $_POST["album"];
        $cover_alt_text = $_POST["alt_text"];
        $song_link = $_POST["link"];

        $cover_name = $_FILES['cover']['name'];
        $cover_size = $_FILES['cover']['size'];
        $tmp_name = $_FILES['cover']['tmp_name'];
        $error = $_FILES['cover']['error'];
        
        if ($_POST["genre"] == 0) {
            $song_genre = $_POST["other_genre"];
            $sql = "INSERT INTO genres VALUES (NULL,'$song_genre')";
            mysqli_query($connection, $sql);
            if (mysqli_errno($connection) == 1062) {
                echo '<script>alert("Sorry, that genre already exists!")</script>';
                echo '<script>window.location.replace("submit-song.php")</script>';
                exit;
            }
        }
        else {
            $song_genre = $_POST["genre"];
        }

        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_id, $match);
        $youtube_id = $match[1];

        if ($error === 0) {
            if ($cover_size > 5000000) {
                echo '<script>alert("Sorry, your album cover file is too large.")</script>';
            } else {
                $cover_ex = pathinfo($cover_name, PATHINFO_EXTENSION);
                $cover_ex_lc = strtolower($cover_ex);
                
                $allowed_exs = array("jpg", "jpeg", "png", "jfif");

                if (in_array($cover_ex_lc, $allowed_exs)) {
                    $new_cover_name = uniqid("IMG_", true).'.'.$cover_ex_lc;
                    
                    $sql = "INSERT INTO songs VALUES (NULL,'$song_title','$song_artist','$song_album','$new_cover_name','$cover_alt_text','$song_genre','$youtube_id')";
                    if (!mysqli_query($connection, $sql)) {
                        if (mysqli_errno($connection) == 1062) {
                            echo '<script>alert("Sorry, that link already exists!")</script>';
                        }
                        else {
                            echo '<script>alert("Sorry, we could not upload your song.")</script>';
                        }
                    }
                    else {
                        echo '<script>alert("Song uploaded!")</script>';
                        $cover_upload_path = "song-covers/".$new_cover_name;
                        move_uploaded_file($tmp_name, $cover_upload_path);
                        echo '<script>window.location.replace("index.php")</script>';
                        exit;
                    }
                } else {
                    echo '<script>alert("Only these files are supported for album covers: jpg, jpeg, png, jfif.")</script>';
                }
            }
        } else {
            echo '<script>alert("Unknown error occurred while uploading album cover.")</script>';
        }
    } else {
        echo '<script>alert("Submit request could not be completed...")</script>';
    }
    echo '<script>window.location.replace("submit-song.php")</script>';
    $connection->close();
?>