@extends('admin.welcomeAdmin')
@section('all_branch_category')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Access Quantity</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <?php
                        $date = array();
                        $Revenue = array();
                        $Applications = array();
                        $TVaudio = array();
                        $Technology = array();
                        $furniture = array();
                        $theOthers = array();
                        ?>
                        @foreach ($revenue as $eachOfrevenue)
                            <?php
                            $date[] = $eachOfrevenue->date;
                            $Revenue[] = $eachOfrevenue->revenue;
                            $Applications[] = $eachOfrevenue->applications;
                            $TVaudio[] = $eachOfrevenue->tv_and_audio;
                            $Technology[] = $eachOfrevenue->technology;
                            $furniture[] = $eachOfrevenue->Furniture;
                            $theOthers[] = $eachOfrevenue->the_others;
                            ?>
                        @endforeach

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {'packages': ['corechart']});
                            google.charts.setOnLoadCallback(drawVisualization);

                            var table = [
                                ['Thời gian', 'Trung bình', 'Ứng dụng', 'TV audio', 'Technology', 'Gia dụng', 'Khác'],
                                ['<?php echo $date[0] ?>',<?php echo $Revenue[0] ?>,<?php echo $Applications[0] ?>,<?php echo $TVaudio[0] ?>,<?php echo $Technology[0] ?>,<?php echo $furniture[0] ?>,<?php echo $theOthers[0] ?>],
                                ['<?php echo $date[1] ?>',<?php echo $Revenue[1] ?>,<?php echo $Applications[1] ?>,<?php echo $TVaudio[1] ?>,<?php echo $Technology[1] ?>,<?php echo $furniture[1] ?>,<?php echo $theOthers[1] ?>],
                                ['<?php echo $date[2] ?>',<?php echo $Revenue[2] ?>,<?php echo $Applications[2] ?>,<?php echo $TVaudio[2] ?>,<?php echo $Technology[2] ?>,<?php echo $furniture[2] ?>,<?php echo $theOthers[2] ?>],
                                ['<?php echo $date[3] ?>',<?php echo $Revenue[3] ?>,<?php echo $Applications[3] ?>,<?php echo $TVaudio[3] ?>,<?php echo $Technology[3] ?>,<?php echo $furniture[3] ?>,<?php echo $theOthers[3] ?>],
                                ['<?php echo $date[4] ?>',<?php echo $Revenue[4] ?>,<?php echo $Applications[4] ?>,<?php echo $TVaudio[4] ?>,<?php echo $Technology[4] ?>,<?php echo $furniture[4] ?>,<?php echo $theOthers[4] ?>]
                            ];

                            function drawVisualization() {
                                // Some raw data (not necessarily accurate)
                                var data = google.visualization.arrayToDataTable(table);

                                var options = {
                                    title: 'Thống kê doanh thu',
                                    vAxis: {title: 'Doanh thu'},     //trục Oy
                                    hAxis: {title: 'Thời gian'},    //trục Ox
                                    seriesType: 'bars',
                                    series: {0: {type: 'line'}}
                                };

                                var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                                chart.draw(data, options);
                            }
                        </script>
                        </head>
                        <body>
                        <div id="chart_div" style="width: 1150px; height: 500px;"></div>
                        </body>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
