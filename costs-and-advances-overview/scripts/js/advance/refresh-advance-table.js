class AdvanceTable {

    constructor(advanceTableSorting, advanceTableFilter) {
        this.sorting = advanceTableSorting;
        this.filter = advanceTableFilter;
    }

    sort(documentId, documentName) {
        let sortingType = this.sorting.handleAdvanceSortingImg($("#section-all-advances #" + documentId + " .sorting-img"));
        this.sorting.sortingString = documentName + " " + sortingType;
        this.refresh();
    }

    addFilter(itemType) {
        if(this.filter.addFilter(itemType)) this.refresh();
    }

    removeFilter(nameId){
        console.log('remove filter3: ' + nameId);
        this.filter.removeFilter(nameId);
        this.refresh();
    }

    refresh() {
        //refresh cost-table
        $("#section-all-advances .table-tbody-advance").load("../costs-and-advances-overview/scripts/php/advance/load/advance-table.php", {
                //send data to php file
                userIds: this.filter.userIds,
                startDate: this.filter.startDate,
                endDate: this.filter.endDate,
                startAdvance: this.filter.startAdvance,
                endAdvance: this.filter.endAdvance,
                orderBy: this.sorting.sortingString

        }, function() {

            //prevent loading php before jquery
            $("#section-all-advances .total-advance").load("../costs-and-advances-overview/scripts/php/advance/load/advance-total.php");

        });

        $("#section-all-advance .button-refresh").val("🗘");
    }
}