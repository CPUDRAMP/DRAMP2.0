<!DOCTYPE html>
    <head><title>chart demo</title>
        <style>
            #chartContainer{
                border:solid 1px #999;
                
            }
        </style>
        <script src="http://cloud.github.com/downloads/scottkiss/H5Draw/H5Draw.js"></script>
        <script src="http://cloud.github.com/downloads/scottkiss/H5Draw/h5Charts.js"></script>
        <script>
            window.onload = function(){
            var chart = new h5Charts.SerialChart();
            chart.dataProvider = [{age:"18",amount:10},{age:"38",amount:30},{age:"8",amount:6},{age:"29",amount:20}];
            chart.categoryField = "age";
            chart.valueField = "amount";
            chart.type = "column";
            chart.columnWidth = 55;
            chart.colors = ["#f00","#0f0","#0ff","#00f"];
            chart.addTo("chartContainer");
            };
        </script>
    </head>
    <body>
        <canvas id="chartContainer" width="500" height="400">
             browser doesn't support html5
        </canvas>
    </body>
</html>


