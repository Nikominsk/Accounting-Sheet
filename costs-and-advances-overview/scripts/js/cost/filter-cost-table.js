class CostTableSorting {

    constructor(selectedOrderElement, sortingString) {
        this.selectedOrderElement = selectedOrderElement;
        this.sortingString = sortingString;
    }

    handleCostSortingImg(element) {
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



class CostTableFilter {

    constructor() {
        this.userIds = ['ignore'];
        this.startDate = "";
        this.endDate = "";
        this.startPrice = "";
        this.endPrice = "";
        this.descriptions = ['ignore'];
        this.categoryIds = ['ignore'];
    }

    changeFilterInputs(value, content) {
        var htmlString = "";
        switch(value) {
            case "description":
                htmlString = '<input type = "text" placeholder = "'+ content +'">';
                break;

            case "username":

                htmlString = '<select name = "username-select">';

                $.ajax({
                    url: "../costs-and-advances-overview/scripts/php/utils/UserHTMLList.php",
                    type: "post",
                    async: false,

                    success: function (response) { //returns html options
                        //console.log('response: ' + response);
                        htmlString += response;
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

                htmlString += '</select>';

                break;

            case "category":

                htmlString = '<select name = "category-select">';

                $.ajax({
                    url: "../utils/php/Category.php",
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


            case "amount":

                htmlString =    '<div class = "filter-inputs-container">' +
                                    '<span>Von:' +
                                        '<input type="text" name = "input-amount" placeholder = "Betrag von" />' +
                                    '</span>' +
                                    '<span>Bis:' +
                                        '<input type="text" name = "input-amount" placeholder = "Betrag bis" />' +
                                    '</span>' +
                                '</div>';

                break;

            case "date":

                htmlString =    '<div class = "filter-inputs-container">' +
                                    '<span>Von:' +
                                        '<input type="date" name = "input-date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value = "'+ getFirstDateThisYear() +'"/>' +
                                    '</span>' +
                                    '<span>Bis:' +
                                        '<input type="date" name = "input-date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value = "'+ getCurrentDate() +'"/>' +
                                    '</span>' +
                                '</div>';

                break;

        }

        $('#section-all-costs .filter-content-container').html(htmlString);

    }

    addFilter(itemType) {
        //it can be either be 1 value or 2
        var value = this.addFilterItem(itemType);

        if(value == null) return false;

        switch (itemType) {
            case "username":
                this.userIds.push(value);
                break;
            case "description":
                this.descriptions.push(value);
                break;
            case "category":
                this.categoryIds.push(value);
                break;
            case "date":
                this.startDate = value[0];
                this.endDate = value[1];
                break;
            case "amount":
                this.startPrice = value[0];
                this.endPrice = value[1];
                break;
        }

        return true;

    }

    addFilterItem(itemType) {
        var htmlString = '<span class = "filter-item';
        var value;

        switch(itemType) {
            case "description":

                value = $('#section-all-costs .filter-content-container input').val().trim();
                value = value.toLocaleLowerCase();

                if(value == '') {
                    alertFailureLang("InvInput7");
                    return null;
                }

                htmlString += ' description-item" name = "description-' + value + '">'+ value;

                //check if category already exists
                $('#section-all-costs .filter-box .description-item').each(function( index ) {
                    if($( this ).text().toLocaleLowerCase().indexOf(value) != -1) {
                        alertFailureLang("AlreadyExistsError4");
                        htmlString = null;
                    }
                });

                break;

            case "username":

                value = $('#section-all-costs .filter-content-container select[name="username-select"] option:selected').text();

                //get ID of category
                var userId = $('#section-all-costs .filter-content-container select[name="username-select"] option:selected').val();

                htmlString += ' username-item" name = "username-' + userId + '">' + value;

                //check if category already exists
                $('#section-all-costs .filter-box .username-item').each(function( index ) {
                    if($( this ).text().indexOf(value) != -1) {
                        alertFailureLang("AlreadyExistsError5");
                        htmlString = null;
                    }
                });

                //value has to be the user id, its for the database
                value = userId;

                break;

            case "category":

                value = $('#section-all-costs .filter-content-container select[name="category-select"] option:selected').text();

                //get ID of category
                var categoryId = $('#section-all-costs .filter-content-container select[name="category-select"] option:selected').val();

                htmlString += ' category-item" name = "category-' + categoryId + '">' + value;

                //check if category already exists
                $('#section-all-costs .filter-box .category-item').each(function( index ) {
                    if($( this ).text().indexOf(value) != -1) {
                        alertFailureLang("AlreadyExistsError1");
                        htmlString = null;
                    }
                });

                //value has to be the category id, its for the database
                value = categoryId;

                break;

            case "amount":
                var startPrice =  $('#section-all-costs .right-div .filter-inputs-container span:first-child input[type="text"]').val().trim();
                var endPrice =  $('#section-all-costs .right-div .filter-inputs-container span:last-child input[type="text"]').val().trim();

                startPrice = parseInt(startPrice);
                endPrice = parseInt(endPrice);

                if(isNaN(startPrice) || isNaN(endPrice)|| startPrice < 0 || endPrice < 0) {
                    alertFailureLang("InvInput19");
                    return null;
                }

                if(startPrice > endPrice) {
                    var tmp = startPrice;
                    startPrice = endPrice;
                    endPrice = tmp;
                }

                value = [startPrice, endPrice];

                htmlString += ' amount-item" name = "amount">' + startPrice + "€ - " + endPrice + "€";

                if($('#section-all-costs .filter-box .amount-item').length != 0) {
                    if (confirm('You already filter for price, do you want to replace it?')) {
                        $('#section-all-costs .filter-box .amount-item').remove();
                    } else {
                        htmlString = null;
                    }
                }

                break;

            case "date":

                var startDate =  $('#section-all-costs .right-div .filter-inputs-container span:first-child input[type="date"]').val().replace(/-/g, '.');
                var endDate =  $('#section-all-costs .right-div .filter-inputs-container span:last-child input[type="date"]').val().replace(/-/g, '.');

                if(startDate > endDate) {
                    var tmp = endDate;
                    endDate = startDate;
                    startDate = tmp;
                }

                value = [startDate, endDate];

                htmlString += ' date-item" name = "date">' + startDate + " - " + endDate;

                if($('#section-all-costs .filter-box .date-item').length != 0) {
                    if (confirm('You already filter for date, do you want to replace it?')) {
                        $('#section-all-costs .filter-box .date-item').remove();
                    } else {
                        htmlString = null;
                    }
                }

                break;

        }

        if(htmlString == null) return null;

        htmlString += '<span class = "option-remove">&#x2715;</span></span>';

        //append item
        $('#section-all-costs .filter-box .filter-container').append(htmlString);

        //set input value to '' again
        $('#section-all-costs .filter-content-container input[type="text"]').val('');

        return value;
    }

    removeFilter(nameId) {

        var splitted = nameId.split('-');

        switch (splitted[0]) {
            case "username":
                this.userIds = this.userIds.filter(e => e !== splitted[1]);
                break;
            case "description":
                this.descriptions = this.descriptions.filter(e => e !== splitted[1]);
                break;
            case "category":
                this.categoryIds = this.categoryIds.filter(e => e !== splitted[1]);
                break;
            case "amount":
                this.startPrice = "";
                this.endPrice = "";
                break;
            case "date":
                this.startDate = "";
                this.endDate = "";
                break;
        }

        this.removeFilterItem(nameId);
    }

    removeFilterItem(nameId) {
        $('#section-all-costs .filter-box .filter-container .filter-item[name='+ nameId +']').remove();
    }

}
