var chartPies = [];

//default colors
var colors = [  '#3e95cd', '#8e5ea2', '#3cba9f', '#e8c3b9', '#c45850', 
                '#3366E6', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', 
                '#E6B333', '#FF6633', '#99FF99', '#B34D4D', '#FF99E6',
                '#CCFF1A', '#FF1A66', '#33FFCC', '#66994D', '#B366CC',
                '#4D8000', '#B33300', '#CC80CC', '#66664D', '#991AFF',
                '#4DB3FF', '#1AB399', '#E666B3', '#33991A', '#CC9999',
                '#B3B31A', '#00E680', '#4D8066', '#E6FF80', '#1AFF33',
                '#999933', '#FF3380', '#CCCC00', '#66E64D', '#4D80CC',
                '#9900B3', '#99E6E6', '#6666FF'];

var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);

        return "rgb(" + r + "," + g + "," + b + ")";

}

function destroyAllPieCharts() {
    for(var i = 0; i < chartPies.length; i++) {
        if (chartPies[i]) {chartPies[i].destroy();}
    }
}

function loadPieDiagrams(usersData) {

    if(usersData.length == 0) return;
    if(usersData[0].length == 0) return;    //check if really neccessary

    destroyAllPieCharts();

    var amountLabels = usersData[0][1].length;
    //add colors if needed
    if(colors.length < amountLabels) {
        //get amount of colors that have to be added
        for(var i = colors.length; i < amountLabels; i++) {
                colors.push(dynamicColors());
        }
    }

    var chartObject;

    for(var i = 0; i < usersData.length; i++) {

        chartObject = $('#section-visualisation-each-user #tr-'+usersData[i][0] +' .chart-pie');

        //create Chart                
        chartPies[i] = new Chart(chartObject, {
            type: 'pie',
            data: {
                    labels: usersData[i][1],

                    datasets: [{
                            backgroundColor: colors,
                            data: usersData[i][2]
                    }]
            },
            options: {
                    legend: {
                        display: false
                    }
            }
        });

    }


    function displayColorPortions(labels, colors) {

        for(var i = 0; i < labels.length; i++) {
                $('<span class = "portion' + i + '">'+ labels[i] +'</span>').appendTo($('#section-cost-chart #color-portions')) 
                $('#section-cost-chart #color-portions .portion' + i).css('background-color', colors[i]);
        }

    }

}
