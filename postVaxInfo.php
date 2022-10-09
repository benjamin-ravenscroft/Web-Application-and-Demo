<!DOCTYPE html>
<html>
    <body>
        <?php
            include 'connectdb.php';
            error_reporting(-1);
            //session_start();
            if (isset($_POST['lot']) && isset($_POST['vaxClinic']))   {
                $data = [
                    'vaxLot' => $_POST['lot'],
                    'clinicName' => $_POST['vaxClinic'],
                    'patientOhip' => $_POST['hidden-ohip'], // use the session variable
                    'vaxDate' => date('y-m-d'),
                    'vaxTime' => date('h:i:s')
                ];

                $sql = "INSERT INTO vaccination VALUES(:vaxLot, :clinicName, :patientOhip, :vaxDate, :vaxTime)";
                $stmt = $connection->prepare($sql);
                
                try {
                    $result = $stmt->execute($data);
                } catch (Exception $e) {
                    echo "Lot number entered is associated with a different vaccine clinic or patient has already received this vaccine. Try again.";
                }
            }
        ?>
    </body>
</html>