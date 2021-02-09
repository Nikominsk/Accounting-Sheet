var curCostSelectedOrderElem = null;
var curCostSortingString = null;

var startDate = "", endDate = "";
var startPrice = "", endPrice = "";
var descriptions = ['ignore'];
var categorieIds = ['ignore'];
var userIds = ['ignore'];
var sortBy = "costId ASC";

function setCurCostSorting(sortBy) {
    curCostSortingString = sortBy;
}

function addFilterDescription(desc) {
    descriptions.push(desc);
    refreshCostTable();
}

function removeFilterDescription(desc) {
    descriptions = descriptions.filter(e => e !== desc);
    refreshCostTable();
}

function addFilterUserId(userId) {
    userIds.push(userId);
    refreshCostTable();
}

function removeFilterUserId(userId) {
    userIds = userIds.filter(e => e !== userId);
    refreshCostTable();
}

function addFilterCategoryId(categId) {
    categorieIds.push(categId);
    refreshCostTable();
}

function removeFilterCategoryId(categId) {
    categorieIds = categorieIds.filter(e => e !== categId);
    refreshCostTable();
}

function setFilterDate(start, end) {
    startDate = start;
    endDate = end;
    refreshCostTable();
}

function removeFilterDate() {
    startDate = "";
    endDate = "";
    refreshCostTable();
}

function setFilterAmount(start, end) {
    startPrice = start;
    endPrice = end;
    refreshCostTable();
}

function removeFilterAmount() {
    startPrice = "";
    endPrice = "";
    refreshCostTable();
}

function refreshCostTable() {

    //refresh cost-table
    $("#section-all-costs .table-tbody-costs").load("../costs-and-advances-overview/scripts/php/cost/load/cost-table.php", {
            //send data to php file
            descriptions: descriptions,
            userIds: userIds,
            categoryIds: categorieIds,
            startPrice: startPrice,
            endPrice: endPrice,
            startDate: startDate,
            endDate: endDate,
            sortBy: curCostSortingString

    }, function() {

        //prevent loading php before jquery
        $("#section-all-costs .total-costs").load("../costs-and-advances-overview/scripts/php/cost/load/cost-total.php");

    });

    $("#section-all-costs .button-refresh").val("🗘");

}