<!DOCTYPE html>
<html>
    <head>
        <?php
            include 'connectdb.php';
        ?>
    </head>
    <body class="body">
        <div class='card' style="padding: 20px; margin-bottom: 25px">
            <div class='card-header-container'>
                <div style="width: 100%; display: flex; align-items: center; justify-content: center">
                    <h1>Vaccines</h1>
                </div>
            </div>
            <div class="card-body-container" style="width: 100%; display: flex; align-items: center; justify-content: center">
                <!-- Get the user selected vaccine type -->
                <div style="margin-right: 7em;">
                    <form method="GET" onsubmit='document.location.reload(true);'>
                        <select name="vaxType" id="vaxType" style="margin-right: 20px">
                            <?php
                                $result = $connection->query("SELECT DISTINCT compName FROM vaccine");

                                while ($row = $result->fetch()) {
                                    if (isset($_GET['vaxType']))   {
                                        if ($_GET['vaxType'] == $row['compName'])  {
                                            echo("<option name='".$row['compName']."' selected>".$row['compName']."</option>");
                                        } else {
                                            echo("<option name='".$row['compName']."'>".$row['compName']."</option>");
                                        }
                                    } else {
                                        echo("<option name='".$row['compName']."'>".$row['compName']."</option>");
                                    }
                                }
                            ?>
                        </select>
                        <input class="submit" type="submit"/>
                    </form>
                </div>
                
                <?php
                    // Select all vaccine lots from the selected manufacturer
                    if (isset($_GET['vaxType']))   {
                        $stmt = $connection->prepare("SELECT shipsto.clinicName, SUM(t1.doses) FROM shipsto INNER JOIN (SELECT lot, doses FROM vaccine WHERE compName=:company) t1 ON shipsto.vaxLot=t1.lot GROUP BY shipsto.clinicName;");
                        $stmt->bindParam(":company", $_GET['vaxType']);
                        $stmt->execute();

                        echo ("<div class='mdc-data-table'>");
                        echo ("<div class='mdc-data-table__table-container'>");
                        echo ("<table class='mdc-data-table__table' aria-label='Dessert calories'>");
                        echo ("<thead>");
                        echo ("<tr class='mdc-data-table__header-row'>");
                        echo ("<th class='mdc-data-table__header-cell' role='columnheader' scope='col'>Vaccination Site</th>");
                        echo ("<th class='mdc-data-table__header-cell' role='columnheader' scope='col'>Total Doses</th>");
                        echo ("</tr>");
                        echo ("</thead>");
                        echo ("<tbody class='mdc-data-table__content'>");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))   {
                            echo ("<tr class='mdc-data-table__row'><td class='mdc-data-table__cell'>".$row['clinicName']."</td>
                                <td class='mdc-data-table__cell'>".$row['SUM(t1.doses)']."</td></tr>");
                        }
                        echo "</tbody>";
                        echo '</table>';
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>