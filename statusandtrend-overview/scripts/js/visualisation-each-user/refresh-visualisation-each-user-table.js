class VisTable {

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
        let tmpUserIds = this.filter.userIds;
        let tmpMonthBack = this.filter.trendDiagramMonthBackAmount;

        $.post('../statusandtrend-overview/scripts/php/visualisation-each-user/cost-chart/getCategoryLabelAndItsCost.php',
                {   filterYears: this.filter.costPortionChartOfYears,
                    userIds: tmpUserIds,
                    orderBy: this.sorting.sortingString }, function(response) {
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

            $.post('../statusandtrend-overview/scripts/php/visualisation-each-user/trend-chart/getUsersStateForMonths.php',
                { monthsBack : tmpMonthBack,
                  userIds: tmpUserIds}, function(response) {

                //parse JSON-response into JavaScript
                usersData = JSON.parse(response);

                loadTrendDiagrams(usersData);

            });

        });

        $("#section-visualisation-each-user .button-refresh").val("🗘");
    }

}
