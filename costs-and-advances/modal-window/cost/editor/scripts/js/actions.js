//if page completely loaded
$(window).on("load", function() {

    $("#editor-window-cost .button-save").click(function(){
        saveRecordCost();
    });

    $("#editor-window-cost .button-remove").click(function(){
        removeRecordCost();
    });

    $("#editor-window-cost .button-cancel").click(function(){
        closeEditorWindowCost();
    });

});

function saveRecordCost() {

    var costId = $('#editor-window-cost span[name ="costId"]').html();
    var travelId = $('#editor-window-cost input[name="input-travelId"').val();
    var categoryId = $('#editor-window-cost select[name="select-category"]').val();
    var date = $('#editor-window-cost input[name="input-date"]').val();
    var amount = $('#editor-window-cost input[name="input-amount"]').val();
    var description = $('#editor-window-cost input[name="input-description"]').val();

    $.ajax({
        url: "../costs-and-advances/modal-window/cost/editor/scripts/php/save-record.php",
        type: "post",
        data: { costId: costId,
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

                closeEditorWindowCost();

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

function removeRecordCost() {

    var costId = $('#editor-window-cost span[name ="costId"]').html();

    $.ajax({
        url: "../costs-and-advances/modal-window/cost/editor/scripts/php/remove-record.php",
        type: "post",
        data: { costId: costId },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {

                alertSuccess(data[1]);

                closeEditorWindowCost();

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

function openEditorWindowCost(costId) {
    loadInputsEditorWindowCostAndShowWindow(costId);
}

function closeEditorWindowCost() {
    $("#editor-window-cost").hide();
}

function loadInputsEditorWindowCostAndShowWindow(costId) {
    //show costId in title
    $('#editor-window-cost span[name ="costId"]').html(costId);

    $.ajax({
        url: "../costs-and-advances/modal-window/cost/editor/scripts/php/load-input.php",
        type: "post",
        data: { costId: costId },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var splittedResponse = JSON.parse(response);

            if(splittedResponse[0] == false) {
                alertFailure(splittedResponse[1]);
                return;
            }

            //save response in variables
            var travelId = splittedResponse[1][0];
            var categoryId = splittedResponse[1][1];
            var date = splittedResponse[1][2];
            var amount = splittedResponse[1][3];
            var description = splittedResponse[1][4];

            if(travelId != "null") {
                $('#editor-window-cost input[name="input-travelId"').val(travelId);
            } else {
                $('#editor-window-cost input[name="input-travelId"').val("");
            }

            //fill inputs
            $('#editor-window-cost select[name="select-category"]').val(categoryId);
            $('#editor-window-cost input[name="input-date"]').val(date);
            $('#editor-window-cost input[name="input-amount"]').val(amount);
            $('#editor-window-cost input[name="input-description"]').val(description);

            $("#editor-window-cost").show();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });

}