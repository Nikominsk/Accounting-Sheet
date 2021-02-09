//if page completely loaded
$(window).on("load", function() {
    
    refreshStatus();

    $("#section-cost-chart .filter-label").click(function(e) {
        $("#modal-window-filter-cost-chart").show();
    });

    $("#section-cost-chart .button-refresh").click(function(){
        loadDiagramPie();
    });

    $("#section-trend-chart .filter-label").click(function(e) {
        $("#modal-window-filter-trend-chart").show();
    });

    $("#section-trend-chart .button-refresh").click(function(){
        loadDiagramTrend();
    });

    $('#section-cost-chart .filter-years').html($('#modal-window-filter-cost-chart select[name="select-years"]').val());
    $('#section-trend-chart .months-back').html($('#modal-window-filter-trend-chart select[name="select-months-back"]').val());

});
