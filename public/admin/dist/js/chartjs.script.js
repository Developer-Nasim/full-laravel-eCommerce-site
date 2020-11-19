(function ($) {
    "use strict";

    var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');
    var bordercolor = getComputedStyle(document.body).getPropertyValue('--bordercolor');
    var bodycolor = getComputedStyle(document.body).getPropertyValue('--bodycolor');


    var options = {
        responsive: true,
        legend: {
            position: 'top',
            labels: {
                fontColor: bodycolor
            }
        },
        scales: {
            xAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        color: bordercolor,
                        zeroLineColor: bordercolor
                    },
                    ticks: {
                        fontColor: bodycolor,

                    },
                }],
            yAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        color: bordercolor,
                        zeroLineColor: bordercolor
                    },
                    ticks: {
                        fontColor: bodycolor,

                    }
                }]
        }
    };



    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var color = Chart.helpers.color;

    var barChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
                label: 'Dataset 1',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [35, 60, -10, -30, -25, -90, 70]

            }, {
                label: 'Dataset 2',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [-70, -55, 90, -90, 25, 70, 40]
            }]

    };

    var chartjs_vertical_bar = document.getElementById("chartjs-vertical-bar");
    if (chartjs_vertical_bar) {
        var ctx = document.getElementById('chartjs-vertical-bar').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            maintainAspectRatio: false,
            responsive: true,
            data: barChartData,
            options
        });


    }

/////////////////////// Verticle Bar ///////////////////////////////////////
    var chartjs_horizontal_bar = document.getElementById("chartjs-horizontal-bar");
    if (chartjs_horizontal_bar) {
        var ctx = document.getElementById('chartjs-horizontal-bar').getContext('2d');
        window.myHorizontalBar = new Chart(ctx, {
            type: 'horizontalBar',
            data: barChartData,
            options
        });
    }
/////////////////////////////////  Multi Axis ///////////////////////////

    var barmultiaxisChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
                label: 'Dataset 1',
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                    window.chartColors.purple,
                    window.chartColors.red
                ],
                yAxisID: 'y-axis-1',
                data: [35, 60, -10, -30, -25, -90, 70]
            }, {
                label: 'Dataset 2',
                backgroundColor: window.chartColors.grey,
                yAxisID: 'y-axis-2',
                data: [-70, -55, 90, -90, 25, 70, 40]
            }]

    };

    var chartjs_multiaxis_bar = document.getElementById("chartjs-multiaxis-bar");
    if (chartjs_multiaxis_bar) {
        ctx = document.getElementById('chartjs-multiaxis-bar').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barmultiaxisChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                    labels: {
                        fontColor: bodycolor
                    }
                },
                scales: {
                    xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            },
                        }],
                    yAxes: [{
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'right',
                            id: 'y-axis-2',
                            gridLines: {
                                drawOnChartArea: false,
                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            }
                        }, {
                            display: true,
                            gridLines: {
                                display: true,
                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            }
                        }]
                }
            }
        });
    }

/////////////////////////////// Stacked ///////////////////////////

    var chartjs_stacked_bar = document.getElementById("chartjs-stacked-bar");
    if (chartjs_stacked_bar) {
        var ctx = document.getElementById('chartjs-stacked-bar').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                legend: {
                    position: 'top',
                    labels: {
                        fontColor: bodycolor
                    }
                },
                scales: {
                    xAxes: [{
                            stacked: true,
                            gridLines: {
                                display: true,
                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            }
                        }],
                    yAxes: [{
                            stacked: true,
                            gridLines: {
                                display: true,
                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            }
                        }]
                }
            }
        });
    }

    ////////////////////////////////// Line Basic //////////////////////////////
    
