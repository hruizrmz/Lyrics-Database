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
        $tmp_cover_name = $_FILES['cover']['tmp_name'];
        $error_cover = $_FILES['cover']['error'];

        $lyrics_name = $_FILES['lyrics']['name'];
        $lyrics_size = $_FILES['lyrics']['size'];
        $tmp_lyrics_name = $_FILES['lyrics']['tmp_name'];
        $error_lyrics = $_FILES['lyrics']['error'];
        
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

        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $song_link, $match);
        if ($match) {
            $youtube_id = $match[1];
        }
        else {
            echo '<script>alert("Sorry, please use a different youtube link!")</script>';
            echo '<script>window.location.replace("submit-song.php")</script>';
            exit;
        }
        
        if ($error_cover === 0) {
            if ($cover_size > 5000000) {
                echo '<script>alert("Sorry, your album cover file is too large.")</script>';
            }
            else {
                $cover_ex = pathinfo($cover_name, PATHINFO_EXTENSION);
                $cover_ex_lc = strtolower($cover_ex);
                $allowed_cover_exs = array("jpg", "jpeg", "png");
                if (in_array($cover_ex_lc, $allowed_cover_exs)) {
                    $new_cover_name = uniqid("IMG_", true).'.'.$cover_ex_lc;
                    if ($error_lyrics === 0) {
                        if ($lyrics_size > 5000000) {
                            echo '<script>alert("Sorry, your lyrics file is too large.")</script>';
                        }
                        else {
                            $lyrics_ex = pathinfo($lyrics_name, PATHINFO_EXTENSION);
                            $lyrics_ex_lc = strtolower($lyrics_ex);
                            $allowed_lyrics_exs = array("txt");
                            if (in_array($lyrics_ex_lc, $allowed_lyrics_exs)) {
                                $new_lyrics_name = uniqid("LYRICS_",true).".txt";
                                $sql = "INSERT INTO songs VALUES (NULL,'$song_title','$song_artist','$song_album','$new_cover_name','$cover_alt_text','$song_genre','$youtube_id','$new_lyrics_name')";
                                if (!mysqli_query($connection, $sql)) {
                                    if (mysqli_errno($connection) == 1062) {
                                        echo '<script>alert("Sorry, that link already exists!")</script>';
                                    }
                                    else if (mysqli_errno($connection) == 1064) {
                                        echo '<script>alert("Sorry, please check your syntax. Apostrophes are not allowed!")</script>';
                                    }
                                    else {
                                        echo '<script>alert("Sorry, we could not upload your song.")</script>';
                                    }
                                }
                                else {
                                    echo '<script>alert("Song uploaded!")</script>';
                                    $cover_upload_path = "song-covers/".$new_cover_name;
                                    move_uploaded_file($tmp_cover_name, $cover_upload_path);
                                    $lyrics_upload_path = "lyrics/".$new_lyrics_name;
                                    move_uploaded_file($tmp_lyrics_name, $lyrics_upload_path);
                                    echo '<script>window.location.replace("index.php")</script>';
                                    exit;
                                }
                            }
                            else {
                                echo '<script>alert("Only txt files are supported for lyrics.")</script>';
                            }
                        }
                    }
                    else {
                        echo '<script>alert("There was a problem with your lyrics file.")</script>';
                    }
                }
                else {
                    echo '<script>alert("Only these files are supported for album covers: jpg, jpeg, png, jfif.")</script>';
                }
            }
        }
        else {
            echo '<script>alert("There was a problem with your album cover file.")</script>';
        }
    }

    echo '<script>window.location.replace("submit-song.php")</script>';
    $connection->close();
?>