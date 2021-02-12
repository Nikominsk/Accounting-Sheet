
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
        this.userIds = ['ignore'];
        this.startDate = "";
        this.endDate = "";
        this.startAdvance = "";
        this.endAdvance = "";
    }

    changeFilterInputs(type) {
        var htmlString = "";

        switch(type) {

            case "username":

                htmlString = '<select name = "username-select">';

                $.ajax({
                    url: "../costs-and-advances-overview/scripts/php/utils/UserHTMLList.php",
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

        $('#section-all-advances .filter-content-container').html(htmlString);
    }

    addFilter(itemType) {
        //it can be either be one value or two
        var value = this.addFilterItem(itemType);
        if(value == null) return false;

        switch (itemType) {
            case "username":
                this.userIds.push(value);
                break;
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

            case "username":

                value = $('#section-all-advances .filter-content-container select[name="username-select"] option:selected').text();
                //get ID of category
                var userId = $('#section-all-advances .filter-content-container select[name="username-select"] option:selected').val();

                htmlString += ' username-item" name = "username-' + userId + '">' + value;

                //check if category already exists
                $('#section-all-advances .filter-box .username-item').each(function( index ) {
                    if($( this ).text().indexOf(value) != -1) {
                        alertFailure('Already exists');
                        htmlString = "";
                        return;
                    }
                });

                //value has to be the user id, its for the database
                value = userId;

                break;

            case "date":

                var startDate =  $('#section-all-advances .right-div .filter-inputs-container span:first-child input[type="date"]').val().replace(/-/g, '.');
                var endDate =  $('#section-all-advances .right-div .filter-inputs-container span:last-child input[type="date"]').val().replace(/-/g, '.');

                if(startDate > endDate) {
                    var tmp = endDate;
                    endDate = startDate;
                    startDate = tmp;
                }

                value = [startDate, endDate];

                if($('#section-all-advances .filter-box .date-item').length != 0) {
                    if (confirm('You already filter for date, do you want to replace it?')) {
                        $('#section-all-advances .filter-box .date-item').remove();
                        htmlString += ' date-item" name = "date">' + startDate + " - " + endDate;
                    } else {
                        htmlString = "";
                    }
                } else {
                    htmlString += ' date-item" name = "date">' + startDate + " - " + endDate;
                }

                break;

            case "advance":
                var startAdvance =  $('#section-all-advances .right-div .filter-inputs-container span:first-child input[type="text"]').val().trim();
                var endAdvance =  $('#section-all-advances .right-div .filter-inputs-container span:last-child input[type="text"]').val().trim();

                if(startAdvance > endAdvance) {
                    var tmp = startAdvance;
                    startAdvance = endAdvance;
                    endAdvance = tmp;
                }

                value = [startAdvance, endAdvance];

                startAdvance = parseInt(startAdvance);
                endAdvance = parseInt(endAdvance);

                if(isNaN(startAdvance) || isNaN(endAdvance)|| startAdvance < 0 || endAdvance < 0) {
                    alertFailure("Both numbers must be greater than 0.")
                    htmlString = "";
                    break;
                }

                if($('#section-all-advances .filter-box .advance-item').length != 0) {
                    if (confirm('You already filter for advance, do you want to replace it?')) {
                        $('#section-all-advances .filter-box .advance-item').remove();
                        htmlString += ' advance-item" name = "advance">' + startAdvance + "€ - " + endAdvance + "€";
                    } else {
                        htmlString = "";
                    }
                } else {
                    htmlString += ' advance-item" name = "advance">' + startAdvance + "€ - " + endAdvance + "€";
                }

                break;

        }

        if(htmlString == "") {
            return false;
        }

        htmlString += '<span class = "option-remove">&#x2715;</span></span>';

        //append item
        $('#section-all-advances .filter-box .filter-container').append(htmlString);

        //set input value to '' again
        $('#section-all-advances .filter-content-container input[type="text"]').val('');

        return value;
    }

    removeFilter(nameId) {

        var splitted = nameId.split('-');

        switch (splitted[0]) {
            case "username":
                this.userIds = this.userIds.filter(e => e !== splitted[1]);
                break;
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
        $('#section-all-advances .filter-box .filter-container .filter-item[name='+ nameId +']').remove();
    }

}