<!DOCTYPE html>
<html>
    <head>
        <?php include 'connectdb.php'?>
        <link rel="stylesheet" href="css/styleNonMD.css">
    </head>
    <body>
        <div class="card">
            <div class="card-container">
                <div class="card-header-container">
                    <div>
                        <h2>Add Patient Vaccination Information</h2>
                    </div>
                    <div style="width: 100%; display: flex; align-items: center; justify-content: center">
                        <?php
                            echo "<p>OHIP: ".$_POST['ohip']."</p>";
                        ?>
                    </div>
                </div>
                <div class="card-body-container" style="padding-top: 0px; margin-bottom: 10px">
                    <!--Create empty form to be used with the vax clinic buttons to post selection-->
                    <form id='vaxClinicForm' method='post'>
                        <div style="width: 100%; display: flex; align-items: center; justify-content: left space-evenly">
                            <input type="hidden" id="hidden-ohip" name="hidden-ohip" value=<?php echo $_POST['ohip']?>>
                            <h3>Select a clinic:</h3>
                            <?php

                                $result = $connection->query("SELECT * FROM vaxclinic");

                                echo "<ul>";
                                while ($row = $result->fetch()) {
                                    echo '<input type=\'radio\' value=\''.$row['vaxClinicName'].'\' id=\''.$row['vaxClinicName'].'\' name=\'vaxClinic\'>'.$row['vaxClinicName'].'</button>';
                                    echo "<br>";
                                }
                                echo "</ul>";
                            ?>
                        </div>
                        <h3>Select a lot number:</h3>
                        Lot number: <input class="textfield" type='text' maxlength=6 name='lot'>
                        <input class="submit" style="margin-left: 10px" type='submit'>
                    </form>
                    <div style="width: 100%; display: flex; align-items: center; justify-content: center; margin-top: 20px">
                        <a class="submit" style="text-decoration: none; background-color: #b80202" href="covid.php">Back to patients</a>
                    </div>
                </div>

                <?php
                    include 'postVaxInfo.php';
                ?>
            </div>
        </div>
    </body>
</html>