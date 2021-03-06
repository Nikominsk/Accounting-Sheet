class AdvanceTableSorting {

    constructor(selectedOrderElement, sortingString) {
        this.selectedOrderElement = selectedOrderElement;
        this.sortingString = sortingString;
    }

    handleAdvanceSortingImg(element) {
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

class AdvanceTableFilter {

    constructor() {
        this.startDate = "";
        this.endDate = "";
        this.startAdvance = "";
        this.endAdvance = "";
    }

    changeFilterInputs(type) {
        var htmlString = "";

        switch(type) {

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

            case "advance":

                htmlString =    '<div class = "filter-inputs-container">' +
                                    '<span>Von:' +
                                        '<input type="text" name = "input-advance" placeholder = "Vorschuss von" />' +
                                    '</span>' +
                                    '<span>Bis:' +
                                        '<input type="text" name = "input-advance" placeholder = "Vorschuss bis" />' +
                                    '</span>' +
                                '</div>';

                break;

        }

        $('#section-advance .filter-content-container').html(htmlString);
    }

    addFilter(itemType) {
        //it can be either be one value or two
        var value = this.addFilterItem(itemType);

        if(value == null) return false;

        switch (itemType) {
            case "date":
                this.startDate = value[0];
                this.endDate = value[1];
                break;
            case "advance":
                this.startAdvance = value[0];
                this.endAdvance = value[1];
                break;
        }

        return true;

    }

    addFilterItem(itemType) {
        var htmlString = '<span class = "filter-item';
        var value;

        switch(itemType) {
            case "date":

                var startDate =  $('#section-advance .right-div .filter-inputs-container span:first-child input[type="date"]').val().replace(/-/g, '.');
                var endDate =  $('#section-advance .right-div .filter-inputs-container span:last-child input[type="date"]').val().replace(/-/g, '.');

                if(startDate > endDate) {
                    var tmp = endDate;
                    endDate = startDate;
                    startDate = tmp;
                }

                value = [startDate, endDate];

                htmlString += ' date-item" name = "date">' + startDate + " - " + endDate;

                if($('#section-advance .filter-box .date-item').length != 0) {
                    if (confirm('You already filter for date, do you want to replace it?')) {
                        $('#section-advance .filter-box .date-item').remove();
                    } else {
                        htmlString = null;
                    }
                }

                break;

            case "advance":
                var startAdvance =  $('#section-advance .right-div .filter-inputs-container span:first-child input[type="text"]').val().trim();
                var endAdvance =  $('#section-advance .right-div .filter-inputs-container span:last-child input[type="text"]').val().trim();

                startAdvance = parseInt(startAdvance);
                endAdvance = parseInt(endAdvance);

                if(isNaN(startAdvance) || isNaN(endAdvance)|| startAdvance < 0 || endAdvance < 0) {
                    alertFailureLang("InvInput19");
                    return null;
                }

                if(startAdvance > endAdvance) {
                    var tmp = startAdvance;
                    startAdvance = endAdvance;
                    endAdvance = tmp;
                }

                value = [startAdvance, endAdvance];

                htmlString += ' advance-item" name = "advance">' + startAdvance + "€ - " + endAdvance + "€";

                if($('#section-advance .filter-box .advance-item').length != 0) {
                    if (confirm('You already filter for advance, do you want to replace it?')) {
                        $('#section-advance .filter-box .advance-item').remove();
                    } else {
                        htmlString = null;
                    }
                }

                break;

        }

        if(htmlString == null) return null;

        htmlString += '<span class = "option-remove">&#x2715;</span></span>';

        //append item
        $('#section-advance .filter-box .filter-container').append(htmlString);

        //set input value to '' again
        $('#section-advance .filter-content-container input[type="text"]').val('');

        return value;
    }

    removeFilter(nameId) {

        var splitted = nameId.split('-');

        //type
        switch (splitted[0]) {
            case "date":
                this.startDate = "";
                this.endDate = "";
                break;
            case "advance":
                this.startAdvance = "";
                this.endAdvance = "";
                break;
        }

        this.removeFilterItem(nameId);
    }

    removeFilterItem(nameId) {
        $('#section-advance .filter-box .filter-container .filter-item[name='+ nameId +']').remove();
    }

}