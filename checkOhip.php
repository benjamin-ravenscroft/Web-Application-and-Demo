<?php
    error_reporting(0);
    session_start();
    error_reporting(-1);
    include "connectdb.php";

    $ohip = 0000000000;
    // set a session variable for the ohip number that can be used across pages
    if (isset($_POST['ohip']))  {
        $_SESSION['ohip'] = $_POST['ohip'];
    }

    $stmt = $connection->prepare("select * from patient where ohipPatient = :ohip");
    $stmt->bindParam(':ohip', $_POST['ohip']);
    $stmt->execute();

    $numRows = $stmt->rowCount();
    
    if (($numRows == 0) && (!isset($_POST['hidden-ohip']))) {
        include "getPatientInfo.php";
    } else {
        include "addVaxInfo.php";
    }

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))   {
        //echo "<p>".$row['ohipPatient']."</p>";
    }
?>