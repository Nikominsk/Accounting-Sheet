//if page completely loaded
$(window).on("load", function() {

    $("#editor-window-all-cost .button-save").click(function(){
        saveRecordCostOverview();
    });

    $("#editor-window-all-cost .button-remove").click(function(){
        removeRecordCostOverview();
    });

    $("#editor-window-all-cost .button-cancel").click(function(){
        closeEditorWindowCost();
    });

});

function saveRecordCostOverview() {

    var costId = $('#editor-window-all-cost span[name ="costId"]').html();
    var userId = $('#editor-window-all-cost select[name="select-username"]').val();
    var travelId = $('#editor-window-all-cost input[name="input-travelId"').val();
    var categoryId = $('#editor-window-all-cost select[name="select-category"]').val();
    var date = $('#editor-window-all-cost input[name="input-date"]').val();
    var amount = $('#editor-window-all-cost input[name="input-amount"]').val();
    var description = $('#editor-window-all-cost input[name="input-description"]').val();

    $.ajax({
        url: "../costs-and-advances-overview/modal-window/cost/editor/scripts/php/save-record.php",
        type: "post",
        data: { costId: costId,
                userId: userId,
                travelId: travelId,
                categoryId: categoryId,
                date: date,
                amount: amount,
                description: description },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {

                alertSuccess(data[1]);

                closeEditorWindowAllCosts();

                refreshCostTable();

            } else {
                //something went wrong with saving input
                alertFailure(data[1]);

            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }

    });

}

function removeRecordCostOverview() {

    var costId = $('#editor-window-all-cost span[name ="costId"]').html();

    $.ajax({
        url: "../costs-and-advances-overview/modal-window/cost/editor/scripts/php/remove-record.php",
        type: "post",
        data: { costId: costId },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {

                alertSuccess(data[1]);

                closeEditorWindowAllCosts();

                refreshCostTable();

            } else {
                //something went wrong with saving input
                alertFailure(data[1]);

            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }

    });

}

function openEditorWindowAllCosts(costId) {
    loadInputsEditorWindowAllCosts(costId);
    $("#editor-window-all-cost").show();
}

function closeEditorWindowAllCosts() {
    $("#editor-window-all-cost").hide();
}

function loadInputsEditorWindowAllCosts(costId) {
    //show costId in title
    $('#editor-window-all-cost span[name ="costId"]').html(costId);

    $.ajax({
        url: "../costs-and-advances-overview/modal-window/cost/editor/scripts/php/load-input.php",
        type: "post",
        data: { costId: costId },
        async: true,

        success: function (response) {
            //console.log("success: " + response);

            var splittedResponse = JSON.parse(response);

            //save response in variables
            var userId = splittedResponse[0];
            var travelId = splittedResponse[1];
            var categoryId = splittedResponse[2];
            var date = splittedResponse[3];
            var amount = splittedResponse[4];
            var description = splittedResponse[5];

            if(travelId != "null") {
                $('#editor-window-all-cost input[name="input-travelId"]').val(travelId);
            } else {
                $('#editor-window-all-cost input[name="input-travelId"]').val("");
            }
            //fill inputs
            $('#editor-window-all-cost select[name="select-username"]').val(userId);
            $('#editor-window-all-cost select[name="select-category"]').val(categoryId);
            $('#editor-window-all-cost input[name="input-date"]').val(date);
            $('#editor-window-all-cost input[name="input-amount"]').val(amount);
            $('#editor-window-all-cost input[name="input-description"]').val(description);

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });

}