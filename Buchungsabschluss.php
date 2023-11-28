<!DOCTYPE html>

<head>
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Styleimport CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">

    <!--Include Header-->
    <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div> 
    <?php
    include('Header.html');
    ?><br><br><br>

    <!--Processbar dynmaic settings-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
            $("#progress1").fadeTo("slow", 0.4);
            $("#progress2").fadeTo(0.4);
            $("#progress3").fadeTo("slow", 0.4);            
            });    
    </script>
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center;">
    <div id="rent">
        <div style="width: 100%; height: 90px; display: flex; justify-content: center; align-items: center;">
            <h1 style="margin: 0;">Ihre Buchung</h1>
        </div><br>

        <table border="0" style="width: 1145px; height: 358px; border-collapse: collapse;">
            <tr>
                <td>
                    <p style="font-size: 20px; margin: 0;">1. Ort und Zeitraum</p>
                    <div style="border: solid 2px black; width: 539px; height: 90px;">

                    </div>
                </td>
                <td rowspan="3" style="width: 30px;"></td>
                <td rowspan="2">
                    <p style="font-size: 20px; margin: 0;">Rechnungsadresse</p>
                    <div style="border: solid 2px black; width: 539px; height: 215px;">

                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 20px; margin: 0;">2. Auto</p>
                    <div style="border: solid 2px black; width: 539px; height: 90px;">

                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 20px; margin: 0;">3. Extras</p>
                    <div style="border: solid 2px black; width: 539px; height: 90px;">

                    </div>
                </td>
                <td>
                    <p style="font-size: 64px; margin: 0; padding-top: 30px; padding-left: 20px;"><i>Drive.</i> Einfach. Flexibel.</p>
                </td>
            </tr>
        </table><br>

        <div style="padding-left: 570px; padding-top: 30px">
            <button id="book">Kostenpflichtig buchen</button>
            <button id="resetbook">Abbrechen</button>
        </div>
    </div>
    </div><br><br><br>
</body>

<footer>
    <!--Include Footer-->
<?php
    include('Footer.html');
    ?>
</footer>



</html>