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

        $('#section-costs .filter-content-container').html(htmlString);

    }

    addFilter(itemType) {
        //it can be either be 1 value (not array) or 2
        var value = this.addFilterItem(itemType);

        if(value == null) return false;

        switch (itemType) {
            case "description":
                this.description = value;
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

                value = $('#section-costs .filter-content-container input').val().trim();

                if(value == '') {
                    alertFailure('The input must be filled');
                    htmlString = "";
                    break;
                }

                htmlString += ' description-item" name = "description-' + value + '">'+ value;

                //check if category already exists
                $('#section-costs .filter-box .description-item').each(function( index ) {
                    if($( this ).text().indexOf(value) != -1) {
                        alertFailure('Already exists');
                        htmlString = "";
                        return;
                    }
                });

                break;

            case "category":

                value = $('#section-costs .filter-content-container select[name="category-select"] option:selected').text();

                //get ID of category
                var categoryId = $('#section-costs .filter-content-container select[name="category-select"] option:selected').val();

                htmlString += ' category-item" name = "category-' + categoryId + '">' + value;

                //check if category already exists
                $('#section-costs .filter-box .category-item').each(function( index ) {
                    if($( this ).text().indexOf(value) != -1) {
                        alertFailure('Already exists');
                        htmlString = "";
                        return;
                    }
                });

                //value has to be the category id, its for the database
                value = categoryId;

                break;

            case "amount":
                var startPrice =  $('#section-costs .right-div .filter-inputs-container span:first-child input[type="text"]').val().trim();
                var endPrice =  $('#section-costs .right-div .filter-inputs-container span:last-child input[type="text"]').val().trim();

                value = [startPrice, endPrice];

                startPrice = parseInt(startPrice);
                endPrice = parseInt(endPrice);

                if(isNaN(startPrice) || isNaN(endPrice)|| startPrice < 0 || endPrice < 0 || startPrice > endPrice) {
                    alertFailure("Both numbers must be greater than 0 and the 2th input must be greater than 1th input.")
                    htmlString = "";
                    break;
                }

                if($('#section-costs .filter-box .amount-item').length != 0) {
                    if (confirm('You already filter for price, do you want to replace it?')) {
                        $('#section-costs .filter-box .amount-item').remove();
                        htmlString += ' amount-item" name = "amount">' + startPrice + "€ - " + endPrice + "€";
                    } else {
                        htmlString = "";
                    }
                } else {
                    htmlString += ' amount-item" name = "amount">' + startPrice + "€ - " + endPrice + "€";
                }


                break;

            case "date":

                var startDate =  $('#section-costs .right-div .filter-inputs-container span:first-child input[type="date"]').val().replace(/-/g, '.');
                var endDate = $('#section-costs .right-div .filter-inputs-container span:last-child input[type="date"]').val().replace(/-/g, '.');

                value = [startDate, endDate];

                if($('#section-costs .filter-box .date-item').length != 0) {
                    if (confirm('You already filter for date, do you want to replace it?')) {
                        $('#section-costs .filter-box .date-item').remove();
                        htmlString += ' date-item" name = "date">' + startDate + " - " + endDate;
                    } else {
                        htmlString = "";
                    }
                } else {
                    htmlString += ' date-item" name = "date">' + startDate + " - " + endDate;
                }

                break;

        }

        if(htmlString == "") {
            return null;
        }

        htmlString += '<span class = "option-remove">[-]</span></span>';

        //append item
        $('#section-costs .filter-box .filter-container').append(htmlString);

        //set input value to '' again
        $('#section-costs .filter-content-container input[type="text"]').val('');

        return value;
    }

    removeFilter(nameId) {

        var splitted = nameId.split('-');

        //type
        switch (splitted[0]) {
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
        $('#section-costs .filter-box .filter-container .filter-item[name='+ nameId +']').remove();
    }

}
