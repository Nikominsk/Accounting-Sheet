//if page completely loaded
$(window).on("load", function() {

    $("input[name='input-date-from']").val(getFirstDateThisYear());
    $("input[name='input-date-to']").val(getCurrentDate());

    $("#modal-window-filter-cost .button-ok").click(function(e) {
        $("#modal-window-filter-cost").hide();

        $('#section-costs .filter-date').html($("input[name='input-date-from']").val().replace(/-/g, '.') + ' - ' + $("input[name='input-date-to']").val().replace(/-/g, '.'));

        var textFilterCategories;

        if($('#modal-window-filter-cost select[name="select-category"]')[0].selectedIndex === 0) {
            textFilterCategories = $('#modal-window-filter-cost select[name="select-category"] option:first').text();
        } else {
            textFilterCategories = $('#modal-window-filter-cost select[name="select-category"] option:selected').toArray().map(item => item.text).join(" | ");
        }
        console.log()
        $('#section-costs .filter-category').html(textFilterCategories);
        refreshCostTable();
    });

});