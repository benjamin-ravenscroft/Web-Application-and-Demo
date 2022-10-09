<!DOCTYPE html>
<html>
    <head>
        <style>
            div.ohip-container {
                margin-top: 0px;
                top: 0;
                z-index: 2;
            }

            div.name-container {
                padding-top: 2em;
                margin-top: 20px;
            }

            div.dob-container {
                padding-top: 2em;
                margin-top: 20px;
                margin-bottom: 10px;
            }
        </style>

        <link rel="stylesheet" href="css/styleNonMD.css">
    </head>
    <body>
        <?php
            if (isset($_POST['lot']) && isset($_POST['vaxClinic']))   {
                // add condition for vaxClinic after posting using JS
                // post the data to the associated tables
                echo $_POST['lot'];
                echo $_POST['vaxClinic'];
            }
        ?>

        <div class="card">
            <div class="card-container">
                <div class="card-header-container">
                    <div style="width: 100%; display: flex; align-items: center; justify-content: center">
                        <h2>Enter New Patient Information</h2>
                    </div>
                </div>
                <div class="card-body-container">
                    <form method="post">
                        <div class='ohip-container'>
                            <div style="width: 100%; display: flex; align-items: center; justify-content: left space-evenly">
                                <span style="margin-right: 5px">OHIP Number:</span>
                                <?php
                                    echo "<input class='textfield' type='text' maxlength='10' name='ohip' value=".''.">";
                                ?>
                            </div>
                        </div>
                        <div class='name-container'>
                            <div style="width: 100%; display: flex; align-items: center; justify-content: left space-evenly">
                                <span style="margin-right: 5px">First Name:</span>
                                <input style="margin-right: 20px" class="textfield" type="text" name="firstName">
                                <span style="margin-right: 5px">Last Name:</span>
                                <input style="margin-right: 20px" class="textfield" type="text" name="lastName">
                            </div>
                        </div>
                        <div class='dob-container'>
                            <div style="width: 100%; display: flex; align-items: center; justify-content: left space-evenly">
                                <span style="margin-right: 10px">Date of Birth:</span>
                                <input style="margin-right: 10px" type="date" name="dob">
                                <input type="submit">
                            </div>
                        </div>
                    </form>
                    <div style="width: 100%; display: flex; justify-content: center; margin-top: 2em; padding-bottom: 10px">
                        <a class="submit" style="text-decoration: none; background-color: #b80202" href="covid.php">Back to patients</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include "addPatientInfo.php";
        ?>
    </body>
</html>