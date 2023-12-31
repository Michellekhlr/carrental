<?php
// set variables from session
if (isset($_SESSION['location'])) {
    $location = $_SESSION['location'];
}
if (isset($_SESSION['startDate'])) {
    $startDate = $_SESSION['startDate'];
}
if (isset($_SESSION['endDate'])) {
    $endDate = $_SESSION['endDate'];
}

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

    <!--language import from google fonts-->
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>    
     
</head>

<body>

    <script>
        //settings for the calender
        $(function() {
            var dateFormatalt = "yy-mm-dd";
            var dateFormat ="dd.mm.yy";
            from = $("#fromprogress").datepicker({
                altField: "#from_alt",
                dateFormat: dateFormat,
                altFormat: dateFormatalt,
                regional: "de",
                monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                numberOfMonths: 1,   
                minDate: 0, //Prevents a date from the past from being selected.
                onSelect: function(selectedDate) {
                to.datepicker("option", "minDate", selectedDate); //Prevents a return date from being selected that is earlier than the pick-up date.
                } 
            }),
            to = $("#toprogress").datepicker({
                altField: "#to_alt",
                dateFormat: dateFormat,
                altFormat: dateFormatalt,
                regional: "de",
                numberOfMonths: 1,
                monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                minDate: 0,
                onSelect: function(selectedDate) {
                from.datepicker("option", "maxDate", selectedDate); //Prevents a pick-up date from being selected that is later than the return date.
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
        <table id="progresstable">
            <tr>
                
                <td id="progress1">
                    <ul>
                        <li class="p2" style="font-size: 20px; color: black;">

                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                <!--select section for the location-->
                                <label for="Stadt" class="nospacing" style="display: inline-block; margin-right: 10px;">Standort<i class="fas fa-edit" style="font-size: 15px; color:black"></i></label>

                                <select name="Stadt" id="filterdropdown">

                                    <?php foreach ($filterOptions['Stadt'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['location'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                        </li>

                        <li class="p2" style="font-size: 15px; display: inline-block;">
                                
                            <div class="date-picker-container" style="margin-top: 5px;">
                                
                                <!--select section for time of rental-->        
                                <label for="fromprogress" style="margin-top: 2px; margin-right: 10px;">Zeitraum</label><br>
                                    
                                    <!--four inputs: to visible ones with german dateformat and to hidden ones where the selected dates are transformed into english dateformat, for the database query-->    
                                    <input type="text" id="fromprogress" 
                                        value="<?php if (isset($startDate)) { 
                                            echo date("d.m.Y", strtotime($startDate));
                                            }
                                            else {
                                                echo date("d.m.Y");
                                            }  ?>" 
                                        required placeholder="Abholung">|

                                    <input type="hidden" id="from_alt" name="from" 
                                        value="<?php if (isset($startDate)) { 
                                                echo $startDate;
                                            }
                                            else {
                                                echo date("Y-m-d");
                                            }  ?>" 
                                        required placeholder="Abholung" autocomplete="off">

                                    <input type="text" id="toprogress"
                                        value="<?php if (isset($endDate)) { 
                                                echo date("d.m.Y", strtotime($endDate));
                                            }
                                            else {
                                                echo date("d.m.Y", strtotime("+1 day"));
                                            }  ?>"
                                        required placeholder="Rückgabe">

                                    <input type="hidden" id="to_alt" name="to" 
                                        value="<?php if (isset($endDate)) { 
                                                echo $endDate;
                                            }
                                            else {
                                                echo date("Y-m-d", strtotime("+1 day"));
                                            }  ?>"
                                        required placeholder="Rückgabe" autocomplete="off">

                                <i class="far fa-calendar-alt style" style="font-size: 10px; color:black"></i>

                        </li>
                        </div>
                        
                        <br>
                        </form>
                    </ul>

                </td>

                <td id="progress2">
                    <a href="Produktübersicht.php">
                        <ul>
                            <li class="p3"><span class="nospacing">Finde deinen <i>Drive</i>!</span></li>
                            <li class="p4"><span class="nospacing">230 Autos | 64 Modelle | 14 Standorte | 100% Fahrspaß</span></li>           
                        </ul>
                    </a>
                </td>
                <td id="progress3">
                    <ul>
                        <li class="p3"><span class="nospacing">Buchung abschließen</span></li>
                        <li class="p4"><span class="nospacing">Rund-um-Schutz, Kindersitz oder Dachbox gefällig?</span></li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
    
    <br>

</body>

</html>

<script>
    //when progressbar is shown on Produktübersichtseite.php, data in progressbar should not be editable
    window.onload = function() {
        //convert php session variable in java script
        var isProductOverview = <?php echo ($isProductOverview) ? 'true' : 'false'; ?>;

        function toggleInputFields(disabled) {
            //get input fields which switch from being editable or not
            var inputs = document.querySelectorAll('#progress1 input[type="text"], #progress1 select');
            inputs.forEach(function(input) {
                input.disabled = disabled;
            });
        }

        // depending on calling page the input fields of the form are set disabled or not
        if (isProductOverview) {
            toggleInputFields(false); // Produktübersicht.php: Input fields are active
        } else {
            toggleInputFields(true); // Produktdetailseite.php: Input fields are inactive
        }
        };
</script>