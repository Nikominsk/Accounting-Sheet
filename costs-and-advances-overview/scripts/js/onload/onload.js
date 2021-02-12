//if page completely loaded
$(window).on("load", function() {

    //refreshStatus();

    //set default values
    let costTableSorting = new CostTableSorting(  $("#costId-div .sorting-img"),
                                                    "costId ASC");
    let costTableFilter = new CostTableFilter();
    let costTable = new CostTable(costTableSorting, costTableFilter);
    costTable.filter.changeFilterInputs( $('#section-all-costs .table-settings-bar select').val(),
                                        $('#section-all-costs .table-settings-bar select option:selected'));


    let advTableSorting = new AdvanceTableSorting(  $("#advanceId-div .sorting-img"),
                                                    "advanceId ASC");
    let advTableFilter = new AdvanceTableFilter();
    let advTable = new AdvanceTable(advTableSorting, advTableFilter);
    advTable.filter.changeFilterInputs( $('#section-all-advances .table-settings-bar select').val());


    //only for ordering
    $("#section-all-costs .table-showcase th div").click(function(e) {
        costTable.sort($(this).attr('id'), $(this).attr('name'));
    });

    //change input field if user wants to filter after something
    $('#section-all-costs .table-settings-bar select[name="filter-options"]').on('change', function() {
        costTable.filter.changeFilterInputs(this.value, $('#section-all-costs .table-settings-bar select option:selected').html());
    });

    //add filter item and refresh table
    $('#section-all-costs .table-settings-bar .add-filter-item-button').on('click', function() {
        costTable.addFilter($('#section-all-costs .table-settings-bar select').val());

        //Even Listener for removing filter + filter item
        $('#section-all-costs .filter-box .filter-container .filter-item .option-remove').on('click', function() {
            costTable.removeFilter($(this.parentElement).attr('name'));
        });

    });



    /* ADVANCE TABLE */

    //only for ordering
    $("#section-all-advances .table-showcase th div").click(function(e) {
        advTable.sort($(this).attr('id'), $(this).attr('name'));
    });

    //change input field if user wants to filter after something
    $('#section-all-advances .table-settings-bar select[name="filter-options"]').on('change', function() {
        advTable.filter.changeFilterInputs(this.value);
    });

    //add filter item and refresh table
    $('#section-all-advances .table-settings-bar .add-filter-item-button').on('click', function() {
        advTable.addFilter($('#section-all-advances .table-settings-bar select').val());

        //Even Listener for removing filter + filter item
        $('#section-all-advances .filter-box .filter-container .filter-item .option-remove').on('click', function() {
            advTable.removeFilter($(this.parentElement).attr('name'));
        });

    });

    $("#section-all-costs .filter-label").click(function(e) {
        $("#modal-window-filter-all-cost").show();
    });

    $("#section-all-costs .button-refresh").click(function(){
        costTable.refresh();
    });

    $("#section-all-advances .filter-label").click(function(e) {
        $("#modal-window-filter-all-advance").show();
    });

    $("#section-all-advances .button-refresh").click(function(){
        advTable.refresh();
    });

    //fill some fields
    $('#section-all-costs .filter-date').html(getFirstDateThisYear().replace(/-/g, '.') + ' - ' + getCurrentDate().replace(/-/g, '.'));
    $('#section-all-advances .filter-date').html(getFirstDateThisYear().replace(/-/g, '.') + ' - ' + getCurrentDate().replace(/-/g, '.'));
    
    //init labels of totals
    $("#section-all-costs .total-costs").load("../costs-and-advances-overview/scripts/php/cost/load/cost-total.php");
    $("#section-all-advances .total-advance").load("../costs-and-advances-overview/scripts/php/advance/load/advance-total.php");

    $("#section-all-costs .button-export-to-csv").click(function(e) {
        var table = document.getElementById("section-all-costs").getElementsByClassName("table-showcase")[0];
        exportTableToCSV(table, "cost-overview");
    });

    $("#section-all-advances .button-export-to-csv").click(function(e) {
        var table = document.getElementById("section-all-advances").getElementsByClassName("table-showcase")[0];
        exportTableToCSV(table, "advance-overview");
    });

});