var chartTrend;

function loadDiagramTrend() {

    //get element with id "chart_trend"
    var chartObject = $('#section-trend-chart .chart-trend');

    var monthsBack = $('#modal-window-filter-trend-chart select[name="select-months-back"]').val();

    var trendlineYArray = [80, 52, 35, 30];

    $.ajax({
        url: "../statusandtrend/scripts/php/trend-chart/getUserStateForMonths.php",
        type: "post",
        data: { monthsBack: monthsBack } ,       //send data to php file
        async: true,                                   //finish this communication before going down the code

        success: function (response) {
            //console.log(response);

            var data = JSON.parse(response);

            var trendline = new TrendLine(data.monthIds, data.states);

            //console.log(data.monthLabels);
            //console.log(data.states);

            chartTrend = new Chart(chartObject, {
                type: 'line',
                options: {
                        scales: {
                                yAxes: [{
                                        ticks: {
                                                beginAtZero: true
                                        }
                                }]
                        },
                        elements: {
                                line: {
                                        tension: 0
                                }
                        },
                },
                data: {
                    labels: data.monthLabels,       //x-axis labels

                    datasets:   [
                                {
                                        label: "Trendline",
                                        backgroundColor: 'rgba(0,0,0,0)',
                                        borderColor: 'red',
                                        data: trendline.getTrendlineYs()
                                },
                                {
                                        label: "State/Month",
                                        backgroundColor: 'rgb(160, 210, 217)',
                                        borderColor: 'rgb(67, 191, 209)',
                                        data: data.states
                                }
                                ]
                }
            });

            $("#section-trend-chart .button-refresh").val("🗘");
        },
        error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);

        }
        });

}