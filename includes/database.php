<?php
    $user = 'root'; 
    $pass = '';

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=grupo-01;charset=utf8', $user, $pass);
    } catch (PDOException $e) {
        // attempt to retry the connection after some timeout for example
        echo $e;
    }
?>