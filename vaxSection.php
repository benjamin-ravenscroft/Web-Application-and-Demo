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
        <script>
            document.addEventListener("DOMContentLoaded", function(event) { 
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>

        <h1 class="mdc-typography--headline1" style="text-align:center">Vaccinations</h1>
        <div class="card" style="padding: 15px;">
            <?php include 'vaccines.php'?>
            <?php
                if (isset($_GET['clinic'])) {
                    include 'hcwAtVaxSite.php';
                } else {
                    include 'vaxSites.php';
                }
            ?>
        </div>
        <div style="width: 100%; display: flex; justify-content: center; padding-top: 20px; padding-bottom: 10px;">
            <a class="submit" style="text-decoration: none; background-color: #b80202; font-size: 24px" href="covid.php">Back to homepage</a>
        </div>
    </body>
</html>