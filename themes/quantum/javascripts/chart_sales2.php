<?php 
 # Include FusionCharts PHP Class

  # Create object for Column 3D chart

  $FC = new FusionCharts("Pie2D","850","350");


  # Setting Relative Path of chart swf file.

  $FC->setSwfPath("charts/");


  # Store chart attributes in a variable

  $strParam="caption=Product Comparison 2013 ; xAxisName=Bulan ;yAxisName=Jumlah (dalam Kg);decimalPrecision=0; formatNumberScale=0";


  # Set chart attributes

  $FC->setChartParams($strParam);


  # add chart values and category names

  $FC->addChartData("200","name=Januari");

  $FC->addChartData("250","name=Februari");

  $FC->addChartData("180","name=Maret");

  $FC->addChartData("450","name=April");
  
  $FC->addChartData("200","name=Mei");

  $FC->addChartData("300","name=Juni");

  $FC->addChartData("380","name=Juli");

  $FC->addChartData("550","name=Agustus");

    # Render Chart

   $FC->renderChart();
?>