$(function(){
  'use strict'
   var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');
    var bordercolor = getComputedStyle(document.body).getPropertyValue('--bordercolor');
    var bodycolor = getComputedStyle(document.body).getPropertyValue('--bodycolor');


/******************* BAR CHARTS *****************/

  $('.sparkbar').sparkline('html', {
    type: 'bar',
    barWidth: 10,
    height: 170,
    barColor: primarycolor,
    chartRangeMax: 12
  });

  /***************** LINE CHARTS *****************/
  $('.sparkline').sparkline('html', {
    width: 180,
    height: 170,
    lineColor: primarycolor,
    fillColor: false,
    tooltipContainer: $('.az-content')
  });

  $('.sparkline2').sparkline('html', {
    width: 200,
    height: 170,
    lineColor: '#B654C3',
    fillColor: false
  });


  /************** AREA CHARTS ********************/
  $('.areachart').sparkline('html', {
    width: 180,
    height: 170,
    lineColor: '#0083CD',
    fillColor: 'rgba(0,131,205,0.2)',
  });

  $('.areachart2').sparkline('html', {
    width: 180,
    height: 170,
    lineColor: '#B654C3',
    fillColor: 'rgba(182,84,195,0.2)'
  });



  /**************** PIE CHART ****************/

  $('.piechart').sparkline('html', {
    type: 'pie',
    width: 170,
    height: 170,
    sliceColors: ['#560bd0','#007bff','#00cccc']
  });

  $('.piechart2').sparkline('html', {
    type: 'pie',
    width: 170,
    height: 170,
    sliceColors: ['#560bd0','#007bff','#00cccc','#f10075','#74de00','#494c57']
  });

  $('.piechart3').sparkline('html', {
    type: 'pie',
    width: 350,
    height: 350,
    sliceColors: ['#560bd0','#007bff','#00cccc']
  });

 

});
