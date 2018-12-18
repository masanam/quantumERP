<?php 
 # Include FusionCharts PHP Class

  # Create object for Column 3D chart

  $FC = new FusionCharts("Column2D","450","250");


  # Setting Relative Path of chart swf file.

  $FC->setSwfPath("charts/");


  # Store chart attributes in a variable

  $strParam="caption=Top Product 2013 ; xAxisName=Produk ;yAxisName=Jumlah (dalam Unit);decimalPrecision=0; formatNumberScale=0";


  # Set chart attributes

  $FC->setChartParams($strParam);


  # add chart values and category names

  $FC->addChartData("150","name=Pentium 4");

  $FC->addChartData("250","name=Pentium I3");

  $FC->addChartData("100","name=Pentium I5");

  $FC->addChartData("450","name=Pentium I7");

    # Render Chart

   $FC->renderChart();
?>