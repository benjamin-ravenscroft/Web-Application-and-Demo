<!DOCTYPE html>
<html>
    <head>
        <?php include 'connectdb.php'?>

        <link rel="stylesheet" href="css/styleNonMD.css">
    </head>
    <body>
        <div id="patient-info-add">
            <div class="a-container" style="width: 100%; display: flex; align-items: center; justify-content: center">
                <div class="card">
                    <div class="card-header-container">
                        <div style="width: 100%; display: flex; align-items: center; justify-content: center">
                            <h2>Patient Lookup</h2>
                        </div>
                    </div>
                    <div class="card-body-container" style="padding: 10px;">
                        <form method="post">
                            <div style="width: 100%; display: flex; align-items: center; justify-content: center space-evenly">
                                <span style="margin-right: 5px">OHIP Number:</span>
                                <input style="margin-right: 15px" class="textfield" type="text" maxlength="10" name="ohip">
                                <input class="submit" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="b-container" style="width: 100%; display: flex; align-items: center; justify-content: center">
                <?php
                    if (isset($_POST['ohip'])) {
                        include 'checkOhip.php';
                    }
                ?>
            </div>
        </div>
    </body>
</html>