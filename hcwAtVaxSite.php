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
    </head>
    <body class="body">
        <div style="width: 100%; display: flex; justify-content: center; margin-top: 4em">
            <div class="card" style="width: 50%">
                <div class="card-header-container" style="margin-bottom: 0;">
                    <div style="width: 100%; display: flex; justify-content: center">
                        <h1>Healthcare Workers</h1>
                    </div>
                    <div style="width: 100%; display: flex; justify-content: center">
                        <?php
                            echo "<h4>".$_GET['clinic']."</h4>";
                        ?>
                    </div>
                </div>
                <div class="card-body-container">
                    <div style="width: 100%; display: flex; justify-content: center; padding-bottom: 10px; padding-top: 0">
                        <div class="mdc-data-table">
                            <div class="mdc-data-table__table-container">
                                <table class="mdc-data-table__table" aria-label="Dessert calories">
                                    <thead>
                                        <tr class="mdc-data-table__header-row">
                                        <th class="mdc-data-table__header-cell" role="columnheader" scope="col">First Name</th>
                                        <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Last Name</th>
                                        <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Position</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mdc-data-table__content">
                                    <?php
                                        $stmt = $connection->prepare("SELECT healthcareworker.firstNameHCW, healthcareworker.lastNameHCW FROM healthcareworker
                                                                    INNER JOIN
                                                                    (nurseworksat INNER JOIN vaxclinic ON nurseworksat.clinicName=vaxclinic.vaxClinicName)
                                                                    ON healthcareworker.id=nurseworksat.nurseId
                                                                    WHERE vaxClinicName = :clinic;
                                                                    ");

                                        $stmt->bindParam(':clinic', $_GET['clinic']);
                                        $stmt->execute();
                                        
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr class='mdc-data-table__row'><td class='mdc-data-table__cell'>".$row["firstNameHCW"]."</td><td class='mdc-data-table__cell'>".
                                                                    $row["lastNameHCW"]."</td><td class='mdc-data-table__cell'>"."Nurse"."</td></th>";
                                        }
                                    ?>
                                    <?php
                                        $stmt = $connection->prepare("SELECT healthcareworker.firstNameHCW, healthcareworker.lastNameHCW FROM healthcareworker
                                                                    INNER JOIN
                                                                    (doctorworksat INNER JOIN vaxclinic ON doctorworksat.clinicName=vaxclinic.vaxClinicName)
                                                                    ON healthcareworker.id=doctorworksat.docId
                                                                    WHERE vaxClinicName = :clinic;
                                                                    ");

                                        $stmt->bindParam(':clinic', $_GET['clinic']);
                                        $stmt->execute();

                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr class='mdc-data-table__row'><td class='mdc-data-table__cell'>".$row["firstNameHCW"]."</td><td class='mdc-data-table__cell'>".
                                                                $row["lastNameHCW"]."</td><td class='mdc-data-table__cell'>"."Doctor"."</td></th>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%; display: flex; justify-content: center; margin-bottom: 20px;">
                        <a class="submit" style="text-decoration: none; background-color: #b80202" href="vaxSection.php">Back to vaccination sites</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>