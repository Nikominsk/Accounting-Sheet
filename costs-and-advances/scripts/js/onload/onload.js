//if page completely loaded
$(window).on("load", function() {

    //refreshStatus();

    //set default values
    let costTableSorting = new CostTableSorting(  $("#costId-div .sorting-img"),
                                                "costId ASC");
    let costTableFilter = new CostTableFilter();
    let costTable = new CostTable(costTableSorting, costTableFilter);
    costTable.filter.changeFilterInputs( $('#section-costs .table-settings-bar select').val(),
                                        $('#section-costs .table-settings-bar select option:selected'));


    let advTableSorting = new AdvanceTableSorting(  $("#advanceId-div .sorting-img"),
                                                    "advanceId ASC");
    let advTableFilter = new AdvanceTableFilter();
    let advTable = new AdvanceTable(advTableSorting, advTableFilter);

    advTable.filter.changeFilterInputs( $('#section-advance .table-settings-bar select').val());

    /* COST TABLE */

    //only for ordering
    $("#section-costs.table-showcase th div").click(function(e) {
        costTable.sort($(this).attr('id'), $(this).attr('name'));
    });

    //change input field if user wants to filter after something
    $('#section-costs .table-settings-bar select[name="filter-options"]').on('change', function() {
        costTable.filter.changeFilterInputs(this.value, $('#section-costs .table-settings-bar select option:selected').html());
    });

    //add filter item and refresh table
    $('#section-costs .table-settings-bar .add-filter-item-button').on('click', function() {
        costTable.addFilter($('#section-costs .table-settings-bar select').val());

        //Even Listener for removing filter + filter item
        $('#section-costs .filter-box .filter-container .filter-item .option-remove').on('click', function() {
            costTable.removeFilter($(this.parentElement).attr('name'));
        });

    });

    /* ADVANCE TABLE */

    //only for ordering
    $("#section-advance .table-showcase th div").click(function(e) {
        advTable.sort($(this).attr('id'), $(this).attr('name'));
    });

    //change input field if user wants to filter after something
    $('#section-advance .table-settings-bar select[name="filter-options"]').on('change', function() {
        advTable.filter.changeFilterInputs(this.value);
    });

    //add filter item and refresh table
    $('#section-advance .table-settings-bar .add-filter-item-button').on('click', function() {
        advTable.addFilter($('#section-advance .table-settings-bar select').val());

        //Even Listener for removing filter + filter item
        $('#section-advance .filter-box .filter-container .filter-item .option-remove').on('click', function() {
            advTable.removeFilter($(this.parentElement).attr('name'));
        });

    });



    $("#section-costs .filter-label").click(function(e) {
        $("#modal-window-filter-cost").show();
    });

    $("#section-costs .button-refresh").click(function(){
        costTable.refresh();
    });

    $("#section-advance .filter-label").click(function(e) {
        $("#modal-window-filter-advance").show();
    });

    $("#section-advance .button-refresh").click(function(){
        advTable.refresh();
    });

    //fill some fields
    $('#section-costs .filter-date').html(getFirstDateThisYear().replace(/-/g, '.') + ' - ' + getCurrentDate().replace(/-/g, '.'));
    $('#section-advance .filter-date').html(getFirstDateThisYear().replace(/-/g, '.') + ' - ' + getCurrentDate().replace(/-/g, '.'));

    //init labels of totals
    $("#section-costs .total-costs").load("../costs-and-advances/scripts/php/cost/load/cost-total.php");
    $("#section-advance .total-advance").load("../costs-and-advances/scripts/php/advance/load/advance-total.php");

    $("#section-costs .button-export-to-csv").click(function(e) {
        var table = document.getElementById("section-costs").getElementsByClassName("table-showcase")[0];
        exportTableToCSV(table, "cost");
    });

    $("#section-advance .button-export-to-csv").click(function(e) {
        var table = document.getElementById("section-advance").getElementsByClassName("table-showcase")[0];
        exportTableToCSV(table, "advance");
    });

});
