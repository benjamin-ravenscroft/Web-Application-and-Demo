<!DOCTYPE html>
<html>
    <head>
        <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/style.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
        </style>
        <link rel="stylesheet" href="css/styleNonMD.css">
        <?php include 'connectdb.php'?>

         <!-- Hidden form to use to submit patient OHIP and fName/lName -->
         <form id='hidden-form-vaxSites' method='GET' onsubmit="" style='visibility: hidden; display: none'>
            <input name='clinic' type="text" maxlength="10">
        </form>

        <script>
            function getVaxSite(x)   {
                // get the cells collection for table row with patient selected
                console.log(x.cells['clinicName'].innerHTML);
                
                form = document.getElementById('hidden-form-vaxSites');  // get the hidden form
                form.clinic.value = x.cells['clinicName'].innerHTML;
                form.requestSubmit();
            }
        </script>
    </head>
    <body class="body">
        <div class="card" style="padding: 10px">
            <div class="card-header-container">
                <div style="width: 100%; display: flex; justify-content: center">
                    <h1>Vaccination Sites</h1>
                </div>
            </div>
            <div class="card-body-container" style="width: 100%; display: flex; justify-content: center; padding-top: 0;">
                <div class="mdc-data-table" style="margin-top: 50px">
                    <div class="mdc-data-table__table-container">
                        <table class="mdc-data-table__table" aria-label="Dessert calories">
                            <thead>
                                <tr class="mdc-data-table__header-row">
                                <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Clinic</th>
                                <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Street</th>
                                <th class="mdc-data-table__header-cell" role="columnheader" scope="col">City</th>
                                <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Province</th>
                                <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Postal Code</th>
                                </tr>
                            </thead>
                            <tbody class="mdc-data-table__content">
                            <?php
                                $result = $connection->query("SELECT * FROM vaxclinic");

                                while ($row = $result->fetch()) {
                                    echo "<tr class='mdc-data-table__row' onclick='getVaxSite(this)'>
                                        <td class='mdc-data-table__cell' name='clinicName'>".$row["vaxClinicName"]."</td>
                                        <td class='mdc-data-table__cell'>".$row["clinicStreet"]."</td>
                                        <td class='mdc-data-table__cell'>".$row["clinicCity"]."</td>
                                        <td class='mdc-data-table__cell'>".$row["clinicProvince"]."</td>
                                        <td class='mdc-data-table__cell'>".$row["clinicPostCode"]."</td>
                                        </th>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>