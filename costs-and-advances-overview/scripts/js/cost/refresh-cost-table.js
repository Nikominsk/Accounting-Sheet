class CostTable {

    constructor(costTableSorting, costTableFilter) {
        this.sorting = costTableSorting;
        this.filter = costTableFilter;
    }

    sort(documentId, documentName) {
        let sortingType = this.sorting.handleCostSortingImg($("#section-all-costs #" + documentId + " .sorting-img"));
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
        $("#section-all-costs .table-tbody-costs").load("../costs-and-advances-overview/scripts/php/cost/load/cost-table.php", {
                //send data to php file
                userIds: this.filter.userIds,
                descriptions: this.filter.descriptions,
                categoryIds: this.filter.categoryIds,
                startPrice: this.filter.startPrice,
                endPrice: this.filter.endPrice,
                startDate: this.filter.startDate,
                endDate: this.filter.endDate,
                orderBy: this.sorting.sortingString
    
        }, function() {
    
            //prevent loading php before jquery
            $("#section-all-costs .total-costs").load("../costs-and-advances-overview/scripts/php/cost/load/cost-total.php");
    
        });
    
        $("#section-all-costs .button-refresh").val("🗘");
    
    }

}
