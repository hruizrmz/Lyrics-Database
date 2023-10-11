<?php
    $connection = mysqli_connect("localhost", "sqluser", "password", "mydb");
    if(!$connection)
        die("Could not connect to the database.".mysqli_connect_error());
?>
<br>