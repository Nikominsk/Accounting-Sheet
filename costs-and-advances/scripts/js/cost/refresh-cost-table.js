class CostTable {

    constructor(costTableSorting, costTableFilter) {
        this.sorting = costTableSorting;
        this.filter = costTableFilter;
    }

    sort(documentId, documentName) {
        let sortingType = this.sorting.handleCostSortingImg($("#section-costs #" + documentId + " .sorting-img"));
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
        $("#section-costs .table-tbody-costs").load("../costs-and-advances/scripts/php/cost/load/cost-table.php", {
                //send data to php file
                descriptions: this.filter.descriptions,
                categoryIds: this.filter.categoryIds,
                startPrice: this.filter.startPrice,
                endPrice: this.filter.endPrice,
                startDate: this.filter.startDate,
                endDate: this.filter.endDate,
                orderBy: this.sorting.sortingString

        }, function(val) {
            //prevent loading php before jquery
            $("#section-costs .total-costs").load("../costs-and-advances/scripts/php/cost/load/cost-total.php");

        });

        $("#section-costs .button-refresh").val("🗘");
    }

}