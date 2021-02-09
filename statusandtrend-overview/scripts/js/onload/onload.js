//if page completely loaded
$(window).on("load", function() {

    refreshStatus();

    $("#section-status-each-user .filter-label").click(function(e) {
        $("#modal-window-filter-status-each-user").show();
    });

    $("#section-status-each-user .button-refresh").click(function(){
        refreshStatusEachUserTable();
    });

    //if user changed sorting method of status-each-user-table
    $('#section-status-each-user input:radio[name="status-each-user-order"]').change(function(){
        refreshStatusEachUserTable();
    });


    $('#section-visualisation-each-user .filter-label').click(function(e) {
        $("#modal-window-filter-visualisation-each-user").show();
    });

    $('#section-visualisation-each-user input:radio[name="visualisation-each-user-order"]').click(function(e) {
        refreshVisualisationEachUserTable();
    });


    $('#section-visualisation-each-user .button-refresh').click(function(){
        refreshVisualisationEachUserTable();
    });

    $('#section-visualisation-each-user .months-back').html($('#modal-window-filter-visualisation-each-user select[name="select-months-back"]').val());
    $('#section-visualisation-each-user .filter-years').html($('#modal-window-filter-visualisation-each-user select[name="select-years"]').val());

    $("#section-status-each-user .button-export-to-csv").click(function(e) {
        var table = document.getElementById("section-status-each-user").getElementsByClassName("table-showcase")[0];
        exportTableToCSV(table, "status-each-user");
    });


});