$(function () {
    'use strict'
    var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');
    var bodycolor = getComputedStyle(document.body).getPropertyValue('--bodycolor');
    var bordercolor = getComputedStyle(document.body).getPropertyValue('--bordercolor');

    if ($('body').hasClass('dark')) {
        am4core.useTheme(am4themes_amchartsdark);
    }
    if ($('body').hasClass('dark-alt')) {
        am4core.useTheme(am4themes_amchartsdark);
    }
    am4core.useTheme(am4themes_animated);


    /********** Columns with moving bullets **********/

    var chartdiv = document.getElementById("chartdiv");
    if (chartdiv) {


        var chart = am4core.create("chartdiv", am4charts.XYChart);


        chart.paddingBottom = 30;

        chart.data = [{
                "name": "Monica",
                "steps": 45688
            }, {
                "name": "Joey",
                "steps": 35781
            }, {
                "name": "Ross",
                "steps": 25464
            }, {
                "name": "Phoebe",
                "steps": 18788
            }, {
                "name": "Rachel",
                "steps": 15465
            }, {
                "name": "Chandler",
                "steps": 11561
            }];

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "name";
        categoryAxis.renderer.grid.template.strokeOpacity = 0;
        categoryAxis.renderer.minGridDistance = 10;
        categoryAxis.renderer.labels.template.dy = 35;
        categoryAxis.renderer.tooltip.dy = 35;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.inside = true;
        valueAxis.renderer.labels.template.fillOpacity = 1;
        valueAxis.renderer.grid.template.strokeOpacity = 0;
        valueAxis.min = 0;
        valueAxis.cursorTooltipEnabled = false;
        valueAxis.renderer.baseGrid.strokeOpacity = 0;

        var series = chart.series.push(new am4charts.ColumnSeries);
        series.dataFields.valueY = "steps";
        series.dataFields.categoryX = "name";
        series.tooltipText = "{valueY.value}";
        series.tooltip.pointerOrientation = "vertical";
        series.tooltip.dy = -6;
        series.columnsContainer.zIndex = 100;

        var columnTemplate = series.columns.template;
        columnTemplate.width = am4core.percent(50);
        columnTemplate.maxWidth = 66;
        columnTemplate.column.cornerRadius(60, 60, 10, 10);
        columnTemplate.strokeOpacity = 0;

        series.heatRules.push({target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46")});
        series.mainContainer.mask = undefined;

        var cursor = new am4charts.XYCursor();
        chart.cursor = cursor;
        cursor.lineX.disabled = true;
        cursor.lineY.disabled = true;
        cursor.behavior = "none";

        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
        bullet.circle.radius = 30;
        bullet.valign = "bottom";
        bullet.align = "center";
        bullet.isMeasured = true;
        bullet.interactionsEnabled = false;
        bullet.verticalCenter = "bottom";

        var hoverState = bullet.states.create("hover");

        var outlineCircle = bullet.createChild(am4core.Circle);
        outlineCircle.adapter.add("radius", function (radius, target) {
            var circleBullet = target.parent;
            return circleBullet.circle.pixelRadius + 10;
        })

        var image = bullet.createChild(am4core.Image);
        image.width = 60;
        image.height = 60;
        image.horizontalCenter = "middle";
        image.verticalCenter = "middle";

        image.adapter.add("href", function (href, target) {
            var dataItem = target.dataItem;
            if (dataItem) {
                return dataItem.categoryX.toLowerCase() + ".jpg";
            }
        })


        image.adapter.add("mask", function (mask, target) {
            var circleBullet = target.parent;
            return circleBullet.circle;
        })

        var previousBullet;
        chart.cursor.events.on("cursorpositionchanged", function (event) {
            var dataItem = series.tooltipDataItem;

            if (dataItem.column) {
                var bullet = dataItem.column.children.getIndex(1);

                if (previousBullet && previousBullet != bullet) {
                    previousBullet.isHover = false;
                }

                if (previousBullet != bullet) {

                    var hs = bullet.states.getKey("hover");
                    hs.properties.dy = -bullet.parent.pixelHeight + 30;
                    bullet.isHover = true;

                    previousBullet = bullet;
                }
            }
        })
    }




    /********** Triangle column chart **********/

    var chartdivtri = document.getElementById("chartdivtri");
    if (chartdivtri) {
        var chart = am4core.create("chartdivtri", am4charts.XYChart);
        chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

        chart.data = [{
                "country": "One",
                "value": 3025
            }, {
                "country": "Two",
                "value": 1882
            }, {
                "country": "Three",
                "value": 1809
            }, {
                "country": "Four",
                "value": 1322
            }, {
                "country": "Five",
                "value": 1122
            }, {
                "country": "Six",
                "value": -1114
            }, {
                "country": "Seven",
                "value": -984
            }, {
                "country": "Eight",
                "value": 711
            }, {
                "country": "Nine",
                "value": 665
            }, {
                "country": "Ten",
                "value": -580
            }, {
                "country": "Eleven",
                "value": 443
            }, {
                "country": "Twelve",
                "value": 441
            }];


        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = "country";
        categoryAxis.renderer.minGridDistance = 40;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        var series = chart.series.push(new am4charts.CurvedColumnSeries());
        series.dataFields.categoryX = "country";
        series.dataFields.valueY = "value";
        series.tooltipText = "{valueY.value}"
        series.columns.template.strokeOpacity = 0;
        series.columns.template.tension = 1;

        series.columns.template.fillOpacity = 0.75;

        var hoverState = series.columns.template.states.create("hover");
        hoverState.properties.fillOpacity = 1;
        hoverState.properties.tension = 0.8;

        chart.cursor = new am4charts.XYCursor();

// Add distinctive colors for each column using adapter
        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarY = new am4core.Scrollbar();


    }

    /********** Pareto diagram **********/

    var pareto_diagram = document.getElementById("pareto-diagram");
    if (pareto_diagram) {
        var chart = am4core.create("pareto-diagram", am4charts.XYChart);
        chart.scrollbarX = new am4core.Scrollbar();

// Add data
        chart.data = [{
                "country": "USA",
                "visits": 3025
            }, {
                "country": "China",
                "visits": 1882
            }, {
                "country": "Japan",
                "visits": 1809
            }, {
                "country": "Germany",
                "visits": 1322
            }, {
                "country": "UK",
                "visits": 1122
            }, {
                "country": "France",
                "visits": 1114
            }, {
                "country": "India",
                "visits": 984
            }, {
                "country": "Spain",
                "visits": 711
            }, {
                "country": "Netherlands",
                "visits": 665
            }];

        prepareParetoData();

        function prepareParetoData() {
            var total = 0;

            for (var i = 0; i < chart.data.length; i++) {
                var value = chart.data[i].visits;
                total += value;
            }

            var sum = 0;
            for (var i = 0; i < chart.data.length; i++) {
                var value = chart.data[i].visits;
                sum += value;
                chart.data[i].pareto = sum / total * 100;
            }
        }

// Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "country";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 60;
        categoryAxis.tooltip.disabled = true;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 50;
        valueAxis.min = 0;
        valueAxis.cursorTooltipEnabled = false;

// Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "visits";
        series.dataFields.categoryX = "country";
        series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
        series.columns.template.strokeWidth = 0;

        series.tooltip.pointerOrientation = "vertical";

        series.columns.template.column.cornerRadiusTopLeft = 10;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.fillOpacity = 0.8;

// on hover, make corner radiuses bigger
        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;

        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        })


        var paretoValueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        paretoValueAxis.renderer.opposite = true;
        paretoValueAxis.min = 0;
        paretoValueAxis.max = 100;
        paretoValueAxis.strictMinMax = true;
        paretoValueAxis.renderer.grid.template.disabled = true;
        paretoValueAxis.numberFormatter = new am4core.NumberFormatter();
        paretoValueAxis.numberFormatter.numberFormat = "#'%'"
        paretoValueAxis.cursorTooltipEnabled = false;

        var paretoSeries = chart.series.push(new am4charts.LineSeries())
        paretoSeries.dataFields.valueY = "pareto";
        paretoSeries.dataFields.categoryX = "country";
        paretoSeries.yAxis = paretoValueAxis;
        paretoSeries.tooltipText = "pareto: {valueY.formatNumber('#.0')}%[/]";
        paretoSeries.bullets.push(new am4charts.CircleBullet());
        paretoSeries.strokeWidth = 2;
        paretoSeries.stroke = new am4core.InterfaceColorSet().getFor("alternativeBackground");
        paretoSeries.strokeOpacity = 0.5;

// Cursor
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.behavior = "panX";
    }



    /********** Column With Rotated Series **********/

    var column_with_rotated_series = document.getElementById("column_with_rotated_series");
    if (column_with_rotated_series) {

// Create chart instance
        var chart = am4core.create("column_with_rotated_series", am4charts.XYChart);
        chart.scrollbarX = new am4core.Scrollbar();

// Add data
        chart.data = [{
                "country": "USA",
                "visits": 3025
            }, {
                "country": "China",
                "visits": 1882
            }, {
                "country": "Japan",
                "visits": 1809
            }, {
                "country": "Germany",
                "visits": 1322
            }, {
                "country": "UK",
                "visits": 1122
            }, {
                "country": "France",
                "visits": 1114
            }, {
                "country": "India",
                "visits": 984
            }, {
                "country": "Spain",
                "visits": 711
            }, {
                "country": "Netherlands",
                "visits": 665
            }, {
                "country": "Russia",
                "visits": 580
            }, {
                "country": "South Korea",
                "visits": 443
            }, {
                "country": "Canada",
                "visits": 441
            }];

// Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "country";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 50;

// Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "visits";
        series.dataFields.categoryX = "country";
        series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
        series.columns.template.strokeWidth = 0;

        series.tooltip.pointerOrientation = "vertical";

        series.columns.template.column.cornerRadiusTopLeft = 10;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.fillOpacity = 0.8;

// on hover, make corner radiuses bigger
        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;

        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

// Cursor
        chart.cursor = new am4charts.XYCursor();
    }

    /********** Stacked bar chart with negative values **********/

    var stacked_bar_chart = document.getElementById("stacked_bar_chart");
    if (stacked_bar_chart) {


// Create chart instance
        var chart = am4core.create("stacked_bar_chart", am4charts.XYChart);

// Add data
        chart.data = [{
                "age": "85+",
                "male": -0.1,
                "female": 0.3
            }, {
                "age": "80-54",
                "male": -0.2,
                "female": 0.3
            }, {
                "age": "75-79",
                "male": -0.3,
                "female": 0.6
            }, {
                "age": "70-74",
                "male": -0.5,
                "female": 0.8
            }, {
                "age": "65-69",
                "male": -0.8,
                "female": 1.0
            }, {
                "age": "60-64",
                "male": -1.1,
                "female": 1.3
            }, {
                "age": "55-59",
                "male": -1.7,
                "female": 1.9
            }, {
                "age": "50-54",
                "male": -2.2,
                "female": 2.5
            }, {
                "age": "45-49",
                "male": -2.8,
                "female": 3.0
            }, {
                "age": "40-44",
                "male": -3.4,
                "female": 3.6
            }, {
                "age": "35-39",
                "male": -4.2,
                "female": 4.1
            }, {
                "age": "30-34",
                "male": -5.2,
                "female": 4.8
            }, {
                "age": "25-29",
                "male": -5.6,
                "female": 5.1
            }, {
                "age": "20-24",
                "male": -5.1,
                "female": 5.1
            }, {
                "age": "15-19",
                "male": -3.8,
                "female": 3.8
            }, {
                "age": "10-14",
                "male": -3.2,
                "female": 3.4
            }, {
                "age": "5-9",
                "male": -4.4,
                "female": 4.1
            }, {
                "age": "0-4",
                "male": -5.0,
                "female": 4.8
            }];

// Use only absolute numbers
        chart.numberFormatter.numberFormat = "#.#s";

// Create axes
        var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "age";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.inversed = true;

        var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
        valueAxis.extraMin = 0.1;
        valueAxis.extraMax = 0.1;
        valueAxis.renderer.minGridDistance = 40;
        valueAxis.renderer.ticks.template.length = 5;
        valueAxis.renderer.ticks.template.disabled = false;
        valueAxis.renderer.ticks.template.strokeOpacity = 0.4;
        valueAxis.renderer.labels.template.adapter.add("text", function (text) {
            return text == "Male" || text == "Female" ? text : text + "%";
        })

// Create series
        var male = chart.series.push(new am4charts.ColumnSeries());
        male.dataFields.valueX = "male";
        male.dataFields.categoryY = "age";
        male.clustered = false;

        var maleLabel = male.bullets.push(new am4charts.LabelBullet());
        maleLabel.label.text = "{valueX}%";
        maleLabel.label.hideOversized = false;
        maleLabel.label.truncate = false;
        maleLabel.label.horizontalCenter = "right";
        maleLabel.label.dx = -10;

        var female = chart.series.push(new am4charts.ColumnSeries());
        female.dataFields.valueX = "female";
        female.dataFields.categoryY = "age";
        female.clustered = false;

        var femaleLabel = female.bullets.push(new am4charts.LabelBullet());
        femaleLabel.label.text = "{valueX}%";
        femaleLabel.label.hideOversized = false;
        femaleLabel.label.truncate = false;
        femaleLabel.label.horizontalCenter = "left";
        femaleLabel.label.dx = 10;

        var maleRange = valueAxis.axisRanges.create();
        maleRange.value = -10;
        maleRange.endValue = 0;
        maleRange.label.text = "Male";
        maleRange.label.fill = chart.colors.list[0];
        maleRange.label.dy = 20;
        maleRange.label.fontWeight = '600';
        maleRange.grid.strokeOpacity = 1;
        maleRange.grid.stroke = male.stroke;

        var femaleRange = valueAxis.axisRanges.create();
        femaleRange.value = 0;
        femaleRange.endValue = 10;
        femaleRange.label.text = "Female";
        femaleRange.label.fill = chart.colors.list[1];
        femaleRange.label.dy = 20;
        femaleRange.label.fontWeight = '600';
        femaleRange.grid.strokeOpacity = 1;
        femaleRange.grid.stroke = female.stroke;
    }

    /********** Data grouping 50K points **********/

    var line_datagrouping = document.getElementById("line_datagrouping");
    if (line_datagrouping) {


        var chart = am4core.create("line_datagrouping", am4charts.XYChart);
        chart.paddingRight = 20;

        var data = [];
        var visits = 10;
        for (var i = 1; i < 50000; i++) {
            visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            data.push({date: new Date(2018, 0, i), value: visits});
        }

        chart.data = data;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.grid.template.location = 0;
        dateAxis.minZoomCount = 5;


// this makes the data to be grouped
        dateAxis.groupData = true;
        dateAxis.groupCount = 500;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.dateX = "date";
        series.dataFields.valueY = "value";
        series.tooltipText = "{valueY}";
        series.tooltip.pointerOrientation = "vertical";
        series.tooltip.background.fillOpacity = 0.5;

        chart.cursor = new am4charts.XYCursor();
        chart.cursor.xAxis = dateAxis;

        var scrollbarX = new am4core.Scrollbar();
        scrollbarX.marginBottom = 20;
        chart.scrollbarX = scrollbarX;
    }



    /********** Line Chart with Scroll and Zoom **********/

    var line_scroll_zoom = document.getElementById("line_scroll_zoom");
    if (line_scroll_zoom) {

        var chart = am4core.create("line_scroll_zoom", am4charts.XYChart);

// Add data
        chart.data = generateChartData();

// Create axes
        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.minGridDistance = 50;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.valueY = "visits";
        series.dataFields.dateX = "date";
        series.strokeWidth = 2;
        series.minBulletDistance = 10;
        series.tooltipText = "{valueY}";
        series.tooltip.pointerOrientation = "vertical";
        series.tooltip.background.cornerRadius = 20;
        series.tooltip.background.fillOpacity = 0.5;
        series.tooltip.label.padding(12, 12, 12, 12)

// Add scrollbar
        chart.scrollbarX = new am4charts.XYChartScrollbar();
        chart.scrollbarX.series.push(series);

// Add cursor
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.xAxis = dateAxis;
        chart.cursor.snapToSeries = series;

        function generateChartData() {
            var chartData = [];
            var firstDate = new Date();
            firstDate.setDate(firstDate.getDate() - 1000);
            var visits = 1200;
            for (var i = 0; i < 500; i++) {
                // we create date objects here. In your data, you can have date strings
                // and then set format of your dates using chart.dataDateFormat property,
                // however when possible, use date objects, as this will speed up chart rendering.
                var newDate = new Date(firstDate);
                newDate.setDate(newDate.getDate() + i);

                visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);

                chartData.push({
                    date: newDate,
                    visits: visits
                });
            }
            return chartData;
        }
    }

    /********** Zoomable Value Axis **********/

    var line_zoomable = document.getElementById("line_zoomable");
    if (line_zoomable) {

        var chart = am4core.create("line_zoomable", am4charts.XYChart);

// Add data
        chart.data = [{
                "date": "2012-07-27",
                "value": 13
            }, {
                "date": "2012-07-28",
                "value": 11
            }, {
                "date": "2012-07-29",
                "value": 15
            }, {
                "date": "2012-07-30",
                "value": 16
            }, {
                "date": "2012-07-31",
                "value": 18
            }, {
                "date": "2012-08-01",
                "value": 13
            }, {
                "date": "2012-08-02",
                "value": 22
            }, {
                "date": "2012-08-03",
                "value": 23
            }, {
                "date": "2012-08-04",
                "value": 20
            }, {
                "date": "2012-08-05",
                "value": 17
            }, {
                "date": "2012-08-06",
                "value": 16
            }, {
                "date": "2012-08-07",
                "value": 18
            }, {
                "date": "2012-08-08",
                "value": 21
            }, {
                "date": "2012-08-09",
                "value": 26
            }, {
                "date": "2012-08-10",
                "value": 24
            }, {
                "date": "2012-08-11",
                "value": 29
            }, {
                "date": "2012-08-12",
                "value": 32
            }, {
                "date": "2012-08-13",
                "value": 18
            }, {
                "date": "2012-08-14",
                "value": 24
            }, {
                "date": "2012-08-15",
                "value": 22
            }, {
                "date": "2012-08-16",
                "value": 18
            }, {
                "date": "2012-08-17",
                "value": 19
            }, {
                "date": "2012-08-18",
                "value": 14
            }, {
                "date": "2012-08-19",
                "value": 15
            }, {
                "date": "2012-08-20",
                "value": 12
            }, {
                "date": "2012-08-21",
                "value": 8
            }, {
                "date": "2012-08-22",
                "value": 9
            }, {
                "date": "2012-08-23",
                "value": 8
            }, {
                "date": "2012-08-24",
                "value": 7
            }, {
                "date": "2012-08-25",
                "value": 5
            }, {
                "date": "2012-08-26",
                "value": 11
            }, {
                "date": "2012-08-27",
                "value": 13
            }, {
                "date": "2012-08-28",
                "value": 18
            }, {
                "date": "2012-08-29",
                "value": 20
            }, {
                "date": "2012-08-30",
                "value": 29
            }, {
                "date": "2012-08-31",
                "value": 33
            }, {
                "date": "2012-09-01",
                "value": 42
            }, {
                "date": "2012-09-02",
                "value": 35
            }, {
                "date": "2012-09-03",
                "value": 31
            }, {
                "date": "2012-09-04",
                "value": 47
            }, {
                "date": "2012-09-05",
                "value": 52
            }, {
                "date": "2012-09-06",
                "value": 46
            }, {
                "date": "2012-09-07",
                "value": 41
            }, {
                "date": "2012-09-08",
                "value": 43
            }, {
                "date": "2012-09-09",
                "value": 40
            }, {
                "date": "2012-09-10",
                "value": 39
            }, {
                "date": "2012-09-11",
                "value": 34
            }, {
                "date": "2012-09-12",
                "value": 29
            }, {
                "date": "2012-09-13",
                "value": 34
            }, {
                "date": "2012-09-14",
                "value": 37
            }, {
                "date": "2012-09-15",
                "value": 42
            }, {
                "date": "2012-09-16",
                "value": 49
            }, {
                "date": "2012-09-17",
                "value": 46
            }, {
                "date": "2012-09-18",
                "value": 47
            }, {
                "date": "2012-09-19",
                "value": 55
            }, {
                "date": "2012-09-20",
                "value": 59
            }, {
                "date": "2012-09-21",
                "value": 58
            }, {
                "date": "2012-09-22",
                "value": 57
            }, {
                "date": "2012-09-23",
                "value": 61
            }, {
                "date": "2012-09-24",
                "value": 59
            }, {
                "date": "2012-09-25",
                "value": 67
            }, {
                "date": "2012-09-26",
                "value": 65
            }, {
                "date": "2012-09-27",
                "value": 61
            }, {
                "date": "2012-09-28",
                "value": 66
            }, {
                "date": "2012-09-29",
                "value": 69
            }, {
                "date": "2012-09-30",
                "value": 71
            }, {
                "date": "2012-10-01",
                "value": 67
            }, {
                "date": "2012-10-02",
                "value": 63
            }, {
                "date": "2012-10-03",
                "value": 46
            }, {
                "date": "2012-10-04",
                "value": 32
            }, {
                "date": "2012-10-05",
                "value": 21
            }, {
                "date": "2012-10-06",
                "value": 18
            }, {
                "date": "2012-10-07",
                "value": 21
            }, {
                "date": "2012-10-08",
                "value": 28
            }, {
                "date": "2012-10-09",
                "value": 27
            }, {
                "date": "2012-10-10",
                "value": 36
            }, {
                "date": "2012-10-11",
                "value": 33
            }, {
                "date": "2012-10-12",
                "value": 31
            }, {
                "date": "2012-10-13",
                "value": 30
            }, {
                "date": "2012-10-14",
                "value": 34
            }, {
                "date": "2012-10-15",
                "value": 38
            }, {
                "date": "2012-10-16",
                "value": 37
            }, {
                "date": "2012-10-17",
                "value": 44
            }, {
                "date": "2012-10-18",
                "value": 49
            }, {
                "date": "2012-10-19",
                "value": 53
            }, {
                "date": "2012-10-20",
                "value": 57
            }, {
                "date": "2012-10-21",
                "value": 60
            }, {
                "date": "2012-10-22",
                "value": 61
            }, {
                "date": "2012-10-23",
                "value": 69
            }, {
                "date": "2012-10-24",
                "value": 67
            }, {
                "date": "2012-10-25",
                "value": 72
            }, {
                "date": "2012-10-26",
                "value": 77
            }, {
                "date": "2012-10-27",
                "value": 75
            }, {
                "date": "2012-10-28",
                "value": 70
            }, {
                "date": "2012-10-29",
                "value": 72
            }, {
                "date": "2012-10-30",
                "value": 70
            }, {
                "date": "2012-10-31",
                "value": 72
            }, {
                "date": "2012-11-01",
                "value": 73
            }, {
                "date": "2012-11-02",
                "value": 67
            }, {
                "date": "2012-11-03",
                "value": 68
            }, {
                "date": "2012-11-04",
                "value": 65
            }, {
                "date": "2012-11-05",
                "value": 71
            }, {
                "date": "2012-11-06",
                "value": 75
            }, {
                "date": "2012-11-07",
                "value": 74
            }, {
                "date": "2012-11-08",
                "value": 71
            }, {
                "date": "2012-11-09",
                "value": 76
            }, {
                "date": "2012-11-10",
                "value": 77
            }, {
                "date": "2012-11-11",
                "value": 81
            }, {
                "date": "2012-11-12",
                "value": 83
            }, {
                "date": "2012-11-13",
                "value": 80
            }, {
                "date": "2012-11-14",
                "value": 81
            }, {
                "date": "2012-11-15",
                "value": 87
            }, {
                "date": "2012-11-16",
                "value": 82
            }, {
                "date": "2012-11-17",
                "value": 86
            }, {
                "date": "2012-11-18",
                "value": 80
            }, {
                "date": "2012-11-19",
                "value": 87
            }, {
                "date": "2012-11-20",
                "value": 83
            }, {
                "date": "2012-11-21",
                "value": 85
            }, {
                "date": "2012-11-22",
                "value": 84
            }, {
                "date": "2012-11-23",
                "value": 82
            }, {
                "date": "2012-11-24",
                "value": 73
            }, {
                "date": "2012-11-25",
                "value": 71
            }, {
                "date": "2012-11-26",
                "value": 75
            }, {
                "date": "2012-11-27",
                "value": 79
            }, {
                "date": "2012-11-28",
                "value": 70
            }, {
                "date": "2012-11-29",
                "value": 73
            }, {
                "date": "2012-11-30",
                "value": 61
            }, {
                "date": "2012-12-01",
                "value": 62
            }, {
                "date": "2012-12-02",
                "value": 66
            }, {
                "date": "2012-12-03",
                "value": 65
            }, {
                "date": "2012-12-04",
                "value": 73
            }, {
                "date": "2012-12-05",
                "value": 79
            }, {
                "date": "2012-12-06",
                "value": 78
            }, {
                "date": "2012-12-07",
                "value": 78
            }, {
                "date": "2012-12-08",
                "value": 78
            }, {
                "date": "2012-12-09",
                "value": 74
            }, {
                "date": "2012-12-10",
                "value": 73
            }, {
                "date": "2012-12-11",
                "value": 75
            }, {
                "date": "2012-12-12",
                "value": 70
            }, {
                "date": "2012-12-13",
                "value": 77
            }, {
                "date": "2012-12-14",
                "value": 67
            }, {
                "date": "2012-12-15",
                "value": 62
            }, {
                "date": "2012-12-16",
                "value": 64
            }, {
                "date": "2012-12-17",
                "value": 61
            }, {
                "date": "2012-12-18",
                "value": 59
            }, {
                "date": "2012-12-19",
                "value": 53
            }, {
                "date": "2012-12-20",
                "value": 54
            }, {
                "date": "2012-12-21",
                "value": 56
            }, {
                "date": "2012-12-22",
                "value": 59
            }, {
                "date": "2012-12-23",
                "value": 58
            }, {
                "date": "2012-12-24",
                "value": 55
            }, {
                "date": "2012-12-25",
                "value": 52
            }, {
                "date": "2012-12-26",
                "value": 54
            }, {
                "date": "2012-12-27",
                "value": 50
            }, {
                "date": "2012-12-28",
                "value": 50
            }, {
                "date": "2012-12-29",
                "value": 51
            }, {
                "date": "2012-12-30",
                "value": 52
            }, {
                "date": "2012-12-31",
                "value": 58
            }, {
                "date": "2013-01-01",
                "value": 60
            }, {
                "date": "2013-01-02",
                "value": 67
            }, {
                "date": "2013-01-03",
                "value": 64
            }, {
                "date": "2013-01-04",
                "value": 66
            }, {
                "date": "2013-01-05",
                "value": 60
            }, {
                "date": "2013-01-06",
                "value": 63
            }, {
                "date": "2013-01-07",
                "value": 61
            }, {
                "date": "2013-01-08",
                "value": 60
            }, {
                "date": "2013-01-09",
                "value": 65
            }, {
                "date": "2013-01-10",
                "value": 75
            }, {
                "date": "2013-01-11",
                "value": 77
            }, {
                "date": "2013-01-12",
                "value": 78
            }, {
                "date": "2013-01-13",
                "value": 70
            }, {
                "date": "2013-01-14",
                "value": 70
            }, {
                "date": "2013-01-15",
                "value": 73
            }, {
                "date": "2013-01-16",
                "value": 71
            }, {
                "date": "2013-01-17",
                "value": 74
            }, {
                "date": "2013-01-18",
                "value": 78
            }, {
                "date": "2013-01-19",
                "value": 85
            }, {
                "date": "2013-01-20",
                "value": 82
            }, {
                "date": "2013-01-21",
                "value": 83
            }, {
                "date": "2013-01-22",
                "value": 88
            }, {
                "date": "2013-01-23",
                "value": 85
            }, {
                "date": "2013-01-24",
                "value": 85
            }, {
                "date": "2013-01-25",
                "value": 80
            }, {
                "date": "2013-01-26",
                "value": 87
            }, {
                "date": "2013-01-27",
                "value": 84
            }, {
                "date": "2013-01-28",
                "value": 83
            }, {
                "date": "2013-01-29",
                "value": 84
            }, {
                "date": "2013-01-30",
                "value": 81
            }];

// Create axes
        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.grid.template.location = 0;
        dateAxis.renderer.minGridDistance = 50;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.valueY = "value";
        series.dataFields.dateX = "date";
        series.strokeWidth = 3;
        series.fillOpacity = 0.5;

// Add vertical scrollbar
        chart.scrollbarY = new am4core.Scrollbar();
        chart.scrollbarY.marginLeft = 0;

// Add cursor
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.behavior = "zoomY";
        chart.cursor.lineX.disabled = true;

    }

    /********** Line With Custom Bullets **********/

    var line_custom_bullets = document.getElementById("line_custom_bullets");
    if (line_custom_bullets) {

// Create chart instance
        var chart = am4core.create("line_custom_bullets", am4charts.XYChart);

// Add data
        chart.data = [{
                "date": new Date(2018, 3, 20),
                "value": 90
            }, {
                "date": new Date(2018, 3, 21),
                "value": 102
            }, {
                "date": new Date(2018, 3, 22),
                "value": 65
            }, {
                "date": new Date(2018, 3, 23),
                "value": 62
            }, {
                "date": new Date(2018, 3, 24),
                "value": 55
            }, {
                "date": new Date(2018, 3, 25),
                "value": 81
            }];

// Create axes
        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());

// Create value axis
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
        var lineSeries = chart.series.push(new am4charts.LineSeries());
        lineSeries.dataFields.valueY = "value";
        lineSeries.dataFields.dateX = "date";
        lineSeries.name = "Sales";
        lineSeries.strokeWidth = 3;

// Add simple bullet
        var bullet = lineSeries.bullets.push(new am4charts.Bullet());
        var image = bullet.createChild(am4core.Image);
        image.href = "https://www.amcharts.com/lib/images/star.svg";
        image.width = 30;
        image.height = 30;
        image.horizontalCenter = "middle";
        image.verticalCenter = "middle";
    }


    /********** Reversed Value Axis **********/

    var line_reversed_axis = document.getElementById("line_reversed_axis");
    if (line_reversed_axis) {

// Create chart instance
        var chart = am4core.create("line_reversed_axis", am4charts.XYChart);

// Add data
        chart.data = [{
                "year": "1930",
                "italy": 1,
                "germany": 5,
                "uk": 3
            }, {
                "year": "1934",
                "italy": 1,
                "germany": 2,
                "uk": 6
            }, {
                "year": "1938",
                "italy": 2,
                "germany": 3,
                "uk": 1
            }, {
                "year": "1950",
                "italy": 3,
                "germany": 4,
                "uk": 1
            }, {
                "year": "1954",
                "italy": 5,
                "germany": 1,
                "uk": 2
            }, {
                "year": "1958",
                "italy": 3,
                "germany": 2,
                "uk": 1
            }, {
                "year": "1962",
                "italy": 1,
                "germany": 2,
                "uk": 3
            }, {
                "year": "1966",
                "italy": 2,
                "germany": 1,
                "uk": 5
            }, {
                "year": "1970",
                "italy": 3,
                "germany": 5,
                "uk": 2
            }, {
                "year": "1974",
                "italy": 4,
                "germany": 3,
                "uk": 6
            }, {
                "year": "1978",
                "italy": 1,
                "germany": 2,
                "uk": 4
            }];

// Create category axis
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "year";
        categoryAxis.renderer.opposite = true;

// Create value axis
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.inversed = true;
        valueAxis.title.text = "Place taken";
        valueAxis.renderer.minLabelPosition = 0.01;

// Create series
        var series1 = chart.series.push(new am4charts.LineSeries());
        series1.dataFields.valueY = "italy";
        series1.dataFields.categoryX = "year";
        series1.name = "Italy";
        series1.strokeWidth = 3;
        series1.bullets.push(new am4charts.CircleBullet());
        series1.tooltipText = "Place taken by {name} in {categoryX}: {valueY}";
        series1.legendSettings.valueText = "{valueY}";
        series1.visible = false;

        var series2 = chart.series.push(new am4charts.LineSeries());
        series2.dataFields.valueY = "germany";
        series2.dataFields.categoryX = "year";
        series2.name = 'Germany';
        series2.strokeWidth = 3;
        series2.bullets.push(new am4charts.CircleBullet());
        series2.tooltipText = "Place taken by {name} in {categoryX}: {valueY}";
        series2.legendSettings.valueText = "{valueY}";

        var series3 = chart.series.push(new am4charts.LineSeries());
        series3.dataFields.valueY = "uk";
        series3.dataFields.categoryX = "year";
        series3.name = 'United Kingdom';
        series3.strokeWidth = 3;
        series3.bullets.push(new am4charts.CircleBullet());
        series3.tooltipText = "Place taken by {name} in {categoryX}: {valueY}";
        series3.legendSettings.valueText = "{valueY}";

// Add chart cursor
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.behavior = "zoomY";

// Add legend
        chart.legend = new am4charts.Legend();
    }



    /********** Reversed Value Axis **********/

    var line_live_data = document.getElementById("line_live_data");
    if (line_live_data) {

        var chart = am4core.create("line_live_data", am4charts.XYChart);
        chart.hiddenState.properties.opacity = 0;

        chart.padding(0, 0, 0, 0);

        chart.zoomOutButton.disabled = true;

        var data = [];
        var visits = 10;
        var i = 0;

        for (i = 0; i <= 30; i++) {
            visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            data.push({date: new Date().setSeconds(i - 30), value: visits});
        }

        chart.data = data;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.grid.template.location = 0;
        dateAxis.renderer.minGridDistance = 30;
        dateAxis.dateFormats.setKey("second", "ss");
        dateAxis.periodChangeDateFormats.setKey("second", "[bold]h:mm a");
        dateAxis.periodChangeDateFormats.setKey("minute", "[bold]h:mm a");
        dateAxis.periodChangeDateFormats.setKey("hour", "[bold]h:mm a");
        dateAxis.renderer.inside = true;
        dateAxis.renderer.axisFills.template.disabled = true;
        dateAxis.renderer.ticks.template.disabled = true;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.interpolationDuration = 500;
        valueAxis.rangeChangeDuration = 500;
        valueAxis.renderer.inside = true;
        valueAxis.renderer.minLabelPosition = 0.05;
        valueAxis.renderer.maxLabelPosition = 0.95;
        valueAxis.renderer.axisFills.template.disabled = true;
        valueAxis.renderer.ticks.template.disabled = true;

        var series = chart.series.push(new am4charts.LineSeries());

        series.dataFields.dateX = "date";
        series.dataFields.valueY = "value";
        series.interpolationDuration = 500;
        series.defaultState.transitionDuration = 0;
        series.tensionX = 0.8;

        chart.events.on("datavalidated", function () {
            dateAxis.zoom({start: 1 / 15, end: 1.2}, false, true);
        });

        dateAxis.interpolationDuration = 500;
        dateAxis.rangeChangeDuration = 500;
        var interval;
        document.addEventListener("visibilitychange", function () {
            if (document.hidden) {
                if (interval) {
                    clearInterval(interval);
                }
            } else {
                startInterval();
            }
        }, false);

// add data

        function startInterval() {
            var realdata = data[data.length - 1].date;
            interval = setInterval(function () {
                visits =
                        visits + Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);

                var lastdataItem = series.dataItems.getIndex(series.dataItems.length - 1);
                realdata = realdata + 1000;

                chart.addData(
                        {date: new Date(realdata), value: visits},
                        1
                        );
            }, 1000);
        }

        startInterval();

