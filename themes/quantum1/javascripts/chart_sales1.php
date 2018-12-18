<?php 
 # Include FusionCharts PHP Class

  # Create object for Column 3D chart

  $FC = new FusionCharts("Column2D","850","350");


  # Setting Relative Path of chart swf file.

  $FC->setSwfPath("charts/");


  # Store chart attributes in a variable

  $strParam="caption=Top Product 2013 ; xAxisName=Produk ;yAxisName=Jumlah (dalam Unit);decimalPrecision=0; formatNumberScale=0";


  # Set chart attributes

  $FC->setChartParams($strParam);


  # add chart values and category names

  $FC->addChartData("200","name=Pentium I");

  $FC->addChartData("250","name=Pentium II");

  $FC->addChartData("180","name=Pentium III");

  $FC->addChartData("450","name=Pentium IV");
  
  $FC->addChartData("200","name=Pentium I3");

  $FC->addChartData("300","name=Pentium I5");

  $FC->addChartData("380","name=Pentium I7");

  $FC->addChartData("550","name=Multimedia Comp");

    # Render Chart

   $FC->renderChart();
?>