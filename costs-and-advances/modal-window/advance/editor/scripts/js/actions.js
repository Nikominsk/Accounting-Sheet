//if page completely loaded
$(window).on("load", function() {

    $("#editor-window-advance .button-save").click(function(){
        saveRecordAdvance();
    });

    $("#editor-window-advance .button-remove").click(function(){
        removeRecordAdvance();
    });

    $("#editor-window-advance .button-cancel").click(function(){
        closeEditorWindowAdvance();
    });

});


function saveRecordAdvance() {

    var advanceId = $('#editor-window-advance span[name ="advanceId"]').html();
    var date = $('#editor-window-advance input[name="input-date"]').val();
    var advance = $('#editor-window-advance input[name="input-advance"]').val();

    $.ajax({
        url: "../costs-and-advances/modal-window/advance/editor/scripts/php/save-record.php",
        type: "post",
        data: { advanceId: advanceId,
                date: date,
                advance: advance },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {

                alertSuccess(data[1]);

                closeEditorWindowAdvance();

                advTable.refresh();

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

function removeRecordAdvance() {

    var advanceId = $('#editor-window-advance span[name ="advanceId"]').html();

    $.ajax({
        url: "../costs-and-advances/modal-window/advance/editor/scripts/php/remove-record.php",
        type: "post",
        data: { advanceId: advanceId },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {

                alertSuccess(data[1]);

                closeEditorWindowAdvance();

                advTable.refresh();

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

function openEditorWindowAdvance(advanceId) {
    loadInputsEditorWindowAdvanceAndShowWindow(advanceId);
}

function closeEditorWindowAdvance() {
    $("#editor-window-advance").hide();
}

function loadInputsEditorWindowAdvanceAndShowWindow(advanceId) {
    //show costId in title
    $('#editor-window-advance span[name ="advanceId"]').html(advanceId);

    $.ajax({
        url: "../costs-and-advances/modal-window/advance/editor/scripts/php/load-input.php",
        type: "post",
        data: { advanceId: advanceId },
        async: true,

        success: function (response) {
            //console.log("success: " + response);

            var splittedResponse = JSON.parse(response);

            if(splittedResponse[0] == false) {
                alertFailure(splittedResponse[1]);
                return;
            }

            //save response in variables
            var date = splittedResponse[1][0];
            var advance = splittedResponse[1][1];

            //fill inputs
            $('#editor-window-advance input[name="input-date"]').val(date);
            $('#editor-window-advance input[name="input-advance"]').val(advance);

            $("#editor-window-advance").show();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });

}