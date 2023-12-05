<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mehr Filter</title>
    <style>
        .mehrfilter1 {
            cursor: pointer;
            user-select: none;
            padding: 10px;
            background-color: lightgray;
        }

        .zusaetzlichefilter1 {
            overflow: hidden;
            transition: max-height 0.3s;
            max-height: 0;
            background-color: white;
            padding: 10px;
            border: 1px solid gray;
        }
    </style>
</head>
<body>
 
<div class="mehrfilter1" onclick="toggleFilter()">
    + Mehr Filter
</div>

<div class="zusaetzlichefilter1">
    Zusätzliche Filter-Inhalte hier...
</div>

<script>
    function toggleFilter() {
        var zusatzFilter = document.querySelector('.zusaetzlichefilter1');
        if (zusatzFilter.style.maxHeight) {
            zusatzFilter.style.maxHeight = null;
        } else {
            zusatzFilter.style.maxHeight = zusatzFilter.scrollHeight + 'px';
        }
    }
</script>

</body>
</html>