function refreshVisualisationEachUserTable() {

    var orderBy = $('#section-visualisation-each-user input:radio[name="visualisation-each-user-order"]:checked').val();
    var filterUserIds;

    var filterYears = $('#modal-window-filter-visualisation-each-user select[name="select-years"]').val();
    var monthsBack = $('#modal-window-filter-visualisation-each-user select[name="select-months-back"]').val();


    var filteredUsers = $('#modal-window-filter-visualisation-each-user select[name=select-user] option:selected').toArray().map(item => item.text).join(" | ");
    if(filteredUsers .includes("All |") || filteredUsers .includes("Only Active Users | Only Inactive Users")) {
        filterUserIds = ['ALL'];
    } else if (filteredUsers .includes("Only Active Users")) {
        filterUserIds = ['ONLYACTIVES'];
    } else if (filteredUsers .includes("Only Inactive Users")) {
        filterUserIds = ['ONLYINACTIVES'];
    } else {
        filterUserIds = $('#modal-window-filter-visualisation-each-user select[name=select-user]').val();
    }

    $.post('../statusandtrend-overview/scripts/php/visualisation-each-user/cost-chart/getCategoryLabelAndItsCost.php', { filterYears: filterYears, filterUserIds: filterUserIds, orderBy: orderBy }, function(response) {
        //console.log("success: " + response);

        //parse JSON-response into JavaScript
        var usersData = JSON.parse(response);

        $('#section-visualisation-each-user .table-body-chart').text("");

        for(var i = 0; i < usersData.length; i++) {

            //append data to table status
            $('#section-visualisation-each-user .table-body-chart').append(   '<tr id = "tr-'+ usersData[i][0] +'">'+ /*username*/
                                                    '<td>' + usersData[i][0] +  '</td>'+
                                                    '<td> <div class = "canvas-div"> <canvas class = "chart-trend"></canvas> </div> </td>'+
                                                    '<td> <div class = "canvas-div"> <canvas class = "chart-pie"></canvas> </div> </td>'+
                                                "</tr>");

        }

        //as table appended, we can load pies in
        loadPieDiagrams(usersData);

        //completed appending table and pie diagramms (did it togehter)

        //as table exists, load trend diagramms in

        $.post('../statusandtrend-overview/scripts/php/visualisation-each-user/trend-chart/getUsersStateForMonths.php', { monthsBack : monthsBack, filterUserIds: filterUserIds}, function(response) {
            //console.log(response);

            //parse JSON-response into JavaScript
            usersData = JSON.parse(response);


            loadTrendDiagrams(usersData);


        });

    });

    $("#section-visualisation-each-user .button-refresh").val("🗘");

}
