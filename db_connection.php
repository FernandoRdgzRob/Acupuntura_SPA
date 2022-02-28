<?php

    $conn = new mysqli('localhost', 'usuario7', 'W6ywwfMyuuvhruSm', 'usuario7');
    $conn -> set_charset("utf8");   

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }

?>