(function ($) {
    "use strict";

    var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');
    var bordercolor = getComputedStyle(document.body).getPropertyValue('--bordercolor');
    var bodycolor = getComputedStyle(document.body).getPropertyValue('--bodycolor');


    var myChart = echarts.init(document.getElementById('e-basic-line'));
    // specify chart configuration item and data
    var option = {

        tooltip: {},
        legend: {
            data: ['Sales'],
            textStyle: {
                color: bodycolor
            }
        },
        xAxis: {
            data: ["shirt", "cardign", "chiffon shirt", "pants", "heels", "socks"],
            axisLine: {
                lineStyle: {
                    color: bordercolor
                }
            }
        },
        textStyle: {
            color: bodycolor
        },
        color: [primarycolor],
        yAxis: {
            type: 'value',
            axisLine: {
                lineStyle: {
                    color: bordercolor
                }
            },
            splitLine: {
                lineStyle: {
                    color: bordercolor
                }
            }
        },
        series: [{
                name: 'Sales',
                type: 'line',
                data: [5, 20, 36, 10, 10, 20],
                label: {
                    color: bodycolor
                }
            }]
    };
    // use configuration item and data specified to show chart
    myChart.setOption(option);


    var myBarChart = echarts.init(document.getElementById('e-basic-bar'));
    // specify chart configuration item and data

    var baroption = {
        legend: {textStyle: {
                color: bodycolor
            }},
        tooltip: {},
        dataset: {
            source: [
                ['product', '2015', '2016', '2017'],
                ['Matcha Latte', 43.3, 85.8, 93.7],
                ['Milk Tea', 83.1, 73.4, 55.1],
                ['Cheese Cocoa', 86.4, 65.2, 82.5],
                ['Walnut Brownie', 72.4, 53.9, 39.1]
            ]
        },
        textStyle: {
            color: bodycolor
        },
        xAxis: {type: 'category',
            axisLine: {
                lineStyle: {
                    color: bordercolor
                }
            }},
        yAxis: {axisLine: {
                lineStyle: {
                    color: bordercolor
                }
            },
            splitLine: {
                lineStyle: {
                    color: bordercolor
                }
            }},
        // Declare several bar series, each will be mapped
        // to a column of dataset.source by default.
        series: [
            {type: 'bar',
                label: {
                    color: bodycolor
                }},
            {type: 'bar',
                label: {
                    color: bodycolor
                }},
            {type: 'bar',
                label: {
                    color: bodycolor
                }},
        ]
    };
    // use configuration item and data specified to show chart
    myBarChart.setOption(baroption);



    var mydoughnutChart = echarts.init(document.getElementById('e-doughnut-chart'));
    // specify chart configuration item and data
    var doughnutoption = {
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            x: 'left',
            data: ['2015', '2016', '2017', '2018', '2019'],
            textStyle: {
                color: bodycolor
            }
        },
        series: [
            {
                name: 'Products',
                type: 'pie',
                radius: ['50%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    normal: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        show: true,
                        textStyle: {
                            fontSize: '30',
                            fontWeight: 'bold'
                        }
                    }
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                data: [
                    {value: 335, name: '2015'},
                    {value: 310, name: '2016'},
                    {value: 234, name: '2017'},
                    {value: 135, name: '2018'},
                    {value: 1548, name: '2019',
                        itemStyle: {
                            color: primarycolor
                        }
                    }
                ]
            }
        ]
    };
    // use configuration item and data specified to show chart
    mydoughnutChart.setOption(doughnutoption);



    /////////////////////// Bubble Chart //////////////////////////
    var mybubbleChart = echarts.init(document.getElementById('e-bubble-chart'));
    // specify chart configuration item and data

    var data = [
        [[28604, 77, 17096869, 'Australia', 1990], [31163, 77.4, 27662440, 'Canada', 1990], [1516, 68, 1154605773, 'China', 1990], [13670, 74.7, 10582082, 'Cuba', 1990], [28599, 75, 4986705, 'Finland', 1990], [29476, 77.1, 56943299, 'France', 1990], [31476, 75.4, 78958237, 'Germany', 1990], [28666, 78.1, 254830, 'Iceland', 1990], [1777, 57.7, 870601776, 'India', 1990], [29550, 79.1, 122249285, 'Japan', 1990], [2076, 67.9, 20194354, 'North Korea', 1990], [12087, 72, 42972254, 'South Korea', 1990], [24021, 75.4, 3397534, 'New Zealand', 1990], [43296, 76.8, 4240375, 'Norway', 1990], [10088, 70.8, 38195258, 'Poland', 1990], [19349, 69.6, 147568552, 'Russia', 1990], [10670, 67.3, 53994605, 'Turkey', 1990], [26424, 75.7, 57110117, 'United Kingdom', 1990], [37062, 75.4, 252847810, 'United States', 1990]],
        [[44056, 81.8, 23968973, 'Australia', 2015], [43294, 81.7, 35939927, 'Canada', 2015], [13334, 76.9, 1376048943, 'China', 2015], [21291, 78.5, 11389562, 'Cuba', 2015], [38923, 80.8, 5503457, 'Finland', 2015], [37599, 81.9, 64395345, 'France', 2015], [44053, 81.1, 80688545, 'Germany', 2015], [42182, 82.8, 329425, 'Iceland', 2015], [5903, 66.8, 1311050527, 'India', 2015], [36162, 83.5, 126573481, 'Japan', 2015], [1390, 71.4, 25155317, 'North Korea', 2015], [34644, 80.7, 50293439, 'South Korea', 2015], [34186, 80.6, 4528526, 'New Zealand', 2015], [64304, 81.6, 5210967, 'Norway', 2015], [24787, 77.3, 38611794, 'Poland', 2015], [23038, 73.13, 143456918, 'Russia', 2015], [19360, 76.5, 78665830, 'Turkey', 2015], [38225, 81.4, 64715810, 'United Kingdom', 2015], [53354, 79.1, 321773631, 'United States', 2015]]
    ];

    var bubbleoption = {

        legend: {
            right: 10,
            data: ['1990', '2015'],
            textStyle: {
                color: bodycolor
            }
        },
        textStyle: {
            color: bodycolor
        },
        xAxis: {
            splitLine: {
                lineStyle: {
                    type: 'dashed',
                    color: bordercolor
                }
            },
            axisLine: {
                lineStyle: {
                    color: bordercolor
                }
            }
        },
        yAxis: {
            splitLine: {
                lineStyle: {
                    type: 'dashed',
                    color: bordercolor
                }
            },
            axisLine: {
                lineStyle: {
                    color: bordercolor
                }
            },
            scale: true
        },
        series: [{
                name: '1990',
                data: data[0],
                type: 'scatter',
                symbolSize: function (data) {
                    return Math.sqrt(data[2]) / 5e2;
                },
                label: {
                    emphasis: {
                        show: true,
                        formatter: function (param) {
                            return param.data[3];
                        },
                        position: 'top'
                    }
                },
                itemStyle: {
                    normal: {
                        shadowBlur: 10,
                        shadowColor: 'rgba(120, 36, 50, 0.5)',
                        shadowOffsetY: 5,
                        color: new echarts.graphic.RadialGradient(0.4, 0.3, 1, [{
                                offset: 0,
                                color: 'rgb(251, 118, 123)'
                            }, {
                                offset: 1,
                                color: 'rgb(204, 46, 72)'
                            }])
                    }
                }
            }, {
                name: '2015',
                data: data[1],
                type: 'scatter',
                symbolSize: function (data) {
                    return Math.sqrt(data[2]) / 5e2;
                },
                label: {
                    emphasis: {
                        show: true,
                        formatter: function (param) {
                            return param.data[3];
                        },
                        position: 'top'
                    }
                },
                itemStyle: {
                    normal: {
                        shadowBlur: 10,
                        shadowColor: 'rgba(25, 100, 150, 0.5)',
                        shadowOffsetY: 5,
                        color: new echarts.graphic.RadialGradient(0.4, 0.3, 1, [{
                                offset: 0,
                                color: 'rgb(129, 227, 238)'
                            }, {
                                offset: 1,
                                color: 'rgb(25, 183, 207)'
                            }])
                    }
                }
            }]
    };
    // use configuration item and data specified to show chart
    mybubbleChart.setOption(bubbleoption);


    /////////////////////// Radar Chart //////////////////////////
    var myradarChart = echarts.init(document.getElementById('e-radar-chart'));
    // specify chart configuration item and data


    var radaroption = {
        legend: {
            data: ['Figure one', 'Figure two', 'Figure three', 'Figure four'],
            textStyle: {
                color: bodycolor
            }
        },
        radar: [
            {
                indicator: [
                    {text: 'Index one'},
                    {text: 'Index two'},
                    {text: 'Index three'},
                    {text: 'Index four'},
                    {text: 'Index five'}
                ],
                center: ['25%', '50%'],
                radius: 120,
                startAngle: 90,
                splitNumber: 4,
                shape: 'circle',
                name: {
                    formatter: '[{value}]',
                    textStyle: {
                        color: bodycolor
                    }
                },
                splitArea: {
                    areaStyle: {
                        color: ['rgba(114, 172, 209, 0.2)',
                            'rgba(114, 172, 209, 0.4)', 'rgba(114, 172, 209, 0.6)',
                            'rgba(114, 172, 209, 0.8)', 'rgba(114, 172, 209, 1)'],
                        shadowColor: 'rgba(0, 0, 0, 0.3)',
                        shadowBlur: 10
                    }
                },
                axisLine: {
                    lineStyle: {
                        color: bordercolor
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: bordercolor
                    }
                }
            },
            {
                indicator: [
                    {text: 'Language', max: 150},
                    {text: 'Mathematics', max: 150},
                    {text: 'English', max: 150},
                    {text: 'Physical', max: 120},
                    {text: 'Chemistry', max: 108},
                    {text: 'Biological', max: 72}
                ],
                center: ['75%', '50%'],
                radius: 120,
                name: {
                    formatter: '[{value}]',
                    textStyle: {
                        color: bodycolor
                    }
                }
            }
        ],
        series: [
            {
                name: 'Radar chart',
                type: 'radar',
                itemStyle: {
                    emphasis: {
                        lineStyle: {
                            width: 4
                        }
                    }
                },
                data: [
                    {
                        value: [100, 8, 0.40, -80, 2000],
                        name: 'Figure one',
                        symbol: 'rect',
                        symbolSize: 5,
                        lineStyle: {
                            normal: {
                                type: 'dashed'
                            }
                        }
                    },
                    {
                        value: [60, 5, 0.30, -100, 1500],
                        name: 'Figure two',
                        areaStyle: {
                            normal: {
                                color: 'rgba(255, 255, 255, 0.5)'
                            }
                        }
                    }
                ]
            },
            {
                name: 'Transcript',
                type: 'radar',
                radarIndex: 1,
                data: [
                    {
                        value: [120, 118, 130, 100, 99, 70],
                        name: 'Zhang San',
                        label: {
                            normal: {
                                show: true,
                                formatter: function (params) {
                                    return params.value;
                                }
                            }
                        }
                    },
                    {
                        value: [90, 113, 140, 30, 70, 60],
                        name: 'Li Si',
                        areaStyle: {
                            normal: {
                                opacity: 0.9,
                                color: new echarts.graphic.RadialGradient(0.5, 0.5, 1, [
                                    {
                                        color: '#B8D3E4',
                                        offset: 0
                                    },
                                    {
                                        color: '#72ACD1',
                                        offset: 1
                                    }
                                ])
                            }
                        }
                    }
                ]
            }
        ]
    };
    // use configuration item and data specified to show chart
    myradarChart.setOption(radaroption);

    $(window).on('resize', function () {
        if (myradarChart != null && myradarChart != undefined) {
            myradarChart.resize();
        }
         if (myChart != null && myChart != undefined) {
            myChart.resize();
        }
         if (myBarChart != null && myBarChart != undefined) {
            myBarChart.resize();
        }
         if (mydoughnutChart != null && mydoughnutChart != undefined) {
            mydoughnutChart.resize();
        }
         if (mybubbleChart != null && mybubbleChart != undefined) {
            mybubbleChart.resize();
        }
    });

})(jQuery);
