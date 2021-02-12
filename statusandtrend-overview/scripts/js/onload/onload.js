//if page completely loaded
$(window).on("load", function() {

    //set default values
    let statusTableSorting = new StatusTableSorting(  $("#username-div .sorting-img"),
                                                "costId ASC");
    let statusTableFilter = new StatusTableFilter();
    let statusTable = new StatusTable(statusTableSorting, statusTableFilter);
    statusTable.filter.changeFilterInputs( $('#section-status-each-user .table-settings-bar select').val(),
    $('#section-status-each-user .table-settings-bar select option:selected'));

    /* STATUS EACH USER TABLE */

    //only for ordering
    $("#section-status-each-user .table-showcase th div").click(function(e) {
        statusTable.sort($(this).attr('id'), $(this).attr('name'));
    });

    //change input field if user wants to filter after something
    $('#section-status-each-user .table-settings-bar select[name="filter-options"]').on('change', function() {
        statusTable.filter.changeFilterInputs(this.value, $('#section-status-each-user .table-settings-bar select option:selected').html());
    });

    //add filter item and refresh table
    $('#section-status-each-user .table-settings-bar .add-filter-item-button').on('click', function() {
        statusTable.addFilter($('#section-status-each-user .table-settings-bar select').val());

        //Even Listener for removing filter + filter item
        $('#section-status-each-user .filter-box .filter-container .filter-item .option-remove').on('click', function() {
            statusTable.removeFilter($(this.parentElement).attr('name'));
        });

    });

    $("#section-status-each-user .filter-label").click(function(e) {
        $("#modal-window-filter-status-each-user").show();
    });

    $("#section-status-each-user .button-refresh").click(function(){
        statusTable.refresh();
    });


    /* VISUALISATION EACH USER */

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