// all the below is optional, makes some fancy effects
// gradient fill of the series
        series.fillOpacity = 1;
        var gradient = new am4core.LinearGradient();
        gradient.addColor(chart.colors.getIndex(0), 0.2);
        gradient.addColor(chart.colors.getIndex(0), 0);
        series.fill = gradient;

// this makes date axis labels to fade out
        dateAxis.renderer.labels.template.adapter.add("fillOpacity", function (fillOpacity, target) {
            var dataItem = target.dataItem;
            return dataItem.position;
        })

// need to set this, otherwise fillOpacity is not changed and not set
        dateAxis.events.on("validated", function () {
            am4core.iter.each(dateAxis.renderer.labels.iterator(), function (label) {
                label.fillOpacity = label.fillOpacity;
            })
        })

// this makes date axis labels which are at equal minutes to be rotated
        dateAxis.renderer.labels.template.adapter.add("rotation", function (rotation, target) {
            var dataItem = target.dataItem;
            if (dataItem.date && dataItem.date.getTime() == am4core.time.round(new Date(dataItem.date.getTime()), "minute").getTime()) {
                target.verticalCenter = "middle";
                target.horizontalCenter = "left";
                return -90;
            } else {
                target.verticalCenter = "bottom";
                target.horizontalCenter = "middle";
                return 0;
            }
        })

