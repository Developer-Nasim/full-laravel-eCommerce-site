$(function () {
    'use strict'
    var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');
    var bodycolor = getComputedStyle(document.body).getPropertyValue('--bodycolor');
    var bordercolor = getComputedStyle(document.body).getPropertyValue('--bordercolor');
    var theme = 'light';
    if ($('body').hasClass('dark')) {
        theme = 'dark';
    }
    if ($('body').hasClass('dark-alt')) {
        theme = 'dark';
    }

////////////////////////////////// LIne Chart /////////////////////////////

   if ($('#c3_line_chart').length > 0)
    {
        var chart = c3.generate({
            bindto: '#c3_line_chart',
            data: {
                columns: [
                    ['data1', 30, 20, 50, 40, 60, 50],
                    ['data2', 200, 130, 90, 240, 130, 220],
                    ['data3', 300, 200, 160, 400, 250, 250]
                ]
            }
        });
    }


/////////////////////////////////// Spline  Chart /////////////////////
    if ($('#c3_spline_chart').length > 0)
    {
var chart = c3.generate({
    bindto: '#c3_spline_chart',
    data: {
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
            ['data2', 130, 100, 140, 200, 150, 50]
        ],
        type: 'spline'
    }
});
    }

/////////////////////////////////// Area Chart /////////////////////
     if ($('#c3_area_chart').length > 0)
    {
    var chart = c3.generate({
        bindto: '#c3_area_chart',
    data: {
        columns: [
            ['data1', 300, 350, 300, 0, 0, 0],
            ['data2', 130, 100, 140, 200, 150, 50]
        ],
        types: {
            data1: 'area',
            data2: 'area-spline'
        }
    }
});
    }
/////////////////////////////////// Bar Chart /////////////////////
  if ($('#c3_bar_chart').length > 0)
    {
    var chart = c3.generate({
          bindto: '#c3_bar_chart',
    data: {
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
            ['data2', 130, 100, 140, 200, 150, 50]
        ],
        type: 'bar'
    },
    bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
        // or
        //width: 100 // this makes bar width 100px
    }
});    
        
    
}

});