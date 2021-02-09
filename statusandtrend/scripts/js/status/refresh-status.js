
function refreshStatus() {

    //calculate costs/ advance previous years/ advance/ current state
    $.post('../statusandtrend/scripts/php/status/calculateStatus.php', {}, function(response) {
        //console.log("success: " + response);
        //parse JSON-response into JavaScript
        var splittedResponse = JSON.parse(response);

        //save response of php file into variables
        var costValue = splittedResponse[0];
        var advanceValue = splittedResponse[1];
        var surplusPreviousYearsValue = splittedResponse[2];
        var currentStateValue = splittedResponse[3];

        //output variables
        $('#valueCosts').html(costValue);
        $('#valueAdvance').html(advanceValue);
        $('#valueSurplusPreviousYears').html(surplusPreviousYearsValue);
        $('#valueCurrentState').html(currentStateValue);

    });

}