// bullet at the front of the line
        var bullet = series.createChild(am4charts.CircleBullet);
        bullet.circle.radius = 5;
        bullet.fillOpacity = 1;
        bullet.fill = chart.colors.getIndex(0);
        bullet.isMeasured = false;

        series.events.on("validated", function () {
            bullet.moveTo(series.dataItems.last.point);
            bullet.validatePosition();
        });

    }


    /********** Donut with radial gradient **********/

    var pie_gradient = document.getElementById("pie_gradient");
    if (pie_gradient) {

// Create chart instance
        var chartpie = am4core.create("pie_gradient", am4charts.PieChart);

// Add data
        chartpie.data = [{
                "country": "Lithuania",
                "litres": 501.9
            }, {
                "country": "Czech Republic",
                "litres": 301.9
            }, {
                "country": "Ireland",
                "litres": 201.1
            }, {
                "country": "Germany",
                "litres": 165.8
            }, {
                "country": "Australia",
                "litres": 139.9
            }, {
                "country": "Austria",
                "litres": 128.3
            }, {
                "country": "UK",
                "litres": 99
            }, {
                "country": "Belgium",
                "litres": 60
            }, {
                "country": "The Netherlands",
                "litres": 50
            }];

// Add and configure Series
        var pieSeries = chartpie.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";
        pieSeries.innerRadius = am4core.percent(50);
        pieSeries.ticks.template.disabled = true;
        pieSeries.labels.template.disabled = true;

        var rgm = new am4core.RadialGradientModifier();
        rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, -0.5);
        pieSeries.slices.template.fillModifier = rgm;
        pieSeries.slices.template.strokeModifier = rgm;
        pieSeries.slices.template.strokeOpacity = 0.4;
        pieSeries.slices.template.strokeWidth = 0;

        chartpie.legend = new am4charts.Legend();
        chartpie.legend.position = "right";
    }


    /********** Animated Time-Line Pie Chart **********/

    var pie_animated_time_line = document.getElementById("pie_animated_time_line");
    if (pie_animated_time_line) {
        var chartData = {
            "1995": [
                {"sector": "Agriculture", "size": 6.6},
                {"sector": "Mining and Quarrying", "size": 0.6},
                {"sector": "Manufacturing", "size": 23.2},
                {"sector": "Electricity and Water", "size": 2.2},
                {"sector": "Construction", "size": 4.5},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 14.6},
                {"sector": "Transport and Communication", "size": 9.3},
                {"sector": "Finance, real estate and business services", "size": 22.5}],
            "1996": [
                {"sector": "Agriculture", "size": 6.4},
                {"sector": "Mining and Quarrying", "size": 0.5},
                {"sector": "Manufacturing", "size": 22.4},
                {"sector": "Electricity and Water", "size": 2},
                {"sector": "Construction", "size": 4.2},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 14.8},
                {"sector": "Transport and Communication", "size": 9.7},
                {"sector": "Finance, real estate and business services", "size": 22}],
            "1997": [
                {"sector": "Agriculture", "size": 6.1},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 20.9},
                {"sector": "Electricity and Water", "size": 1.8},
                {"sector": "Construction", "size": 4.2},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 13.7},
                {"sector": "Transport and Communication", "size": 9.4},
                {"sector": "Finance, real estate and business services", "size": 22.1}],
            "1998": [
                {"sector": "Agriculture", "size": 6.2},
                {"sector": "Mining and Quarrying", "size": 0.3},
                {"sector": "Manufacturing", "size": 21.4},
                {"sector": "Electricity and Water", "size": 1.9},
                {"sector": "Construction", "size": 4.2},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 14.5},
                {"sector": "Transport and Communication", "size": 10.6},
                {"sector": "Finance, real estate and business services", "size": 23}],
            "1999": [
                {"sector": "Agriculture", "size": 5.7},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 20},
                {"sector": "Electricity and Water", "size": 1.8},
                {"sector": "Construction", "size": 4.4},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 15.2},
                {"sector": "Transport and Communication", "size": 10.5},
                {"sector": "Finance, real estate and business services", "size": 24.7}],
            "2000": [
                {"sector": "Agriculture", "size": 5.1},
                {"sector": "Mining and Quarrying", "size": 0.3},
                {"sector": "Manufacturing", "size": 20.4},
                {"sector": "Electricity and Water", "size": 1.7},
                {"sector": "Construction", "size": 4},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 16.3},
                {"sector": "Transport and Communication", "size": 10.7},
                {"sector": "Finance, real estate and business services", "size": 24.6}],
            "2001": [
                {"sector": "Agriculture", "size": 5.5},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 20.3},
                {"sector": "Electricity and Water", "size": 1.6},
                {"sector": "Construction", "size": 3.1},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 16.3},
                {"sector": "Transport and Communication", "size": 10.7},
                {"sector": "Finance, real estate and business services", "size": 25.8}],
            "2002": [
                {"sector": "Agriculture", "size": 5.7},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 20.5},
                {"sector": "Electricity and Water", "size": 1.6},
                {"sector": "Construction", "size": 3.6},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 16.1},
                {"sector": "Transport and Communication", "size": 10.7},
                {"sector": "Finance, real estate and business services", "size": 26}],
            "2003": [
                {"sector": "Agriculture", "size": 4.9},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 19.4},
                {"sector": "Electricity and Water", "size": 1.5},
                {"sector": "Construction", "size": 3.3},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 16.2},
                {"sector": "Transport and Communication", "size": 11},
                {"sector": "Finance, real estate and business services", "size": 27.5}],
            "2004": [
                {"sector": "Agriculture", "size": 4.7},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 18.4},
                {"sector": "Electricity and Water", "size": 1.4},
                {"sector": "Construction", "size": 3.3},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 16.9},
                {"sector": "Transport and Communication", "size": 10.6},
                {"sector": "Finance, real estate and business services", "size": 28.1}],
            "2005": [
                {"sector": "Agriculture", "size": 4.3},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 18.1},
                {"sector": "Electricity and Water", "size": 1.4},
                {"sector": "Construction", "size": 3.9},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 15.7},
                {"sector": "Transport and Communication", "size": 10.6},
                {"sector": "Finance, real estate and business services", "size": 29.1}],
            "2006": [
                {"sector": "Agriculture", "size": 4},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 16.5},
                {"sector": "Electricity and Water", "size": 1.3},
                {"sector": "Construction", "size": 3.7},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 14.2},
                {"sector": "Transport and Communication", "size": 12.1},
                {"sector": "Finance, real estate and business services", "size": 29.1}],
            "2007": [
                {"sector": "Agriculture", "size": 4.7},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 16.2},
                {"sector": "Electricity and Water", "size": 1.2},
                {"sector": "Construction", "size": 4.1},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 15.6},
                {"sector": "Transport and Communication", "size": 11.2},
                {"sector": "Finance, real estate and business services", "size": 30.4}],
            "2008": [
                {"sector": "Agriculture", "size": 4.9},
                {"sector": "Mining and Quarrying", "size": 0.3},
                {"sector": "Manufacturing", "size": 17.2},
                {"sector": "Electricity and Water", "size": 1.4},
                {"sector": "Construction", "size": 5.1},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 15.4},
                {"sector": "Transport and Communication", "size": 11.1},
                {"sector": "Finance, real estate and business services", "size": 28.4}],
            "2009": [
                {"sector": "Agriculture", "size": 4.7},
                {"sector": "Mining and Quarrying", "size": 0.3},
                {"sector": "Manufacturing", "size": 16.4},
                {"sector": "Electricity and Water", "size": 1.9},
                {"sector": "Construction", "size": 4.9},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 15.5},
                {"sector": "Transport and Communication", "size": 10.9},
                {"sector": "Finance, real estate and business services", "size": 27.9}],
            "2010": [
                {"sector": "Agriculture", "size": 4.2},
                {"sector": "Mining and Quarrying", "size": 0.3},
                {"sector": "Manufacturing", "size": 16.2},
                {"sector": "Electricity and Water", "size": 2.2},
                {"sector": "Construction", "size": 4.3},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 15.7},
                {"sector": "Transport and Communication", "size": 10.2},
                {"sector": "Finance, real estate and business services", "size": 28.8}],
            "2011": [
                {"sector": "Agriculture", "size": 4.1},
                {"sector": "Mining and Quarrying", "size": 0.3},
                {"sector": "Manufacturing", "size": 14.9},
                {"sector": "Electricity and Water", "size": 2.3},
                {"sector": "Construction", "size": 5},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 17.3},
                {"sector": "Transport and Communication", "size": 10.2},
                {"sector": "Finance, real estate and business services", "size": 27.2}],
            "2012": [
                {"sector": "Agriculture", "size": 3.8},
                {"sector": "Mining and Quarrying", "size": 0.3},
                {"sector": "Manufacturing", "size": 14.9},
                {"sector": "Electricity and Water", "size": 2.6},
                {"sector": "Construction", "size": 5.1},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 15.8},
                {"sector": "Transport and Communication", "size": 10.7},
                {"sector": "Finance, real estate and business services", "size": 28}],
            "2013": [
                {"sector": "Agriculture", "size": 3.7},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 14.9},
                {"sector": "Electricity and Water", "size": 2.7},
                {"sector": "Construction", "size": 5.7},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 16.5},
                {"sector": "Transport and Communication", "size": 10.5},
                {"sector": "Finance, real estate and business services", "size": 26.6}],
            "2014": [
                {"sector": "Agriculture", "size": 3.9},
                {"sector": "Mining and Quarrying", "size": 0.2},
                {"sector": "Manufacturing", "size": 14.5},
                {"sector": "Electricity and Water", "size": 2.7},
                {"sector": "Construction", "size": 5.6},
                {"sector": "Trade (Wholesale, Retail, Motor)", "size": 16.6},
                {"sector": "Transport and Communication", "size": 10.5},
                {"sector": "Finance, real estate and business services", "size": 26.5}]
        };

