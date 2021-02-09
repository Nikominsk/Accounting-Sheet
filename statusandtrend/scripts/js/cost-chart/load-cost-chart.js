var chartPie;

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

function loadDiagramPie() {

    var filterYears = $('#modal-window-filter-cost-chart select[name="select-years"]').val();

    var labels = [];
    var costs = [];

    //if chart Pie exists -> destroy chart
    if (chartPie) {chartPie.destroy();}

    //communication with php file "getCostAndCategory"
    $.ajax({
            url: "../statusandtrend/scripts/php/cost-chart/getCategoryLabelAndItsCost.php",
            type: "post",
            data: { filterYears: filterYears } ,       //send data to php file
            async: false,                                   //finish this communication before going down the code

            success: function (response) {
                //console.log("success: " + response);

                //parse JSON-response into JavaScript
                var splittedResponse = JSON.parse(response);

                //save splitted response (label, costs) into separate arrays
                splittedResponse.forEach(function(element) {
                        labels.push(element.label);
                        costs.push(element.amount);
                });


                //get element by id "chart_pie"
                var chartObject = $('#section-cost-chart .chart-pie');

                //add colors if needed
                if(colors.length < labels.length) {
                        //get amount of colors that have to be added
                        for(var i = colors.length; i < labels.length; i++) {
                                colors.push(dynamicColors());
                        }
                }

                //create Chart
                chartPie = new Chart(chartObject, {
                        type: 'pie',
                        data: {
                                labels: labels,         //x-axis labels

                                datasets: [{
                                        backgroundColor: colors,
                                        data: costs
                                }]
                        },
                        /*options: {
                                legend: {
                                    display: false
                                }
                            }*/
                });

                $("#section-cost-chart .button-refresh").val("🗘");

            },
            error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);

            }

    });

}
