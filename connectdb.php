<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=coviddb', "root", "");
} catch (PDOException $e) {
    echo "Error!: ". $e->getMessage(). "<br/>";
    die();
}
?>