// Create chart instance
        var chartanimated = am4core.create("pie_animated_time_line", am4charts.PieChart);

// Add data
        chartanimated.data = [
            {"sector": "Agriculture", "size": 6.6},
            {"sector": "Mining and Quarrying", "size": 0.6},
            {"sector": "Manufacturing", "size": 23.2},
            {"sector": "Electricity and Water", "size": 2.2},
            {"sector": "Construction", "size": 4.5},
            {"sector": "Trade (Wholesale, Retail, Motor)", "size": 14.6},
            {"sector": "Transport and Communication", "size": 9.3},
            {"sector": "Finance, real estate and business services", "size": 22.5}
        ];

// Add label
        chartanimated.innerRadius = 100;
        var label = chartanimated.seriesContainer.createChild(am4core.Label);
        label.text = "1995";
        label.horizontalCenter = "middle";
        label.verticalCenter = "middle";
        label.fontSize = 50;

// Add and configure Series
        var pieSeries = chartanimated.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "size";
        pieSeries.dataFields.category = "sector";

// Animate chart data
        var currentYear = 1995;
        function getCurrentData() {
            label.text = currentYear;
            var data = chartData[currentYear];
            currentYear++;
            if (currentYear > 2014)
                currentYear = 1995;
            return data;
        }

        function loop() {
            //chart.allLabels[0].text = currentYear;
            var data = getCurrentData();
            for (var i = 0; i < data.length; i++) {
                chartanimated.data[i].size = data[i].size;
            }
            chartanimated.invalidateRawData();
            chartanimated.setTimeout(loop, 4000);
        }

        loop();
    }


    /********** 3D Pie Chart **********/

    var pie_3d = document.getElementById("pie_3d");
    if (pie_3d) {

        var chart = am4core.create("pie_3d", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.legend = new am4charts.Legend();

        chart.data = [
            {
                country: "Lithuania",
                litres: 501.9
            },
            {
                country: "Czech Republic",
                litres: 301.9
            },
            {
                country: "Ireland",
                litres: 201.1
            },
            {
                country: "Germany",
                litres: 165.8
            },
            {
                country: "Australia",
                litres: 139.9
            },
            {
                country: "Austria",
                litres: 128.3
            },
            {
                country: "UK",
                litres: 99
            }
        ];

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "litres";
        series.dataFields.category = "country";
    }


    /********** Pie chart with broken down slices **********/

    var pie_broken_down = document.getElementById("pie_broken_down");
    if (pie_broken_down) {

// Create chart instance
        var chart = am4core.create("pie_broken_down", am4charts.PieChart);

// Set data
        var selected;
        var types = [{
                type: "Fossil Energy",
                percent: 70,
                color: chart.colors.getIndex(0),
                subs: [{
                        type: "Oil",
                        percent: 15
                    }, {
                        type: "Coal",
                        percent: 35
                    }, {
                        type: "Nuclear",
                        percent: 20
                    }]
            }, {
                type: "Green Energy",
                percent: 30,
                color: chart.colors.getIndex(1),
                subs: [{
                        type: "Hydro",
                        percent: 15
                    }, {
                        type: "Wind",
                        percent: 10
                    }, {
                        type: "Other",
                        percent: 5
                    }]
            }];

// Add data
        chart.data = generateChartData();

// Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "percent";
        pieSeries.dataFields.category = "type";
        pieSeries.slices.template.propertyFields.fill = "color";
        pieSeries.slices.template.propertyFields.isActive = "pulled";
        pieSeries.slices.template.strokeWidth = 0;

        function generateChartData() {
            var chartData = [];
            for (var i = 0; i < types.length; i++) {
                if (i == selected) {
                    for (var x = 0; x < types[i].subs.length; x++) {
                        chartData.push({
                            type: types[i].subs[x].type,
                            percent: types[i].subs[x].percent,
                            color: types[i].color,
                            pulled: true
                        });
                    }
                } else {
                    chartData.push({
                        type: types[i].type,
                        percent: types[i].percent,
                        color: types[i].color,
                        id: i
                    });
                }
            }
            return chartData;
        }

        pieSeries.slices.template.events.on("hit", function (event) {
            if (event.target.dataItem.dataContext.id != undefined) {
                selected = event.target.dataItem.dataContext.id;
            } else {
                selected = undefined;
            }
            chart.data = generateChartData();
        });

    }


    /********** Pie chart with broken down slices **********/

    var pie_radius_chart = document.getElementById("pie_radius_chart");
    if (pie_radius_chart) {

// Create chart
        var chart = am4core.create("pie_radius_chart", am4charts.PieChart);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.data = [
            {
                country: "Lithuania",
                value: 260
            },
            {
                country: "Czech Republic",
                value: 230
            },
            {
                country: "Ireland",
                value: 200
            },
            {
                country: "Germany",
                value: 165
            },
            {
                country: "Australia",
                value: 139
            },
            {
                country: "Austria",
                value: 128
            }
        ];

        var series = chart.series.push(new am4charts.PieSeries());
        series.dataFields.value = "value";
        series.dataFields.radiusValue = "value";
        series.dataFields.category = "country";
        series.slices.template.cornerRadius = 6;
        series.colors.step = 3;

        series.hiddenState.properties.endAngle = -90;

        chart.legend = new am4charts.Legend();

    }

    /********** Pie chart with broken down slices **********/

    var pie_variable_height_3d = document.getElementById("pie_variable_height_3d");
    if (pie_variable_height_3d) {

        var chart3d = am4core.create("pie_variable_height_3d", am4charts.PieChart3D);
        chart3d.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart3d.data = [
            {
                country: "Lithuania",
                litres: 501.9
            },
            {
                country: "Czech Republic",
                litres: 301.9
            },
            {
                country: "Ireland",
                litres: 201.1
            },
            {
                country: "Germany",
                litres: 165.8
            },
            {
                country: "Australia",
                litres: 139.9
            },
            {
                country: "Austria",
                litres: 128.3
            }
        ];

        chart3d.innerRadius = am4core.percent(40);
        chart3d.depth = 120;

        chart3d.legend = new am4charts.Legend();

        var series = chart3d.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "litres";
        series.dataFields.depthValue = "litres";
        series.dataFields.category = "country";
        series.slices.template.cornerRadius = 5;
        series.colors.step = 3;
    }



    /********** XY chart with date-based axis **********/

    var xy_date = document.getElementById("xy_date");
    if (xy_date) {

// Create chart instance
        var chart = am4core.create("xy_date", am4charts.XYChart);

// Add data
        chart.data = [{
                "date": "2015-01-01",
                "ay": 6.5,
                "by": 2.2,
                "aValue": 15,
                "bValue": 10
            }, {
                "date": "2015-01-02",
                "ay": 12.3,
                "by": 4.9,
                "aValue": 8,
                "bValue": 3
            }, {
                "date": "2015-01-03",
                "ay": 12.3,
                "by": 5.1,
                "aValue": 16,
                "bValue": 4
            }, {
                "date": "2015-01-04",
                "ay": 2.8,
                "by": 13.3,
                "aValue": 9,
                "bValue": 13
            }, {
                "date": "2015-01-05",
                "ay": 3.5,
                "by": 6.1,
                "aValue": 5,
                "bValue": 2
            }, {
                "date": "2015-01-06",
                "ay": 5.1,
                "by": 8.3,
                "aValue": 10,
                "bValue": 17
            }, {
                "date": "2015-01-07",
                "ay": 6.7,
                "by": 10.5,
                "aValue": 3,
                "bValue": 10
            }, {
                "date": "2015-01-08",
                "ay": 8,
                "by": 12.3,
                "aValue": 5,
                "bValue": 13
            }, {
                "date": "2015-01-09",
                "ay": 8.9,
                "by": 4.5,
                "aValue": 8,
                "bValue": 11
            }, {
                "date": "2015-01-10",
                "ay": 9.7,
                "by": 15,
                "aValue": 15,
                "bValue": 10
            }, {
                "date": "2015-01-11",
                "ay": 10.4,
                "by": 10.8,
                "aValue": 1,
                "bValue": 11
            }, {
                "date": "2015-01-12",
                "ay": 1.7,
                "by": 19,
                "aValue": 12,
                "bValue": 3
            }];

// Create axes
        var xAxis = chart.xAxes.push(new am4charts.DateAxis());
        xAxis.dataFields.category = "category";
        xAxis.renderer.grid.template.location = 0;
//xAxis.renderer.minGridDistance = 30;

        var yAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
        var series1 = chart.series.push(new am4charts.LineSeries());
        series1.dataFields.valueY = "ay";
        series1.dataFields.dateX = "date";
        series1.dataFields.value = "aValue";
        series1.strokeOpacity = 0;
        series1.cursorTooltipEnabled = false;

        var bullet1 = series1.bullets.push(new am4charts.CircleBullet());
        bullet1.tooltipText = "x:{valueX} y:{valueY}";
        series1.heatRules.push({
            target: bullet1.circle,
            min: 10,
            max: 60,
            property: "radius"
        });

        var series2 = chart.series.push(new am4charts.LineSeries());
        series2.dataFields.valueY = "by";
        series2.dataFields.dateX = "date";
        series2.dataFields.value = "bValue";
        series2.strokeOpacity = 0;
        series2.cursorTooltipEnabled = false;

        var bullet2 = series2.bullets.push(new am4charts.Bullet());
        bullet2.tooltipText = "x:{valueX} y:{valueY}";

        var rectangle2 = bullet2.createChild(am4core.Rectangle);
        rectangle2.verticalCenter = "middle";
        rectangle2.horizontalCenter = "middle";
        rectangle2.width = 10;
        rectangle2.height = 10;
        rectangle2.rotation = 45;
        rectangle2.stroke = am4core.color("#fff");
        rectangle2.strokeWidth = 1;
        rectangle2.nonScalingStroke = true;
        series2.heatRules.push({
            target: rectangle2,
            min: 1,
            max: 6,
            property: "scale"
        });

// Add scrollbars
        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarY = new am4core.Scrollbar();

// Add cursor
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.behavior = "zoomXY";

    }


    /********** XY chart with date-based axis **********/

    var xy_line_graph = document.getElementById("xy_line_graph");
    if (xy_line_graph) {

// Create chart instance
        var chart = am4core.create("xy_line_graph", am4charts.XYChart);

// Add data
        chart.data = [{
                "x": 1,
                "ay": 6.5,
                "by": 2.2,
                "aValue": 15,
                "bValue": 10
            }, {
                "x": 2,
                "ay": 12.3,
                "by": 4.9,
                "aValue": 8,
                "bValue": 3
            }, {
                "x": 3,
                "ay": 12.3,
                "by": 5.1,
                "aValue": 16,
                "bValue": 4
            }, {
                "x": 5,
                "ay": 2.9,
                "aValue": 9
            }, {
                "x": 7,
                "by": 8.3,
                "bValue": 13
            }, {
                "x": 10,
                "ay": 2.8,
                "by": 13.3,
                "aValue": 9,
                "bValue": 13
            }, {
                "x": 12,
                "ay": 3.5,
                "by": 6.1,
                "aValue": 5,
                "bValue": 2
            }, {
                "x": 13,
                "ay": 5.1,
                "aValue": 10
            }, {
                "x": 15,
                "ay": 6.7,
                "by": 10.5,
                "aValue": 3,
                "bValue": 10
            }, {
                "x": 16,
                "ay": 8,
                "by": 12.3,
                "aValue": 5,
                "bValue": 13
            }, {
                "x": 20,
                "by": 4.5,
                "bValue": 11
            }, {
                "x": 22,
                "ay": 9.7,
                "by": 15,
                "aValue": 15,
                "bValue": 10
            }, {
                "x": 23,
                "ay": 10.4,
                "by": 10.8,
                "aValue": 1,
                "bValue": 11
            }, {
                "x": 24,
                "ay": 1.7,
                "by": 19,
                "aValue": 12,
                "bValue": 3
            }];

// Create axes
        var xAxis = chart.xAxes.push(new am4charts.ValueAxis());
        xAxis.renderer.minGridDistance = 40;

// Create value axis
        var yAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
        var series1 = chart.series.push(new am4charts.LineSeries());
        series1.dataFields.valueX = "x";
        series1.dataFields.valueY = "ay";
        series1.dataFields.value = "aValue";
        series1.strokeWidth = 2;

        var bullet1 = series1.bullets.push(new am4charts.CircleBullet());
        series1.heatRules.push({
            target: bullet1.circle,
            min: 5,
            max: 20,
            property: "radius"
        });

        bullet1.tooltipText = "{valueX} x {valueY}: [bold]{value}[/]";

        var series2 = chart.series.push(new am4charts.LineSeries());
        series2.dataFields.valueX = "x";
        series2.dataFields.valueY = "by";
        series2.dataFields.value = "bValue";
        series2.strokeWidth = 2;

        var bullet2 = series2.bullets.push(new am4charts.CircleBullet());
        series2.heatRules.push({
            target: bullet2.circle,
            min: 5,
            max: 20,
            property: "radius"
        });

        bullet2.tooltipText = "{valueX} x {valueY}: [bold]{value}[/]";

//scrollbars
        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarY = new am4core.Scrollbar();

    }


    /********** Stock Chart **********/

    var stock_chart = document.getElementById("stock_chart");
    if (stock_chart) {

// Create chart
        var chart = am4core.create("stock_chart", am4charts.XYChart);
        chart.padding(0, 15, 0, 15);

// Load external data
        chart.dataSource.url = "https://www.amcharts.com/wp-content/uploads/assets/stock/MSFT.csv";
        chart.dataSource.parser = new am4core.CSVParser();
        chart.dataSource.parser.options.useColumnNames = true;
        chart.dataSource.parser.options.reverse = true;

// the following line makes value axes to be arranged vertically.
        chart.leftAxesContainer.layout = "vertical";

// uncomment this line if you want to change order of axes
//chart.bottomAxesContainer.reverseOrder = true;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.grid.template.location = 0;
        dateAxis.renderer.ticks.template.length = 8;
        dateAxis.renderer.ticks.template.strokeOpacity = 0.1;
        dateAxis.renderer.grid.template.disabled = true;
        dateAxis.renderer.ticks.template.disabled = false;
        dateAxis.renderer.ticks.template.strokeOpacity = 0.2;
        dateAxis.renderer.minLabelPosition = 0.01;
        dateAxis.renderer.maxLabelPosition = 0.99;
        dateAxis.keepSelection = true;
        dateAxis.minHeight = 30;

        dateAxis.groupData = true;
        dateAxis.minZoomCount = 5;

// these two lines makes the axis to be initially zoomed-in
// dateAxis.start = 0.7;
// dateAxis.keepSelection = true;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.zIndex = 1;
        valueAxis.renderer.baseGrid.disabled = true;
// height of axis
        valueAxis.height = am4core.percent(65);

        valueAxis.renderer.gridContainer.background.fill = am4core.color("#000000");
        valueAxis.renderer.gridContainer.background.fillOpacity = 0.05;
        valueAxis.renderer.inside = true;
        valueAxis.renderer.labels.template.verticalCenter = "bottom";
        valueAxis.renderer.labels.template.padding(2, 2, 2, 2);

//valueAxis.renderer.maxLabelPosition = 0.95;
        valueAxis.renderer.fontSize = "0.8em"

        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.dateX = "Date";
        series.dataFields.valueY = "Adj Close";
        series.tooltipText = "{valueY.value}";
        series.name = "MSFT: Value";
        series.defaultState.transitionDuration = 0;

        var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis2.tooltip.disabled = true;
// height of axis
        valueAxis2.height = am4core.percent(35);
        valueAxis2.zIndex = 3
// this makes gap between panels
        valueAxis2.marginTop = 30;
        valueAxis2.renderer.baseGrid.disabled = true;
        valueAxis2.renderer.inside = true;
        valueAxis2.renderer.labels.template.verticalCenter = "bottom";
        valueAxis2.renderer.labels.template.padding(2, 2, 2, 2);
//valueAxis.renderer.maxLabelPosition = 0.95;
        valueAxis2.renderer.fontSize = "0.8em"

        valueAxis2.renderer.gridContainer.background.fill = am4core.color("#000000");
        valueAxis2.renderer.gridContainer.background.fillOpacity = 0.05;

        var series2 = chart.series.push(new am4charts.ColumnSeries());
        series2.dataFields.dateX = "Date";
        series2.dataFields.valueY = "Volume";
        series2.yAxis = valueAxis2;
        series2.tooltipText = "{valueY.value}";
        series2.name = "MSFT: Volume";
// volume should be summed
        series2.groupFields.valueY = "sum";
        series2.defaultState.transitionDuration = 0;

        chart.cursor = new am4charts.XYCursor();

        var scrollbarX = new am4charts.XYChartScrollbar();
        scrollbarX.series.push(series);
        scrollbarX.marginBottom = 20;
        scrollbarX.scrollbarChart.xAxes.getIndex(0).minHeight = undefined;
        chart.scrollbarX = scrollbarX;


        /**
         * Set up external controls
         */

// Date format to be used in input fields
        var inputFieldFormat = "yyyy-MM-dd";


        function resetButtonClass() {
            var selected = document.getElementsByClassName("amcharts-input-selected");
            for (var i = 0; i < selected.length; i++) {
                selected[i].className = "amcharts-input";
            }
        }

        dateAxis.events.on("selectionextremeschanged", function () {
            updateFields();
        });

        dateAxis.events.on("extremeschanged", updateFields);

        function updateFields() {
            var minZoomed = dateAxis.minZoomed + am4core.time.getDuration(dateAxis.mainBaseInterval.timeUnit, dateAxis.mainBaseInterval.count) * 0.5;

        }

        var zoomTimeout;
        function updateZoom() {
            if (zoomTimeout) {
                clearTimeout(zoomTimeout);
            }
            zoomTimeout = setTimeout(function () {
                resetButtonClass();
                var start = document.getElementById("fromfield").value;
                var end = document.getElementById("tofield").value;
                if ((start.length < inputFieldFormat.length) || (end.length < inputFieldFormat.length)) {
                    return;
                }
                var startDate = chart.dateFormatter.parse(start, inputFieldFormat);
                var endDate = chart.dateFormatter.parse(end, inputFieldFormat);

                if (startDate && endDate) {
                    dateAxis.zoomToDates(startDate, endDate);
                }
            }, 500);
        }
    }


    /********** Stock Chart **********/

    var stock_candlesticks = document.getElementById("stock_candlesticks");
    if (stock_candlesticks) {

// Create chart
        var chart = am4core.create("stock_candlesticks", am4charts.XYChart);
        chart.padding(0, 15, 0, 15);

// Load data
        chart.dataSource.url = "https://www.amcharts.com/wp-content/uploads/assets/stock/MSFT.csv";
        chart.dataSource.parser = new am4core.CSVParser();
        chart.dataSource.parser.options.useColumnNames = true;
        chart.dataSource.parser.options.reverse = true;

// the following line makes value axes to be arranged vertically.
        chart.leftAxesContainer.layout = "vertical";

// uncomment this line if you want to change order of axes
//chart.bottomAxesContainer.reverseOrder = true;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.grid.template.location = 0;
        dateAxis.renderer.ticks.template.length = 8;
        dateAxis.renderer.ticks.template.strokeOpacity = 0.1;
        dateAxis.renderer.grid.template.disabled = true;
        dateAxis.renderer.ticks.template.disabled = false;
        dateAxis.renderer.ticks.template.strokeOpacity = 0.2;
        dateAxis.renderer.minLabelPosition = 0.01;
        dateAxis.renderer.maxLabelPosition = 0.99;
        dateAxis.keepSelection = true;
        dateAxis.minHeight = 30;

        dateAxis.groupData = true;
        dateAxis.minZoomCount = 5;

// these two lines makes the axis to be initially zoomed-in
// dateAxis.start = 0.7;
// dateAxis.keepSelection = true;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.zIndex = 1;
        valueAxis.renderer.baseGrid.disabled = true;
// height of axis
        valueAxis.height = am4core.percent(65);

        valueAxis.renderer.gridContainer.background.fill = am4core.color("#000000");
        valueAxis.renderer.gridContainer.background.fillOpacity = 0.05;
        valueAxis.renderer.inside = true;
        valueAxis.renderer.labels.template.verticalCenter = "bottom";
        valueAxis.renderer.labels.template.padding(2, 2, 2, 2);

//valueAxis.renderer.maxLabelPosition = 0.95;
        valueAxis.renderer.fontSize = "0.8em"

        var series = chart.series.push(new am4charts.CandlestickSeries());
        series.dataFields.dateX = "Date";
        series.dataFields.openValueY = "Open";
        series.dataFields.valueY = "Close";
        series.dataFields.lowValueY = "Low";
        series.dataFields.highValueY = "High";
        series.clustered = false;
        series.tooltipText = "open: {openValueY.value}\nlow: {lowValueY.value}\nhigh: {highValueY.value}\nclose: {valueY.value}";
        series.name = "MSFT";
        series.defaultState.transitionDuration = 0;

        var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis2.tooltip.disabled = true;
// height of axis
        valueAxis2.height = am4core.percent(35);
        valueAxis2.zIndex = 3
// this makes gap between panels
        valueAxis2.marginTop = 30;
        valueAxis2.renderer.baseGrid.disabled = true;
        valueAxis2.renderer.inside = true;
        valueAxis2.renderer.labels.template.verticalCenter = "bottom";
        valueAxis2.renderer.labels.template.padding(2, 2, 2, 2);
//valueAxis.renderer.maxLabelPosition = 0.95;
        valueAxis2.renderer.fontSize = "0.8em"

        valueAxis2.renderer.gridContainer.background.fill = am4core.color("#000000");
        valueAxis2.renderer.gridContainer.background.fillOpacity = 0.05;

        var series2 = chart.series.push(new am4charts.ColumnSeries());
        series2.dataFields.dateX = "Date";
        series2.clustered = false;
        series2.dataFields.valueY = "Volume";
        series2.yAxis = valueAxis2;
        series2.tooltipText = "{valueY.value}";
        series2.name = "Series 2";
// volume should be summed
        series2.groupFields.valueY = "sum";
        series2.defaultState.transitionDuration = 0;

        chart.cursor = new am4charts.XYCursor();

        var scrollbarX = new am4charts.XYChartScrollbar();

        var sbSeries = chart.series.push(new am4charts.LineSeries());
        sbSeries.dataFields.valueY = "Close";
        sbSeries.dataFields.dateX = "Date";
        scrollbarX.series.push(sbSeries);
        sbSeries.disabled = true;
        scrollbarX.marginBottom = 20;
        chart.scrollbarX = scrollbarX;
        scrollbarX.scrollbarChart.xAxes.getIndex(0).minHeight = undefined;


        /**
         * Set up external controls
         */

// Date format to be used in input fields
        var inputFieldFormat = "yyyy-MM-dd";



        function resetButtonClass() {
            var selected = document.getElementsByClassName("amcharts-input-selected");
            for (var i = 0; i < selected.length; i++) {
                selected[i].className = "amcharts-input";
            }
        }

        dateAxis.events.on("selectionextremeschanged", function () {
            updateFields();
        });

        dateAxis.events.on("extremeschanged", updateFields);

        function updateFields() {
            var minZoomed = dateAxis.minZoomed + am4core.time.getDuration(dateAxis.mainBaseInterval.timeUnit, dateAxis.mainBaseInterval.count) * 0.5;
        }


        var zoomTimeout;
        function updateZoom() {
            if (zoomTimeout) {
                clearTimeout(zoomTimeout);
            }
            zoomTimeout = setTimeout(function () {
                resetButtonClass();
                var start = document.getElementById("fromfield").value;
                var end = document.getElementById("tofield").value;
                if ((start.length < inputFieldFormat.length) || (end.length < inputFieldFormat.length)) {
                    return;
                }
                var startDate = chart.dateFormatter.parse(start, inputFieldFormat);
                var endDate = chart.dateFormatter.parse(end, inputFieldFormat);

                if (startDate && endDate) {
                    dateAxis.zoomToDates(startDate, endDate);
                }
            }, 500);
        }
    }


    /********** Serpentine chart **********/

    var timeline_serpentine = document.getElementById("timeline_serpentine");
    if (timeline_serpentine) {

        var chart = am4core.create("timeline_serpentine", am4plugins_timeline.SerpentineChart);
        chart.curveContainer.padding(20, 20, 20, 20);
        chart.levelCount = 8;
        chart.orientation = "horizontal";
        chart.fontSize = 11;

        var colorSet = new am4core.ColorSet();
        colorSet.saturation = 0.6;

        chart.data = [{
                "category": "Module #1",
                "start": "2016-01-10",
                "end": "2016-01-13",
                "color": colorSet.getIndex(0),
                "task": "Gathering requirements"
            }, {
                "category": "Module #1",
                "start": "2016-02-05",
                "end": "2016-04-18",
                "color": colorSet.getIndex(0),
                "task": "Development"
            }, {
                "category": "Module #2",
                "start": "2016-01-08",
                "end": "2016-01-10",
                "color": colorSet.getIndex(5),
                "task": "Gathering requirements"
            }, {
                "category": "Module #2",
                "start": "2016-01-12",
                "end": "2016-01-15",
                "color": colorSet.getIndex(5),
                "task": "Producing specifications"
            }, {
                "category": "Module #2",
                "start": "2016-01-16",
                "end": "2016-02-05",
                "color": colorSet.getIndex(5),
                "task": "Development"
            }, {
                "category": "Module #2",
                "start": "2016-02-10",
                "end": "2016-02-18",
                "color": colorSet.getIndex(5),
                "task": "Testing and QA"
            }, {
                "category": "",
                "task": ""
            }, {
                "category": "Module #3",
                "start": "2016-01-01",
                "end": "2016-01-19",
                "color": colorSet.getIndex(9),
                "task": "Gathering requirements"
            }, {
                "category": "Module #3",
                "start": "2016-02-01",
                "end": "2016-02-10",
                "color": colorSet.getIndex(9),
                "task": "Producing specifications"
            }, {
                "category": "Module #3",
                "start": "2016-03-10",
                "end": "2016-04-15",
                "color": colorSet.getIndex(9),
                "task": "Development"
            }, {
                "category": "Module #3",
                "start": "2016-04-20",
                "end": "2016-04-30",
                "color": colorSet.getIndex(9),
                "task": "Testing and QA"
            }, {
                "category": "Module #4",
                "start": "2016-01-15",
                "end": "2016-02-12",
                "color": colorSet.getIndex(15),
                "task": "Gathering requirements"
            }, {
                "category": "Module #4",
                "start": "2016-02-25",
                "end": "2016-03-10",
                "color": colorSet.getIndex(15),
                "task": "Development"
            }, {
                "category": "Module #4",
                "start": "2016-03-23",
                "end": "2016-04-29",
                "color": colorSet.getIndex(15),
                "task": "Testing and QA"
            }];

        chart.dateFormatter.dateFormat = "yyyy-MM-dd";
        chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

        var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "category";
        categoryAxis.renderer.grid.template.disabled = true;
        categoryAxis.renderer.labels.template.paddingRight = 25;
        categoryAxis.renderer.minGridDistance = 10;
        categoryAxis.renderer.innerRadius = -60;
        categoryAxis.renderer.radius = 60;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.minGridDistance = 70;
        dateAxis.baseInterval = {count: 1, timeUnit: "day"};

        dateAxis.renderer.tooltipLocation = 0;
        dateAxis.startLocation = -0.5;
        dateAxis.renderer.line.strokeDasharray = "1,4";
        dateAxis.renderer.line.strokeOpacity = 0.7;
        dateAxis.tooltip.background.fillOpacity = 0.2;
        dateAxis.tooltip.background.cornerRadius = 5;
        dateAxis.tooltip.label.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
        dateAxis.tooltip.label.paddingTop = 7;

        var labelTemplate = dateAxis.renderer.labels.template;
        labelTemplate.verticalCenter = "middle";
        labelTemplate.fillOpacity = 0.7;
        labelTemplate.background.fill = new am4core.InterfaceColorSet().getFor("background");
        labelTemplate.background.fillOpacity = 1;
        labelTemplate.padding(7, 7, 7, 7);

        var categoryAxisLabelTemplate = categoryAxis.renderer.labels.template;
        categoryAxisLabelTemplate.horizontalCenter = "left";
        categoryAxisLabelTemplate.adapter.add("rotation", function (rotation, target) {
            var position = dateAxis.valueToPosition(dateAxis.min);
            return 270;
        })

        var series1 = chart.series.push(new am4plugins_timeline.CurveColumnSeries());
        series1.columns.template.height = am4core.percent(20);
        series1.columns.template.tooltipText = "{task}: [bold]{openDateX}[/] - [bold]{dateX}[/]";

        series1.dataFields.openDateX = "start";
        series1.dataFields.dateX = "end";
        series1.dataFields.categoryY = "category";
        series1.columns.template.propertyFields.fill = "color"; // get color from data
        series1.columns.template.propertyFields.stroke = "color";
        series1.columns.template.strokeOpacity = 0;

        var bullet = new am4charts.CircleBullet();
        series1.bullets.push(bullet);
        bullet.circle.radius = 3;
        bullet.circle.strokeOpacity = 0;
        bullet.propertyFields.fill = "color";
        bullet.locationX = 0;


        var bullet2 = new am4charts.CircleBullet();
        series1.bullets.push(bullet2);
        bullet2.circle.radius = 3;
        bullet2.circle.strokeOpacity = 0;
        bullet2.propertyFields.fill = "color";
        bullet2.locationX = 1;

        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarX.align = "center"
        chart.scrollbarX.width = am4core.percent(90);

        var cursor = new am4plugins_timeline.CurveCursor();
        chart.cursor = cursor;
        cursor.xAxis = dateAxis;
        cursor.yAxis = categoryAxis;
        cursor.lineY.disabled = true;
        cursor.lineX.strokeDasharray = "1,4";
        cursor.lineX.strokeOpacity = 1;

        dateAxis.renderer.tooltipLocation2 = 0;
        categoryAxis.cursorTooltipEnabled = false;
    }


    /********** Bent Gantt chart **********/

    var timeline_bent = document.getElementById("timeline_bent");
    if (timeline_bent) {

        var container = am4core.create("timeline_bent", am4core.Container);
        container.width = am4core.percent(100);
        container.height = am4core.percent(100);

        var interfaceColors = new am4core.InterfaceColorSet();
        var colorSet = new am4core.ColorSet();

        var chart = container.createChild(am4plugins_timeline.CurveChart);

        chart.data = [{
                "start": "2019-11-10 08:00",
                "end": "2019-11-10 17:00",
                "task": "Official workday"
            }, {
                "start": "2019-11-10 06:00",
                "end": "2019-11-10 11:00",
                "task": "Gathering requirements",
                "bulletf1": false
            }, {
                "start": "2019-11-10 11:30",
                "end": "2019-11-10 16:30",
                "task": "Development"
            }, {
                "start": "2019-11-10 16:00",
                "end": "2019-11-10 18:00",
                "task": "Producing specifications"
            }, {
                "start": "2019-11-10 13:00",
                "end": "2019-11-11 01:00",
                "task": "Testing",
                "bulletf2": false
            }, {
                "task": ""
            }].reverse();

        chart.dateFormatter.dateFormat = "yyyy-MM-dd hh:mm";
        chart.dateFormatter.inputDateFormat = "yyyy-MM-dd hh:mm";
        chart.dy = 90;
        chart.maskBullets = false;

        var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "task";
        categoryAxis.renderer.labels.template.paddingRight = 25;
        categoryAxis.renderer.minGridDistance = 10;
        categoryAxis.renderer.innerRadius = 0;
        categoryAxis.renderer.radius = 100;
        categoryAxis.renderer.grid.template.location = 1;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.minGridDistance = 70;
        dateAxis.min = new Date("2019-11-10 05:00").getTime();
        dateAxis.max = new Date("2019-11-11 02:00").getTime();

        dateAxis.baseInterval = {count: 1, timeUnit: "minute"};
        dateAxis.startLocation = -0.5;

        dateAxis.renderer.points = [{x: -400, y: 0}, {x: -250, y: 0}, {x: 0, y: 60}, {x: 250, y: 0}, {x: 400, y: 0}];
        dateAxis.renderer.autoScale = false;
        dateAxis.renderer.polyspline.tensionX = 0.8;
        dateAxis.renderer.tooltipLocation = 0;
        dateAxis.renderer.grid.template.disabled = true;
        dateAxis.renderer.line.strokeDasharray = "1,4";
        dateAxis.renderer.line.strokeOpacity = 0.7;
        dateAxis.tooltip.background.fillOpacity = 0.2;
        dateAxis.tooltip.background.cornerRadius = 5;
        dateAxis.tooltip.label.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
        dateAxis.tooltip.label.paddingTop = 7;

        var labelTemplate = dateAxis.renderer.labels.template;
        labelTemplate.verticalCenter = "middle";
        labelTemplate.fillOpacity = 0.7;
        labelTemplate.background.fill = interfaceColors.getFor("background");
        labelTemplate.background.fillOpacity = 1;
        labelTemplate.padding(7, 7, 7, 7);

        var series = chart.series.push(new am4plugins_timeline.CurveColumnSeries());
        series.columns.template.height = am4core.percent(15);
        series.columns.template.tooltipText = "{categoryX}: [bold]{openDateX}[/] - [bold]{dateX}[/]";

        series.dataFields.openDateX = "start";
        series.dataFields.dateX = "end";
        series.dataFields.categoryY = "task";
        series.columns.template.propertyFields.fill = "color"; // get color from data
        series.columns.template.propertyFields.stroke = "color";
        series.columns.template.strokeOpacity = 0;

        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index * 3);
        })

        var flagBullet1 = new am4plugins_bullets.FlagBullet();
        series.bullets.push(flagBullet1);
        flagBullet1.disabled = true;
        flagBullet1.propertyFields.disabled = "bulletf1";
        flagBullet1.locationX = 1;
        flagBullet1.label.text = "start";

        var flagBullet2 = new am4plugins_bullets.FlagBullet();
        series.bullets.push(flagBullet2);
        flagBullet2.disabled = true;
        flagBullet2.propertyFields.disabled = "bulletf2";
        flagBullet2.locationX = 0;
        flagBullet2.background.fill = interfaceColors.getFor("background");
        flagBullet2.label.text = "end";

        var bullet = new am4charts.CircleBullet();
        series.bullets.push(bullet);
        bullet.circle.radius = 3;
        bullet.circle.strokeOpacity = 0;
        bullet.locationX = 0;

        bullet.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index * 3);
        })

        var bullet2 = new am4charts.CircleBullet();
        series.bullets.push(bullet2);
        bullet2.circle.radius = 3;
        bullet2.circle.strokeOpacity = 0;
        bullet2.propertyFields.fill = "color";
        bullet2.locationX = 1;

        bullet2.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index * 3);
        })

        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarX.align = "center"
        chart.scrollbarX.width = 800;
        chart.scrollbarX.parent = chart.bottomAxesContainer;
        chart.scrollbarX.dy = -90;
        chart.scrollbarX.opacity = 0.4;

        var cursor = new am4plugins_timeline.CurveCursor();
        chart.cursor = cursor;
        cursor.xAxis = dateAxis;
        cursor.yAxis = categoryAxis;
        cursor.lineY.disabled = true;
        cursor.lineX.strokeDasharray = "1,4";
        cursor.lineX.strokeOpacity = 1;

        dateAxis.renderer.tooltipLocation2 = 0;
        categoryAxis.cursorTooltipEnabled = false;


