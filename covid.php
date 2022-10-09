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

        <div>
            <h1 class="mdc-typography--headline1" style="text-align:center">Ontario Vaccination Database</h1>
        </div>
        <div style="width: 100%; display: flex; justify-content: center; padding-bottom: 25px">
            <img src="ontario_health_logo.png" alt="logo" width="296px" height="96px">
        </div>
        <div>
            <div style="top: 0; z-index: 2">
                <?php include 'patients.php'?>
            </div>
            <div style="width: 100%; display: flex; justify-content: center; margin-top: 50px;">
                <a class="submit" style="text-decoration: none; background-color: green; font-size: 24px" href="vaxSection.php">To vaccinations</a>
            </div>
        </div>
        <
    </body>
</html>