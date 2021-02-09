class AdvanceTable {

    constructor(advanceTableSorting, advanceTableFilter) {
        this.sorting = advanceTableSorting;
        this.filter = advanceTableFilter;
    }

    sort(documentId, documentName) {
        let sortingType = this.sorting.handleAdvanceSortingImg($("#section-advance #" + documentId + " .sorting-img"));
        this.sorting.sortingString = documentName + " " + sortingType;
        this.refresh();
    }

    addFilter(itemType) {
        if(this.filter.addFilter(itemType)) this.refresh();
    }

    removeFilter(nameId){
        this.filter.removeFilter(nameId);
        this.refresh();
    }

    refresh() {

        //refresh cost-table
        $("#section-advance .table-tbody-advance").load("../costs-and-advances/scripts/php/advance/load/advance-table.php", {
                //send data to php file
                startDate: this.filter.startDate,
                endDate: this.filter.endDate,
                startAdvance: this.filter.startAdvance,
                endAdvance: this.filter.endAdvance,
                orderBy: this.sorting.sortingString

        }, function() {

            //prevent loading php before jquery
            $("#section-advance .total-advance").load("../costs-and-advances/scripts/php/advance/load/advance-total.php");

        });

        $("#section-advance .button-refresh").val("🗘");
    }
}