////////////////////////////////////////////////// Line Multiple axis //////////////////////////
    var lineChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
                label: 'My First dataset',
                borderColor: window.chartColors.red,
                backgroundColor: window.chartColors.red,
                fill: false,
                data: [35, 60, -10, -30, -25, -90, 70],
                yAxisID: 'y-axis-1',
            }, {
                label: 'My Second dataset',
                borderColor: window.chartColors.blue,
                backgroundColor: window.chartColors.blue,
                fill: false,
                data: [-70, -55, 90, -90, 25, 70, 40],
                yAxisID: 'y-axis-2'
            }]
    };
    var chartjs_line_multiaxis = document.getElementById("chartjs-line-multiaxis");
    if (chartjs_line_multiaxis) {
        var ctx = document.getElementById('chartjs-line-multiaxis').getContext('2d');
        window.myLine = Chart.Line(ctx, {
            data: lineChartData,
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: false,
                legend: {
                    position: 'top',
                    labels: {
                        fontColor: bodycolor
                    }
                },

                scales: {
                    xAxes: [{
                            display: true,
                            // grid line settings
                            gridLines: {

                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            }
                        }],
                    yAxes: [{
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'left',
                            id: 'y-axis-1',
                            // grid line settings
                            gridLines: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                                display: true,
                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            }
                        }, {
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'right',
                            id: 'y-axis-2',

                            // grid line settings
                            gridLines: {

                                display: true,
                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            }
                        }],
                }
            }
        });
    }


    ///////////////////////////// Stepped line chart /////////////////////////////
    config = {
        type: 'line',
        data: {
            labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6'],
            datasets: [{

                    steppedLine: true,
                    data: [35, 60, -10, -30, -25, -90, 70],
                    borderColor: primarycolor,
                    fill: false,
                }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
                labels: {
                    fontColor: bodycolor
                }
            },
            scales: {
                xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true
                        },
                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        }
                    }],
                yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true
                        },
                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        }
                    }]
            }
        }
    };


    var chartjs_line_stepped = document.getElementById("chartjs-line-stepped");
    if (chartjs_line_stepped) {
        var ctx = document.getElementById('chartjs-line-stepped').getContext('2d');
        new Chart(ctx, config);
    }

    ///////////////////////////// Point Size line chart /////////////////////////////


    var config = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'dataset - big points',
                    data: [-70, -55, 90, -90, 25, 70, 40],
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    fill: false,
                    borderDash: [5, 5],
                    pointRadius: 15,
                    pointHoverRadius: 10,
                }, {
                    label: 'dataset - individual point sizes',
                    data: [-70, -55, 90, -90, 25, 70, 40],
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    fill: false,
                    borderDash: [5, 5],
                    pointRadius: [2, 4, 6, 18, 0, 12, 20],
                }, {
                    label: 'dataset - large pointHoverRadius',
                    data: [35, 60, -10, -30, -25, -90, 70],
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    fill: false,
                    pointHoverRadius: 30,
                }, {
                    label: 'dataset - large pointHitRadius',
                    data: [25, 40, -30, -50, -45, -80, 40],
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    fill: false,
                    pointHitRadius: 20,
                }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            hover: {
                mode: 'index'
            },
            scales: {
                xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
            },
            title: {
                display: true,
                text: ''
            }
        }
    };

    var chartjs_line_pointsize = document.getElementById("chartjs-line-pointsize");
    if (chartjs_line_pointsize) {
        var ctx = document.getElementById('chartjs-line-pointsize').getContext('2d');
        window.myLine = new Chart(ctx, config);

    }

