//if page completely loaded
$(window).on("load", function() {

    $("#modal-window-filter-status-each-user .button-ok").click(function(e) {
        $("#modal-window-filter-status-each-user").hide();

        var textFilterUsers;
        var selectElement = $('#modal-window-filter-status-each-user select[name="select-user"] option:selected');
        //index: 0 = ALL, 1 = ONLYACTIVES, 2 = ONLYINACTIVES
        //.eq(0). = first selected option 
        if(selectElement.eq(0).index() == 0 || selectElement.length > 1 && selectElement.eq(0).index() == 1 && selectElement.eq(1).index() == 2) {
            textFilterUsers = $('#modal-window-filter-status-each-user select[name="select-user"] option:first').text();
        } else if(selectElement.eq(0).index() == 1){
            textFilterUsers = selectElement.eq(0).text();
        } else if(selectElement.eq(0).index() == 2) {
            textFilterUsers = selectElement.eq(0).text();
        } else {
            textFilterUsers = selectElement.toArray().map(item => item.text).join(" | ");
        }
        
        $('#section-status-each-user .filter-username').html(textFilterUsers);

        refreshStatusEachUserTable();

    });


});