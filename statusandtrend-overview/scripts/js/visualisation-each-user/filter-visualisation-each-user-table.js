
class VisTableSorting {

    constructor(selectedOrderElement, sortingString) {
        this.selectedOrderElement = selectedOrderElement;
        this.sortingString = sortingString;
    }

    handleStatusSortingImg(element) {
        var sortingType = "ASC";

        if(element.get(0) !== this.selectedOrderElement.get(0)) {
            this.selectedOrderElement.removeClass("sorting_asc");
            this.selectedOrderElement.removeClass("sorting_desc");
            this.selectedOrderElement.addClass("sorting_both");
        }

        //3 cases
        //if sorting_asc => sorting_desc
        //if sorting_desc => sorting_asc
        //if sorting_both => sorting_asc
        if(element.hasClass("sorting_asc")) {
            element.removeClass("sorting_asc");
            element.addClass("sorting_desc");
            sortingType = "DESC";
        } else if(element.hasClass("sorting_desc")) {
            element.removeClass("sorting_desc");
            element.addClass("sorting_asc");
        } else if(element.hasClass("sorting_both")) {
            element.removeClass("sorting_both");
            element.addClass("sorting_asc");
        }

        this.selectedOrderElement = element;

        return sortingType;

    }

}

class VisTableFilter {

    constructor() {
        this.userIds = ['ignore'];
        this.trendDiagramMonthBackAmount = "6";
        this.costPortionChartOfYears = [new Date().getFullYear()-1];
    }

    changeFilterInputs(type) {
        var htmlString = "";

        switch(type) {

            case "username":
                htmlString = '<select>';

                $.ajax({
                    url: "../statusandtrend-overview/scripts/php/status-each-user/utils/UserHTMLList.php",
                    type: "post",
                    async: false,

                    success: function (response) { //returns html options
                        htmlString += response;
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

                htmlString += '</select>';

                break;

            case "trenddia":
                htmlString = '<select>';

                for(var i = 1; i < 15; i++) {
                    if(i === 6) {
                        htmlString += "<option selected>"+ i +"</option>";
                    } else {
                        htmlString += "<option>"+ i +"</option>";
                    }
                }

                htmlString += "</select>";

                break;

            case "costdia":
                //get current year
                var curYear = new Date().getFullYear() - 4;

                htmlString = '<select>';

                for(var i = 0; i < 4; i++) {
                    htmlString += "<option selected>"+ ++curYear +"</option>";
                }

                htmlString += "</select>";

                break;

        }

        $('#section-visualisation-each-user .filter-content-container').html(htmlString);
    }

    addFilter(itemType) {
        //it can be either be one value or two
        var value = this.addFilterItem(itemType);
        if(value == null) return false;

        switch (itemType) {
            case "username":
                this.userIds.push(value);
                break;
        }

        return true;

    }

    addFilterItem(itemType) {
        var htmlString = '<span class = "filter-item';
        var value;

        switch(itemType) {

            case "username":

                value = $('#section-visualisation-each-user.filter-content-container select[name="username-select"] option:selected').text();

                //get ID of category
                var userId = $('#section-visualisation-each-user.filter-content-container select[name="username-select"] option:selected').val();

                htmlString += ' username-item" name = "username-' + userId + '">' + value;

                //check if category already exists
                $('#section-visualisation-each-user.filter-box .username-item').each(function( index ) {
                    if($( this ).text().indexOf(value) != -1) {
                        alertFailure('Already exists');
                        htmlString = "";
                        return;
                    }
                });

                //value has to be the user id, its for the database
                value = userId;

                break;

            case "trenddia":
            case "costdia":
                htmlString = '<input type = "number">';
                break;

        }

        if(htmlString == "") {
            return false;
        }

        htmlString += '<span class = "option-remove">&#x2715;</span></span>';

        //append item
        $('#section-visualisation-each-user.filter-box .filter-container').append(htmlString);

        //set input value to '' again
        $('#section-visualisation-each-user.filter-content-container input[type="text"]').val('');

        return value;
    }

    removeFilter(nameId) {

        var splitted = nameId.split('-');

        switch (splitted[0]) {
            case "username":
                this.userIds = this.userIds.filter(e => e !== splitted[1]);
                break;
        }

        this.removeFilterItem(nameId);
    }

    removeFilterItem(nameId) {
        $('#section-visualisation-each-user.filter-box .filter-container .filter-item[name='+ nameId +']').remove();
    }

}