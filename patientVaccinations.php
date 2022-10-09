<!DOCTYPE html>
<html>
    <head>
        <?php
            error_reporting(0);
            session_start();
            error_reporting(-1);
            include 'connectdb.php';
        ?>

        <link rel="stylesheet" href="css/styleNonMD.css">
    </head>
    <body>
        <div class="card">
            <div class="card-container" style="padding-bottom: 15px">
                <div class="card-header-container" style="width: 100%; display: flex; justify-content: center">
                    <h1>Patient Vaccinations</h1>
                </div>
                <div class="card-body-container">
                    <?php
                        $stmt = $connection->prepare("SELECT * FROM patient WHERE ohipPatient = :ohip");
                        // check if post data was passed for ohip, if not use session data
                        if (isset($_GET['ohip']))  {
                            $stmt->bindParam(':ohip', $_GET['ohip']);
                        } else {
                            $stmt->bindParam(':ohip', $_SESSION['ohip']);
                        }
                        $stmt->execute();

                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div style="width: 100%; justify-content: center;">
                        <?php
                            $stmt = $connection->prepare("SELECT * FROM vaccination WHERE patientOhip = :ohip");
                            if (isset($_GET['ohip']))  {
                                $stmt->bindParam(':ohip', $_GET['ohip']);
                            } else {
                                $stmt->bindParam(':ohip', $_SESSION['ohip']);
                            }
                            $stmt->execute();

                            echo '<table>';
                            echo '<tr><th>Vaccine Lot</th><th>Clinic</th><th>Date</th><th>Time</th></tr>';
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))   {
                                echo '<tr><th>'.$row['vaxLot'].'</th><th>'.$row['clinicName'].'</th><th>'.$row['vaxDate'].'</th><th>'.$row['vaxTime'].'</th></tr>';
                            }
                            echo '</table>';
                        ?>
                    </div>
                    <div style="width: 100%; display: flex; justify-content: center; margin-top: 2em">
                        <a class="submit" style="text-decoration: none" href="covid.php">Back to patients</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>