$( document ).ready(function() {

    let flotDashSales1Data = [{
        data: [
            ["Jan", 140],
            ["Feb", 240],
            ["Mar", 190],
            ["Apr", 140],
            ["May", 180],
            ["Jun", 320],
            ["Jul", 270],
            ["Aug", 180]
        ],
        color: "#0088cc"
    }];

    let flotDashSales2Data = [{
        data: [
            ["Jan", 240],
            ["Feb", 240],
            ["Mar", 290],
            ["Apr", 540],
            ["May", 480],
            ["Jun", 220],
            ["Jul", 170],
            ["Aug", 190]
        ],
        color: "#2baab1"
    }];

    let flotDashSales3Data = [{
        data: [
            ["Jan", 840],
            ["Feb", 740],
            ["Mar", 690],
            ["Apr", 940],
            ["May", 1180],
            ["Jun", 820],
            ["Jul", 570],
            ["Aug", 780]
        ],
        color: "#734ba9"
    }];

    let sparklineBarDashData = [5, 6, 7, 2, 0, 4, 2, 4, 2, 0, 4, 2, 4, 2, 0, 4];

    let sparklineLineDashData = [15, 16, 17, 19, 10, 15, 13, 12, 12, 14, 16, 17];

    /*
        Sales Selector
    */
    $('#salesSelector').themePluginMultiSelect().on('change', function() {
        let rel = $(this).val();
        $('#salesSelectorItems .chart').removeClass('chart-active').addClass('chart-hidden');
        $('#salesSelectorItems .chart[data-sales-rel="' + rel + '"]').addClass('chart-active').removeClass('chart-hidden');
    });

    $('#salesSelector').trigger('change');

    $('#salesSelectorWrapper').addClass('ready');

    /*
        Flot: Sales 1
    */
    if( $('#flotDashSales1').get(0) ) {
        let flotDashSales1 = $.plot('#flotDashSales1', flotDashSales1Data, {
            series: {
                lines: {
                    show: true,
                    lineWidth: 2
                },
                points: {
                    show: true
                },
                shadowSize: 0
            },
            grid: {
                hoverable: true,
                clickable: true,
                borderColor: 'rgba(0,0,0,0.1)',
                borderWidth: 1,
                labelMargin: 15,
                backgroundColor: 'transparent'
            },
            yaxis: {
                min: 0,
                color: 'rgba(0,0,0,0.1)'
            },
            xaxis: {
                mode: 'categories',
                color: 'rgba(0,0,0,0)'
            },
            legend: {
                show: false
            },
            tooltip: true,
            tooltipOpts: {
                content: '%x: %y',
                shifts: {
                    x: -30,
                    y: 25
                },
                defaultTheme: false
            }
        });

    }

    /*
        Flot: Sales 2
    */
    if( $('#flotDashSales2').get(0) ) {
        let flotDashSales2 = $.plot('#flotDashSales2', flotDashSales2Data, {
            series: {
                lines: {
                    show: true,
                    lineWidth: 2
                },
                points: {
                    show: true
                },
                shadowSize: 0
            },
            grid: {
                hoverable: true,
                clickable: true,
                borderColor: 'rgba(0,0,0,0.1)',
                borderWidth: 1,
                labelMargin: 15,
                backgroundColor: 'transparent'
            },
            yaxis: {
                min: 0,
                color: 'rgba(0,0,0,0.1)'
            },
            xaxis: {
                mode: 'categories',
                color: 'rgba(0,0,0,0)'
            },
            legend: {
                show: false
            },
            tooltip: true,
            tooltipOpts: {
                content: '%x: %y',
                shifts: {
                    x: -30,
                    y: 25
                },
                defaultTheme: false
            }
        });
    }

    /*
        Flot: Sales 3
    */
    if( $('#flotDashSales3').get(0) ) {
        let flotDashSales3 = $.plot('#flotDashSales3', flotDashSales3Data, {
            series: {
                lines: {
                    show: true,
                    lineWidth: 2
                },
                points: {
                    show: true
                },
                shadowSize: 0
            },
            grid: {
                hoverable: true,
                clickable: true,
                borderColor: 'rgba(0,0,0,0.1)',
                borderWidth: 1,
                labelMargin: 15,
                backgroundColor: 'transparent'
            },
            yaxis: {
                min: 0,
                color: 'rgba(0,0,0,0.1)'
            },
            xaxis: {
                mode: 'categories',
                color: 'rgba(0,0,0,0)'
            },
            legend: {
                show: false
            },
            tooltip: true,
            tooltipOpts: {
                content: '%x: %y',
                shifts: {
                    x: -30,
                    y: 25
                },
                defaultTheme: false
            }
        });
    }

    /*
        Sparkline: Bar
    */
    if( $('#sparklineBarDash').get(0) ) {
        let sparklineBarDashOptions = {
            type: 'bar',
            width: '80',
            height: '55',
            barColor: '#0088cc',
            negBarColor: '#B20000'
        };

        $("#sparklineBarDash").sparkline(sparklineBarDashData, sparklineBarDashOptions);

    }

    /*
        Sparkline: Line
    */
    if( $('#sparklineLineDash').get(0) ) {
        let sparklineLineDashOptions = {
            type: 'line',
            width: '80',
            height: '55',
            lineColor: '#0088cc'
        };

        $("#sparklineLineDash").sparkline(sparklineLineDashData, sparklineLineDashOptions);
    }
});