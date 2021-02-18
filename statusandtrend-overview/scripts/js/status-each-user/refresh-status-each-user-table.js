class StatusTable {

    constructor(statusTableSorting, statusTableFilter) {
        this.sorting = statusTableSorting;
        this.filter = statusTableFilter;
    }

    sort(documentId, documentName) {
        let sortingType = this.sorting.handleStatusSortingImg($("#section-status-each-user #" + documentId + " .sorting-img"));
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

        var filterUserIds;
        /*
        var filteredUsers = $('#modal-window-filter-status-each-user select[name=select-user] option:selected').toArray().map(item => item.text).join(" | ");
        if(filteredUsers .includes("All |") || filteredUsers .includes("Only Active Users | Only Inactive Users")) {
            filterUserIds = ['ALL'];
        } else if (filteredUsers .includes("Only Active Users")) {
            filterUserIds = ['ONLYACTIVES'];
        } else if (filteredUsers .includes("Only Inactive Users")) {
            filterUserIds = ['ONLYINACTIVES'];
        } else {
            filterUserIds = $('#modal-window-filter-status-each-user select[name=select-user]').val();
        }
        */

        $("#section-status-each-user .table-body-status").load("../statusandtrend-overview/scripts/php/status-each-user/load/status-each-user-echo.php", {
            userIds: this.filter.userIds,
            orderBy: this.sorting.sortingString
        }, function() {});

        $("#section-status-each-user .button-refresh").val("🗘");

    }

}
