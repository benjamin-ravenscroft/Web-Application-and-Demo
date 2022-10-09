<!DOCTYPE html>
<html>
    <head>
        <!-- Load jQuery for google CDN-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <?php
            error_reporting(0);
            session_start();
            error_reporting(-1);
        ?>

        <!-- Hidden form to use to submit patient OHIP and fName/lName -->
        <form id='hidden-form' method='GET' action='covid.php' onsubmit="" style='visibility: hidden; display: none'>
            <input name='ohip' type="text" maxlength="10">
        </form>

        <script>
            function getPatientVax(x)   {
                // get the cells collection for table row with patient selected
                console.log(x.cells['ohipPatient'].innerHTML);
                
                form = document.getElementById('hidden-form');  // get the hidden form
                form.ohip.value = x.cells['ohipPatient'].innerHTML;
                form.requestSubmit();
            }
        </script>

        <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/style.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
        </style>

        <style>
            .a-container {
                margin-top: 0px;
                top: 0;
                z-index: 2;
            }

            .b-container {
                padding-top: 2em;
                margin-top: 60px;
            }
        </style>

        <link rel="stylesheet" href="css/styleNonMD.css">
    </head>

    <body class='body'>
        <div class='card' style="padding: 20px">
            <div style="margin: auto; width: 100%; display: flex; align-items: center; justify-content: center">
                <h1>Patients</h1>
            </div>
            
            <div style="width: 100%; display: flex; align-items: center; justify-content: space-around">
                <?php
                    if (isset($_GET['ohip'])) {
                        include 'patientVaccinations.php';
                    } else {
                        include 'patientInfoAddCard.php';
                    }
                ?>
                
                <div class="card" style="margin-left: 40px">
                    <div class="card-container">
                        <div class="card-header-container">
                            <div style="width: 100%; display: flex; align-items: center; justify-content: center"> 
                                <h2>Patient Information</h2>
                            </div>
                        </div>
                        <div class="card-body-container" style="padding-top: 0px; margin-top: -2em; margin-bottom: 10px">
                            <div class="mdc-data-table" style="margin-top: 50px">
                                <div class="mdc-data-table__table-container">
                                    <table class="mdc-data-table__table" aria-label="Dessert calories">
                                        <thead>
                                            <tr class="mdc-data-table__header-row">
                                            <th class="mdc-data-table__header-cell" role="columnheader" scope="col">OHIP Number</th>
                                            <th class="mdc-data-table__header-cell" role="columnheader" scope="col">First Name</th>
                                            <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Last Name</th>
                                            <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Date of Birth</th>
                                            <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Spouse's OHIP</th>
                                            </tr>
                                        </thead>
                                        <tbody class="mdc-data-table__content">
                                        <?php
                                            include 'connectdb.php';

                                            // run a query on the patients database
                                            $result = $connection->query("SELECT patient.ohipPatient, patient.firstNamePatient, patient.lastNamePatient, patient.dob, spouse.ohipSpouse FROM patient
                                                                        LEFT JOIN
                                                                        spouse ON patient.ohipPatient = spouse.ohipPartner");

                                            while ($row = $result->fetch()) {
                                                echo "<tr class='mdc-data-table__row' onclick='getPatientVax(this)'><td class='mdc-data-table__cell' id='ohipPatient' name='ohipPatient'>".$row["ohipPatient"]."</td><td class='mdc-data-table__cell' id='firstNamePatient' name='firstNamePatient'>".
                                                    $row["firstNamePatient"]."</td><td class='mdc-data-table__cell' id='lastNamePatient' name='lastNamePatient'>".$row["lastNamePatient"]."</td><td class='mdc-data-table__cell' id='dob' name='dob'>".
                                                    $row["dob"]."</td><td class='mdc-data-table__cell' id='ohipSpouse' name='ohipSpouse'>".$row["ohipSpouse"]."</td></th>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </body>   
</html>