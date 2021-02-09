function refreshStatusEachUserTable() {

    var orderBy = $('#section-status-each-user input:radio[name="status-each-user-order"]:checked').val();
    var filterUserIds;


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

    $("#section-status-each-user .table-body-status").load("../statusandtrend-overview/scripts/php/status-each-user/load/status-each-user-echo.php", {
        filterUserIds: filterUserIds,
        orderBy: orderBy
    }, function() {});

    $("#section-status-each-user .button-refresh").val("🗘");

}
