<?php 
 # Include FusionCharts PHP Class

  # Create object for Column 3D chart

  $FC = new FusionCharts("Pie2D","450","250");


  # Setting Relative Path of chart swf file.

  $FC->setSwfPath("charts/");


  # Store chart attributes in a variable

  $strParam="caption=Top Customer 2013 ; xAxisName=Bulan ;yAxisName=Jumlah (dalam Kg);decimalPrecision=0; formatNumberScale=0";


  # Set chart attributes

  $FC->setChartParams($strParam);


  # add chart values and category names

  $FC->addChartData("200","name=Januari");

  $FC->addChartData("250","name=Februari");

  $FC->addChartData("180","name=Maret");

  $FC->addChartData("450","name=April");

    # Render Chart

   $FC->renderChart();
?>