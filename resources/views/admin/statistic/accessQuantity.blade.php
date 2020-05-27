


<head>

    <?php
     $date = array();
     $access_quantity = array();
    ?>
    @foreach ($accessQty as $eachOfAccessQty)
        <?php
            $date[] = $eachOfAccessQty->date;
            $access_quantity[] = $eachOfAccessQty->access_quantity;
        ?>
    @endforeach

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        var table = [
            ['Thời gian', 'Lượt truy cập'],
            ['<?php echo $date[0] ?>',<?php echo $access_quantity[0] ?>],
            ['<?php echo $date[1] ?>',<?php echo $access_quantity[1] ?>],
            ['<?php echo $date[2] ?>',<?php echo $access_quantity[2] ?>],
            ['<?php echo $date[3] ?>',<?php echo $access_quantity[3] ?>],
            ['<?php echo $date[4] ?>',<?php echo $access_quantity[4] ?>]
        ];

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable(table);

            var options = {
                title: 'Thống kê lượt truy cập Alease',
                vAxis: {title: 'Lượt truy cập'},     //trục Oy
                hAxis: {title: 'Thời gian'},    //trục Ox
                //seriesType: 'line'
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="chart_div" style="width: 900px; height: 500px;"></div>
</body>