////////////////////////////////////// Area Chart Boundries /////////////////
    var chartjs_area_boundaries = document.getElementById("chartjs-area-boundaries");
    if (chartjs_area_boundaries) {

        var options = {
            maintainAspectRatio: false,
            spanGaps: false,
            elements: {
                line: {
                    tension: 0.000001
                }
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            legend: {
                position: 'top',
                labels: {
                    fontColor: bodycolor
                }
            },

            scales: {
                x: {
                    ticks: {
                        autoSkip: false,
                        maxRotation: 0
                    }
                },
                xAxes: [{
                        display: true,
                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        },
                    }],
                yAxes: [{
                        display: true,
                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        }
                    }]

            }
        };


        new Chart('chartjs-area-boundaries', {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        backgroundColor: 'rgba(255, 99, 132,0.2)',
                        borderColor: window.chartColors.red,
                        data: [6.06, 82.2, -22.11, 21.53, -21.47, 73.61, -53.75, -60.32],
                        label: 'Dataset',
                        fill: 'start'
                    }]
            },
            options: Chart.helpers.merge(options)
        });

    }


    ////////////////////////////////////// Area Chart Boundries /////////////////
    var chartjs_area_datasets = document.getElementById("chartjs-area-datasets");
    if (chartjs_area_datasets) {
        var data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August'],
            datasets: [{
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: window.chartColors.red,
                    data: [73.15, 77.54, 53.72, 55.76, 62.18, 62.62, 64.47, 79.6],
                    hidden: true,
                    label: 'D0'
                }, {
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: window.chartColors.orange,
                    data: [30.96, 59.3, 29.79, 38.75, 60.23, 52.77, 45.98, 27.28],
                    label: 'D1',
                    fill: '-1'
                }, {
                    backgroundColor: 'rgba(255, 205, 86, 0.5)',
                    borderColor: window.chartColors.yellow,
                    data: [48.52, 72.66, 40.44, 37.05, 78.78, 59.71, 38.36, 24.35],
                    hidden: true,
                    label: 'D2',
                    fill: 1
                }, {
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: window.chartColors.green,
                    data: [45.09, 72.44, 49.36, 76.58, 39.3, 53.81, 54.19, 78.94],
                    label: 'D3',
                    fill: '-1'
                }, {
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: window.chartColors.blue,
                    data: [57.71, 57.9, 31.36, 21.06, 47.73, 36.56, 23.85, 43.66],
                    label: 'D4',
                    fill: '-1'
                }, {
                    backgroundColor: 'rgba(201, 203, 207, 0.5)',
                    borderColor: window.chartColors.grey,
                    data: [54.53, 26.08, 65.71, 45.28, 47.76, 73.87, 28.81, 48.88],
                    label: 'D5',
                    fill: '+2'
                }, {
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: window.chartColors.purple,
                    data: [28.14, 25.12, 49.44, 68.52, 54.2, 69.45, 35.01, 76.07],
                    label: 'D6',
                    fill: false
                }, {
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: window.chartColors.red,
                    data: [68.91, 67.62, 50.71, 67.81, 66.33, 58.13, 26.15, 51.16],
                    label: 'D7',
                    fill: 8
                }, {
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: window.chartColors.orange,
                    data: [58.32, 23.94, 42.09, 71.3, 21.18, 59.14, 57.05, 37.85],
                    hidden: true,
                    label: 'D8',
                    fill: 'end'
                }]
        };
        var options = {
            maintainAspectRatio: false,
            spanGaps: false,
            elements: {
                line: {
                    tension: 0.000001
                }
            },
            legend: {
                position: 'top',
                labels: {
                    fontColor: bodycolor
                }
            },
            scales: {
                stacked: true,
                xAxes: [{
                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        },
                    }],
                yAxes: [{

                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        }
                    }]
            },
            plugins: {
                filler: {
                    propagate: false
                },
                'samples-filler-analyser': {
                    target: 'chart-analyser'
                }
            }
        };
        new Chart('chartjs-area-datasets', {
            type: 'line',
            data: data,
            options: options
        });
    }

    ////////////////////////////////////// Area Chart Stacked /////////////////

    var config = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'My First dataset',
                    borderColor: window.chartColors.red,
                    backgroundColor: window.chartColors.red,
                    data: [10, 20, -59, -30, -84, -16, 79],
                }, {
                    label: 'My Second dataset',
                    borderColor: window.chartColors.blue,
                    backgroundColor: window.chartColors.blue,
                    data: [57, 99, 22, -75, -31, 80, 4],
                }, {
                    label: 'My Third dataset',
                    borderColor: window.chartColors.green,
                    backgroundColor: window.chartColors.green,
                    data: [77, -62, -23, -93, 79, -73, -58],
                }, {
                    label: 'My Third dataset',
                    borderColor: window.chartColors.yellow,
                    backgroundColor: window.chartColors.yellow,
                    data: [-13, -62, 66, -57, 92, -39, 33],
                }]
        },
        options: {
            responsive: true,

            tooltips: {
                mode: 'index',
            },
            hover: {
                mode: 'index'
            },
            legend: {
                position: 'top',
                labels: {
                    fontColor: bodycolor
                }
            },
            scales: {
                xAxes: [{
                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        },
                    }],
                yAxes: [{

                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        }
                    }]
            }
        }
    };

    var chartjs_area_stacked = document.getElementById("chartjs-area-stacked");
    if (chartjs_area_stacked) {
        var ctx = document.getElementById('chartjs-area-stacked').getContext('2d');
        window.myLine = new Chart(ctx, config);
    }

    ////////////////////////////////////// Area Chart Radar /////////////////   

    var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August"],
        datasets: [{
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: window.chartColors.red,
                data: [15.09, 15.67, 12.5, 12.77, 13.62, 13.68, 13.93, 15.95],
                label: 'D0'
            }, {
                backgroundColor: 'rgba(255, 159, 64, 0.5)',
                borderColor: window.chartColors.orange,
                data: [24.55, 28.91, 21.81, 23.27, 26.98, 26.05, 25.39, 24.92],
                hidden: true,
                label: 'D1',
                fill: '-1'
            }, {
                backgroundColor: 'rgba(255, 205, 86, 0.5)',
                borderColor: window.chartColors.yellow,
                data: [36.35, 43.93, 32.54, 33.54, 42.82, 39.34, 35.84, 33.5],
                label: 'D2',
                fill: 1
            }, {
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: window.chartColors.green,
                data: [47.7, 58.92, 44.45, 49.08, 53.39, 51.85, 48.4, 49.36],
                label: 'D3',
                fill: false
            }, {
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: window.chartColors.blue,
                data: [60.73, 71.97, 53.96, 57.22, 65.09, 62.06, 56.91, 60.52],
                label: 'D4',
                fill: '-1'
            }, {
                backgroundColor: 'rgba(153, 102, 255, 0.5)',
                borderColor: window.chartColors.purple,
                data: [73.33, 80.78, 68.05, 68.59, 76.79, 77.24, 66.08, 72.37],
                label: 'D5',
                fill: '-1'
            }]
    };

    var options = {
        maintainAspectRatio: true,
        spanGaps: false,
        legend: {
            position: 'top',
            labels: {
                fontColor: bodycolor
            }
        },
        elements: {
            line: {
                tension: 0.000001
            }
        },
        plugins: {
            filler: {
                propagate: false
            },
            'samples-filler-analyser': {
                target: 'chart-analyser'
            }
        },
        scale: {
            angleLines: {
                color: bordercolor
            },

            gridLines: {
                display: true,
                color: bordercolor,
                zeroLineColor: bordercolor
            },
            pointLabels: {
                // callback: function(value, index, values) {
                //     return '$' + value;
                // }
                fontColor: bodycolor,
            },
        }
    };
    var chartjs_area_radar = document.getElementById("chartjs-area-radar");
    if (chartjs_area_radar) {
        var ctx = document.getElementById('chartjs-area-radar').getContext('2d');
        window.myLine = new Chart(ctx, {type: 'radar',
            data: data,
            options: options});
    }



    ////////////////////////////////////// Other Chart Scatter /////////////////   
    var scatterChartData = {
        datasets: [{
                label: 'My First dataset',
                borderColor: window.chartColors.red,
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                data: [{x: -63, y: 69}, {x: -79, y: -24}, {x: 1, y: 22}, {x: 32, y: 44}, {x: 60, y: -12}, {x: 81, y: -79}, {x: -74, y: -5}]
            }, {
                label: 'My Second dataset',
                borderColor: window.chartColors.blue,
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                data: [{x: -43, y: 49}, {x: -59, y: -64}, {x: 21, y: 42}, {x: 52, y: 64}, {x: 20, y: -32}, {x: 51, y: -59}, {x: -54, y: -10}]
            }]
    };
    var chartjs_other_scatter = document.getElementById("chartjs-other-scatter");
    if (chartjs_other_scatter) {

        var ctx = document.getElementById('chartjs-other-scatter').getContext('2d');
        window.myScatter = new Chart(ctx, {
            type: 'scatter',
            data: scatterChartData,
            options: {
                legend: {
                    position: 'top',
                    labels: {
                        fontColor: bodycolor
                    }
                },
                scales: {
                    xAxes: [{
                            gridLines: {
                                display: true,
                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            },
                        }],
                    yAxes: [{

                            gridLines: {
                                display: true,
                                color: bordercolor,
                                zeroLineColor: bordercolor
                            },
                            ticks: {
                                fontColor: bodycolor,

                            }
                        }]
                }
            }
        });

    }

    ////////////////////////////////////// Other Chart doughnut /////////////////   
    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                    data: [3, 28, 67, 6, 88],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                    ],
                    label: 'Dataset 1'
                }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
                labels: {
                    fontColor: bodycolor
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };
    var chartjs_other_doughnut = document.getElementById("chartjs-other-doughnut");
    if (chartjs_other_doughnut) {
        var ctx = document.getElementById('chartjs-other-doughnut').getContext('2d');
        window.myDoughnut = new Chart(ctx, config);
    }



    ////////////////////////////////////// Other Chart Pie /////////////////   
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                    data: [3, 28, 67, 6, 88],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                    ],
                    label: 'Dataset 1'
                }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
                labels: {
                    fontColor: bodycolor
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
        }
    };
    var chartjs_other_pie = document.getElementById("chartjs-other-pie");
    if (chartjs_other_pie) {
        var ctx = document.getElementById('chartjs-other-pie').getContext('2d');
        window.myDoughnut = new Chart(ctx, config);
    }


    ////////////////////////////////////// Other Chart Polar /////////////////   
    var randomScalingFactor = function () {
        return Math.round(Math.random() * 100);
    };

    var chartColors = window.chartColors;
    var color = Chart.helpers.color;
    var config = {
        data: {
            datasets: [{
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                    ],
                    backgroundColor: [
                        color(chartColors.red).alpha(0.5).rgbString(),
                        color(chartColors.orange).alpha(0.5).rgbString(),
                        color(chartColors.yellow).alpha(0.5).rgbString(),
                        color(chartColors.green).alpha(0.5).rgbString(),
                        color(chartColors.blue).alpha(0.5).rgbString(),
                    ],
                    label: 'My dataset' // for legend
                }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
                labels: {
                    fontColor: bodycolor
                }
            },

            scale: {
                ticks: {
                    beginAtZero: true
                },
                reverse: false,

                angleLines: {
                    color: bordercolor
                },

                gridLines: {
                    display: true,
                    color: bordercolor,
                    zeroLineColor: bordercolor
                }

            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    };

    var chartjs_other_polar = document.getElementById("chartjs-other-polar");
    if (chartjs_other_polar) {
        window.myPolarArea = Chart.PolarArea(chartjs_other_polar, config);
    }

    ////////////////////////////////////// Linear Chart Step Size /////////////////     

    var config = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'My First dataset',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    fill: false,
                }, {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
                labels: {
                    fontColor: bodycolor
                }
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                        display: true,

                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        }

                    }],
                yAxes: [{
                        display: true,

                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,
                            min: 0,
                            max: 100,
                            // forces step size to be 5 units
                            stepSize: 5
                        }
                    }]
            }
        }
    };
    var chartjs_linear_stepsize = document.getElementById("chartjs-linear-stepsize");
    if (chartjs_linear_stepsize) {
        var ctx = document.getElementById('chartjs-linear-stepsize').getContext('2d');
        window.myLine = new Chart(ctx, config);
    }


