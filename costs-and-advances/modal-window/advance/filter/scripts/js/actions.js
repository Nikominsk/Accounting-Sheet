//if page completely loaded
$(window).on("load", function() {

    $("input[name='input-date-from']").val(getFirstDateThisYear());
    $("input[name='input-date-to']").val(getCurrentDate());


    $("#modal-window-filter-advance .button-ok").click(function(e) {
        $("#modal-window-filter-advance").hide();

        /* filterYear is an Array of Strings, I create a single string where each element is seperated by " | " */
        $('#section-advance .filter-date').html($("input[name='input-date-from']").val().replace(/-/g, '.') + ' - ' + $("input[name='input-date-to']").val().replace(/-/g, '.'));

        refreshAdvanceTable();
    });

});