<?php
// session_start();

// Include the database connection file
include_once 'dbConfig.php';

// Set filter options
$filterOptions = [
    'Stadt' => ['alle', 'Hamburg', 'Berlin', 'München', 'Bielefeld', 'Bochum', 'Dortmund', 'Bremen', 'Dresden', 'Freiburg', 'Köln', 'Leipzig', 'Nürnberg','Paderborn','Rostock'],
    'Hersteller' => ['alle', 'BMW', 'Mercedes-Benz', 'Audi', 'Volkswagen', 'Ford', 'Range Rover', 'Jaguar', 'Mercedes-AMG', 'Maserati', 'Opel', 'Skoda'],
    'Sitzanzahl' => ['alle', '2', '4', '5', '7', '8', '9'],
    'Türenanzahl' => ['alle', '2', '3', '4', '5'],
    'Getriebe' => ['alle', 'manually', 'automatic'],
    'Kategorie' => ['alle', 'Cabrio', 'SUV', 'Limousine', 'Combi', 'Mehrsitzer', 'Coupé'],
    'Antrieb' => ['alle', 'Combuster', 'Electric'],
    'Preis' => ['alle', '100 €', '200 €', '300 €', '400 €', '500 €', 'ab 500 €'],
    'Mindestalter' => ['alle', '18', '21', '25'],
    'OrderByPrice' => ['Preis Aufsteigend', 'Preis Absteigend']
];

?>

<!DOCTYPE html>

<head>
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://kit.fontawesome.com/9740fceffb.js" crossorigin="anonymous"></script>

    <!--Styleimport CSS Datei-->
    <link rel="stylesheet" href="CSSMain.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body>

    <script>
        $(function() {
            var dateFormat = "dd MM yy",
                from = $("#fromprogress").datepicker({
                    altField: "#datepicker_input",
                    dateFormat: dateFormat,
                    regional: "de",
                    monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                    numberOfMonths: 1,
                    minDate: 0,
                    onSelect: function(selectedDate) {
                        to.datepicker("option", "minDate", selectedDate);
                    }
                }),
                to = $("#toprogress").datepicker({
                    dateFormat: dateFormat,
                    regional: "de",
                    numberOfMonths: 1,
                    monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                    minDate: 0,
                    onSelect: function(selectedDate) {
                        from.datepicker("option", "maxDate", selectedDate);
                    }
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });
    </script>

    <!--Overview of booking process-->
    <div class="progress">
        <table style="background-color: #e9e9e9;">
            <tr>
                <td id="progress1">
                    <a href="#"><!--Platzhalterlink für Homepagefilter-->
                        <ul>
                            <li class="p2" style="font-size: 20px; color: black;">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <label for="filter0" class="nospacing" style="display: inline-block; margin-right: 10px;">Standort<i class="fas fa-edit" style="font-size: 15px; color:black"></i></label>
                                    <select name="filter0" id="filterdropdown">
                                        <?php foreach ($filterOptions['Stadt'] as $option) : ?>
                                            <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Stadt'] == $option) ? 'selected' : ''; ?>>
                                                <?php echo $option; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </form>
                        </li>
                        <li class="p2" style="font-size: 15px; display: inline-block;">
                            <div class="date-picker-container" style="margin-top: 5px;">
                                <label for="zeitraum" style="margin-top: 2px; margin-right: 10px;">Zeitraum</label><br>
                                <input type="text" id="fromprogress" name="from" required placeholder="Abholung">|
                                <input type="text" id="toprogress" name="toprogress" required placeholder="Rückgabe">
                                <i class="far fa-calendar-alt style" style="font-size: 10px; color:black"></i></li>
                            </div><br>
                            <!-- <i class="far fa-calendar-alt style" style="font-size: 10px; color:black"></i></li>  -->
                        <li class="p2" style="float: right; margin-right: 10px; font-size: 20px"><i><b>1.</b></i></li>
                    </ul>
                </a>   
            </td>
            <td id="progress2">
                <a href="Produktübersicht.php"><!--Platzhalterlink für Homepagefilter-->
                    <ul>
                        <li class="p2" style="font-size: 20px;"><span class="nospacing">Finde deinen <i>Drive</i>!</span></li>
                        <li class="p2" style="font-size: 15px;"><span class="nospacing">230 Autos | 64 Modelle | 14 Standorte | 100% Fahrspaß</span></li>
                        <li class="p2" style="float: right; margin-right: 10px; font-size: 20px"><i><b>2.</b></i></li>             
                    </ul>
                </a>
            </td>
            <td id="progress3">
                <a href="#"><!--Platzhalterlink für Homepagefilter-->
                    <ul>
                        <li class="p2" style="font-size: 20px;"><span class="nospacing">Buchung abschließen</span></li>
                        <li class="p2" style="font-size: 15px;"><span class="nospacing">Rund-um-Schutz, Kindersitz oder Dachbox gefällig?</span></li>
                        <li class="p2" style="float: right; margin-right: 10px; font-size: 20px"><i><b>3.</b></i></li>
                    </ul>
                </a>
            </td>
        </tr>
    </table>
    </div><br>

</body>
</html>