/// clock
        var clock = container.createChild(am4charts.GaugeChart);
        clock.toBack();

        clock.radius = 120;
        clock.dy = -100;
        clock.startAngle = -90;
        clock.endAngle = 270;

        var axis = clock.xAxes.push(new am4charts.ValueAxis());
        axis.min = 0;
        axis.max = 12;
        axis.strictMinMax = true;

        axis.renderer.line.strokeWidth = 1;
        axis.renderer.line.strokeOpacity = 0.5;
        axis.renderer.line.strokeDasharray = "1,4";
        axis.renderer.minLabelPosition = 0.05; // hides 0 label
        axis.renderer.inside = true;
        axis.renderer.labels.template.radius = 30;
        axis.renderer.grid.template.disabled = true;
        axis.renderer.ticks.template.length = 12;
        axis.renderer.ticks.template.strokeOpacity = 1;

// serves as a clock face fill
        var range = axis.axisRanges.create();
        range.value = 0;
        range.endValue = 12;
        range.grid.visible = false;
        range.tick.visible = false;
        range.label.visible = false;

        var axisFill = range.axisFill;

// hands
        var hourHand = clock.hands.push(new am4charts.ClockHand());
        hourHand.radius = am4core.percent(60);
        hourHand.startWidth = 5;
        hourHand.endWidth = 5;
        hourHand.rotationDirection = "clockWise";
        hourHand.pin.radius = 8;
        hourHand.zIndex = 1;

        var minutesHand = clock.hands.push(new am4charts.ClockHand());
        minutesHand.rotationDirection = "clockWise";
        minutesHand.startWidth = 3;
        minutesHand.endWidth = 3;
        minutesHand.radius = am4core.percent(78);
        minutesHand.zIndex = 2;

        chart.cursor.events.on("cursorpositionchanged", function (event) {
            var value = dateAxis.positionToValue(event.target.xPosition)
            var date = new Date(value);
            var hours = date.getHours();
            var minutes = date.getMinutes();
            // set hours
            hourHand.showValue(hours + minutes / 60, 0);
            // set minutes
            minutesHand.showValue(12 * minutes / 60, 0);
        })
    }



    /********** Zoomable radar **********/

    var radar_zoomable = document.getElementById("radar_zoomable");
    if (radar_zoomable) {

        var chart = am4core.create("radar_zoomable", am4charts.RadarChart);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.data = [
            {
                category: "One",
                value1: 8,
                value2: 2,
                value3: 4,
                value4: 3
            },
            {
                category: "Two",
                value1: 11,
                value2: 4,
                value3: 2,
                value4: 4
            },
            {
                category: "Three",
                value1: 7,
                value2: 6,
                value3: 6,
                value4: 2
            },
            {
                category: "Four",
                value1: 13,
                value2: 8,
                value3: 3,
                value4: 2
            },
            {
                category: "Five",
                value1: 12,
                value2: 10,
                value3: 5,
                value4: 1
            },
            {
                category: "Six",
                value1: 15,
                value2: 12,
                value3: 4,
                value4: 4
            },
            {
                category: "Seven",
                value1: 9,
                value2: 14,
                value3: 6,
                value4: 2
            },
            {
                category: "Eight",
                value1: 6,
                value2: 16,
                value3: 5,
                value4: 1
            }
        ];

        chart.padding(20, 20, 20, 20);

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "category";
        categoryAxis.renderer.labels.template.location = 0.5;
        categoryAxis.renderer.tooltipLocation = 0.5;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.renderer.labels.template.horizontalCenter = "left";
        valueAxis.min = 0;

        var series1 = chart.series.push(new am4charts.RadarColumnSeries());
        series1.columns.template.tooltipText = "{name}: {valueY.value}";
        series1.columns.template.width = am4core.percent(80);
        series1.name = "Series 1";
        series1.dataFields.categoryX = "category";
        series1.dataFields.valueY = "value2";
        series1.stacked = true;

        var series2 = chart.series.push(new am4charts.RadarColumnSeries());
        series2.columns.template.width = am4core.percent(80);
        series2.columns.template.tooltipText = "{name}: {valueY.value}";
        series2.name = "Series 2";
        series2.dataFields.categoryX = "category";
        series2.dataFields.valueY = "value2";
        series2.stacked = true;

        var series3 = chart.series.push(new am4charts.RadarColumnSeries());
        series3.columns.template.width = am4core.percent(80);
        series3.columns.template.tooltipText = "{name}: {valueY.value}";
        series3.name = "Series 3";
        series3.dataFields.categoryX = "category";
        series3.dataFields.valueY = "value3";
        series3.stacked = true;

        var series4 = chart.series.push(new am4charts.RadarColumnSeries());
        series4.columns.template.width = am4core.percent(80);
        series4.columns.template.tooltipText = "{name}: {valueY.value}";
        series4.name = "Series 4";
        series4.dataFields.categoryX = "category";
        series4.dataFields.valueY = "value4";
        series4.stacked = true;

        chart.seriesContainer.zIndex = -1;

        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarX.exportable = false;
        chart.scrollbarY = new am4core.Scrollbar();
        chart.scrollbarY.exportable = false;

        chart.cursor = new am4charts.RadarCursor();
        chart.cursor.xAxis = categoryAxis;
        chart.cursor.fullWidthXLine = true;
        chart.cursor.lineX.strokeOpacity = 0;
        chart.cursor.lineX.fillOpacity = 0.1;
        chart.cursor.lineX.fill = am4core.color("#000000");

    }



    /********** Chart radar **********/

    var radar_chart_1 = document.getElementById("radar_chart_1");
    if (radar_chart_1) {

        /* Create chart instance */
        var chart = am4core.create("radar_chart_1", am4charts.RadarChart);

        /* Add data */
        chart.data = [{
                "country": "Lithuania",
                "litres": 501
            }, {
                "country": "Czechia",
                "litres": 301
            }, {
                "country": "Ireland",
                "litres": 266
            }, {
                "country": "Germany",
                "litres": 165
            }, {
                "country": "Australia",
                "litres": 139
            }, {
                "country": "Austria",
                "litres": 336
            }, {
                "country": "UK",
                "litres": 290
            }, {
                "country": "Belgium",
                "litres": 325
            }, {
                "country": "The Netherlands",
                "litres": 40
            }];

        /* Create axes */
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "country";

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.axisFills.template.fill = chart.colors.getIndex(2);
        valueAxis.renderer.axisFills.template.fillOpacity = 0.05;

        /* Create and configure series */
        var series = chart.series.push(new am4charts.RadarSeries());
        series.dataFields.valueY = "litres";
        series.dataFields.categoryX = "country";
        series.name = "Sales";
        series.strokeWidth = 3;

    }

    /********** Treemap Dynamic **********/

    var treemap_dynamic = document.getElementById("treemap_dynamic");
    if (treemap_dynamic) {

// create chart
        var chart = am4core.create("treemap_dynamic", am4charts.TreeMap);
        chart.hiddenState.properties.opacity = 0;

        chart.data = [{
                name: "First",
                children: [
                    {
                        name: "A1",
                        value: 100
                    },
                    {
                        name: "A2",
                        value: 60
                    },
                    {
                        name: "A3",
                        value: 30
                    }
                ]
            },
            {
                name: "Second",
                children: [
                    {
                        name: "B1",
                        value: 135
                    },
                    {
                        name: "B2",
                        value: 98
                    },
                    {
                        name: "B3",
                        value: 56
                    }
                ]
            },
            {
                name: "Third",
                children: [
                    {
                        name: "C1",
                        value: 335
                    },
                    {
                        name: "C2",
                        value: 148
                    },
                    {
                        name: "C3",
                        value: 126
                    },
                    {
                        name: "C4",
                        value: 26
                    }
                ]
            },
            {
                name: "Fourth",
                children: [
                    {
                        name: "D1",
                        value: 415
                    },
                    {
                        name: "D2",
                        value: 148
                    },
                    {
                        name: "D3",
                        value: 89
                    },
                    {
                        name: "D4",
                        value: 64
                    },
                    {
                        name: "D5",
                        value: 16
                    }
                ]
            },
            {
                name: "Fifth",
                children: [
                    {
                        name: "E1",
                        value: 687
                    },
                    {
                        name: "E2",
                        value: 148
                    }
                ]
            }];

        chart.colors.step = 2;

// define data fields
        chart.dataFields.value = "value";
        chart.dataFields.name = "name";
        chart.dataFields.children = "children";
        chart.layoutAlgorithm = chart.binaryTree;

        chart.zoomable = false;

// level 0 series template
        var level0SeriesTemplate = chart.seriesTemplates.create("0");
        var level0ColumnTemplate = level0SeriesTemplate.columns.template;

        level0ColumnTemplate.column.cornerRadius(10, 10, 10, 10);
        level0ColumnTemplate.fillOpacity = 0;
        level0ColumnTemplate.strokeWidth = 4;
        level0ColumnTemplate.strokeOpacity = 0;

// level 1 series template
        var level1SeriesTemplate = chart.seriesTemplates.create("1");
        level1SeriesTemplate.tooltip.dy = -15;
        level1SeriesTemplate.tooltip.pointerOrientation = "vertical";

        var level1ColumnTemplate = level1SeriesTemplate.columns.template;

        level1SeriesTemplate.tooltip.animationDuration = 0;
        level1SeriesTemplate.strokeOpacity = 1;

        level1ColumnTemplate.column.cornerRadius(10, 10, 10, 10)
        level1ColumnTemplate.fillOpacity = 1;
        level1ColumnTemplate.strokeWidth = 4;
        level1ColumnTemplate.stroke = am4core.color("#ffffff");

        var bullet1 = level1SeriesTemplate.bullets.push(new am4charts.LabelBullet());
        bullet1.locationY = 0.5;
        bullet1.locationX = 0.5;
        bullet1.label.text = "{name}";
        bullet1.label.fill = am4core.color("#ffffff");
        bullet1.interactionsEnabled = false;
        chart.maxLevels = 2;




    }


    /********** Funnel with Gradient Fill **********/

    var funnel_gradient = document.getElementById("funnel_gradient");
    if (funnel_gradient) {

        let chart = am4core.create("funnel_gradient", am4charts.SlicedChart);
        chart.data = [{
                "name": "Stage #1",
                "value": 600
            }, {
                "name": "Stage #2",
                "value": 300
            }, {
                "name": "Stage #3",
                "value": 200
            }, {
                "name": "Stage #4",
                "value": 180
            }, {
                "name": "Stage #5",
                "value": 50
            }, {
                "name": "Stage #6",
                "value": 20
            }, {
                "name": "Stage #7",
                "value": 10
            }];

        let series = chart.series.push(new am4charts.FunnelSeries());
        series.dataFields.value = "value";
        series.dataFields.category = "name";

        var fillModifier = new am4core.LinearGradientModifier();
        fillModifier.brightnesses = [-0.5, 1, -0.5];
        fillModifier.offsets = [0, 0.5, 1];
        series.slices.template.fillModifier = fillModifier;
        series.alignLabels = true;

        series.labels.template.text = "{category}: [bold]{value}[/]";

    }

    /********** Funnel Multi Series **********/

    var funnel_multi = document.getElementById("funnel_multi");
    if (funnel_multi) {

        var chart = am4core.create("funnel_multi", am4charts.SlicedChart);
        chart.data = [{
                "name": "Stage #1",
                "value1": 600,
                "value2": 450
            }, {
                "name": "Stage #2",
                "value1": 300,
                "value2": 400
            }, {
                "name": "Stage #3",
                "value1": 200,
                "value2": 290
            }, {
                "name": "Stage #4",
                "value1": 180,
                "value2": 100
            }, {
                "name": "Stage #5",
                "value1": 50,
                "value2": 50
            }, {
                "name": "Stage #6",
                "value1": 20,
                "value2": 20
            }, {
                "name": "Stage #7",
                "value1": 10,
                "value2": 10
            }];

        var series1 = chart.series.push(new am4charts.FunnelSeries());
        series1.dataFields.value = "value2";
        series1.dataFields.category = "name";
        series1.labels.template.disabled = true;

        var series2 = chart.series.push(new am4charts.PyramidSeries());
        series2.dataFields.value = "value2";
        series2.dataFields.category = "name";
        series2.labels.template.disabled = true;
    }
});