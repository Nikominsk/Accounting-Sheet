var chartTrends = [];

function destroyAllTrendCharts() {
    for(var i = 0; i < chartTrends.length; i++) {
        if (chartTrends[i]) {chartTrends[i].destroy();}
    }
}

function loadTrendDiagrams(usersData) {

    destroyAllTrendCharts();

    var trendline;

    for(var i = 0; i < usersData.length; i++) {

        var chartObject = $('#section-visualisation-each-user .table-body-chart #tr-'+usersData[i].username +' .chart-trend'); /* by id tr-username */

        trendline = new TrendLine(usersData[i].monthIds, usersData[i].states);

        chartTrends[i] = new Chart(chartObject, {
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

                        legend: {
                                display: false
                        }
                        
                        
                },
                data: {
                        labels: usersData[i].monthLabels,       //x-axis labels
                                
                        datasets:       [
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
                                                data: usersData[i].states
                                        }
                                        ]
                }
        });

    }

}