////////////////////////////////////// Linear Chart Min Max /////////////////     

    var config = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'My First dataset',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [10, 30, 50, 20, 25, 44, -10],
                    fill: false,
                }, {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [100, 33, 22, 19, 11, 49, 30],
                }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
                labels: {
                    fontColor: bodycolor
                }
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                        display: true,

                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        }

                    }],
                yAxes: [{
                        display: true,

                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,
                            min: 10,
                            max: 50
                        }
                    }]
            }
        }
    };
    var chartjs_linear_minmax = document.getElementById("chartjs-linear-minmax");
    if (chartjs_linear_minmax) {
        var ctx = document.getElementById('chartjs-linear-minmax').getContext('2d');
        window.myLine = new Chart(ctx, config);
    }


////////////////////////////////////// Linear Chart Min Max suggested /////////////////     

    var config = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'My First dataset',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [10, 30, 50, 20, 25, 44, -10],
                    fill: false,
                }, {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [100, 33, 22, 19, 11, 49, 30],
                }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
                labels: {
                    fontColor: bodycolor
                }
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                        display: true,
                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,

                        }

                    }],
                yAxes: [{
                        display: true,

                        gridLines: {
                            display: true,
                            color: bordercolor,
                            zeroLineColor: bordercolor
                        },
                        ticks: {
                            fontColor: bodycolor,
                            suggestedMin: 10,

                            // the data maximum used for determining the ticks is Math.max(dataMax, suggestedMax)
                            suggestedMax: 50
                        }
                    }]
            }
        }
    };
    var chartjs_linear_minmaxsuggested = document.getElementById("chartjs-linear-minmaxsuggested");
    if (chartjs_linear_minmaxsuggested) {
        var ctx = document.getElementById('chartjs-linear-minmaxsuggested').getContext('2d');
        window.myLine = new Chart(ctx, config);
    }

})(jQuery);
