//if page completely loaded
$(window).on("load", function() {

    $("#editor-window-all-advance .button-save").click(function(){
        saveRecordAdvanceOverview();
    });

    $("#editor-window-all-advance .button-remove").click(function(){
        removeRecordAdvanceOverview();
    });

    $("#editor-window-all-advance .button-cancel").click(function(){
        closeEditorWindowAdvance();
    });

});


function saveRecordAdvanceOverview() {

    var advanceId = $('#editor-window-all-advance span[name ="advanceId"]').html();

    var userId = $('#editor-window-all-advance select[name="select-username"]').val();
    var date = $('#editor-window-all-advance input[name="input-date"]').val();
    var advance = $('#editor-window-all-advance input[name="input-advance"]').val();

    $.ajax({
        url: "../costs-and-advances-overview/modal-window/advance/editor/scripts/php/save-record.php",
        type: "post",
        data: { advanceId: advanceId,
                userId: userId,
                date: date,
                advance: advance },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {

                alertSuccess(data[1]);

                closeEditorWindowAllAdvances();

                refreshAdvanceTable();

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

function removeRecordAdvanceOverview() {

    var advanceId = $('#editor-window-all-advance span[name="advanceId"]').html();

    $.ajax({
        url: "../costs-and-advances-overview/modal-window/advance/editor/scripts/php/remove-record.php",
        type: "post",
        data: { advanceId: advanceId },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {

                alertSuccess(data[1]);

                closeEditorWindowAllAdvances();

                refreshAdvanceTable();

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

function openEditorWindowAllAdvances(advanceId) {
    loadInputsEditorWindowAllAdvances(advanceId);
    $("#editor-window-all-advance").show();
}

function closeEditorWindowAllAdvances() {
    $("#editor-window-all-advance").hide();
}

function loadInputsEditorWindowAllAdvances(advanceId) {
    //show costId in title
    $('#editor-window-all-advance span[name ="advanceId"]').html(advanceId);

    $.ajax({
        url: "../costs-and-advances-overview/modal-window/advance/editor/scripts/php/load-input.php",
        type: "post",
        data: { advanceId: advanceId },
        async: true,

        success: function (response) {
            //console.log("success: " + response);

            var splittedResponse = JSON.parse(response);

            //save response in variables
            var userId = splittedResponse[0];
            var date = splittedResponse[1];
            var advance = splittedResponse[2];

            //fill inputs

            $('#editor-window-all-advance select[name="select-username"]').val(userId);
            $('#editor-window-all-advance input[name="input-date"]').val(date);
            $('#editor-window-all-advance input[name="input-advance"]').val(advance);

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });

}