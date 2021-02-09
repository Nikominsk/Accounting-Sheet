//if page completely loaded
$(window).on("load", function() {

    $("#modal-window-filter-trend-chart .button-ok").click(function(e) {

        $("#modal-window-filter-trend-chart").hide();

        var amountMonthsBack= $('#modal-window-filter-trend-chart select[name="select-months-back"]').val();
    
        /* filterYear is an Array of Strings, I create a single string where each element is seperated by " | " */
        $('#section-trend-chart .months-back').html(amountMonthsBack);
        
        loadDiagramTrend();

    });

});