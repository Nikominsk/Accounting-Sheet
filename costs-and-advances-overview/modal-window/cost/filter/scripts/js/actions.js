//if page completely loaded
$(window).on("load", function() {

    $("input[name='input-date-from']").val(getFirstDateThisYear());
    $("input[name='input-date-to']").val(getCurrentDate());

    $("#modal-window-filter-all-cost .button-ok").click(function(e) {
        $("#modal-window-filter-all-cost").hide();

        $('#section-all-costs .filter-date').html($("input[name='input-date-from']").val().replace(/-/g, '.') + ' - ' + $("input[name='input-date-to']").val().replace(/-/g, '.'));

        var textFilterCategories;

        if($('#modal-window-filter-all-cost select[name="select-category"]')[0].selectedIndex === 0) {
            textFilterCategories = $('#modal-window-filter-all-cost select[name="select-category"] option:first').text();
        } else {
            textFilterCategories = $('#modal-window-filter-all-cost select[name="select-category"] option:selected').toArray().map(item => item.text).join(" | ");
        }

        $('#section-all-costs .filter-category').html(textFilterCategories);




        var textFilterUsers;
        var selectElement = $('#modal-window-filter-all-cost select[name="select-user"] option:selected');
        //index: 0 = ALL, 1 = ONLYACTIVES, 2 = ONLYINACTIVES
        //.eq(0). = first selected option
        if(selectElement.eq(0).index() == 0 || selectElement.length > 1 && selectElement.eq(0).index() == 1 && selectElement.eq(1).index() == 2) {
            textFilterUsers = $('#modal-window-filter-all-cost select[name="select-user"] option:first').text();
        } else if(selectElement.eq(0).index() == 1){
            textFilterUsers = selectElement.eq(0).text();
        } else if(selectElement.eq(0).index() == 2) {
            textFilterUsers = selectElement.eq(0).text();
        } else {
            textFilterUsers = selectElement.toArray().map(item => item.text).join(" | ");
        }

        $('#section-all-costs .filter-username').html(textFilterUsers);

        refreshCostTable();

    });

});