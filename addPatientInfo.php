<?php
    include "connectdb.php";

    if (isset($_POST['ohip']) && isset($_POST['firstName']) &&
        isset($_POST['lastName']) && isset($_POST['dob']))  {
        
        $data = [
            'ohipPatient' => $_POST['ohip'],
            'firstNamePatient' => $_POST['firstName'],
            'lastNamePatient' => $_POST['lastName'],
            'dob' => $_POST['dob']
        ];

        $sql = "INSERT INTO patient VALUES(:ohipPatient, :firstNamePatient, :lastNamePatient, :dob)";
        $stmt = $connection->prepare($sql);

        $result = $stmt->execute($data);

        if ($result == true)    {
            include "addVaxInfo.php";
        }

    }
?>