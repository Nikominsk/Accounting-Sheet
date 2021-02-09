function changeFormatTo(format) {

    $.ajax({
        url: "../settings/scripts/php/form-actions/change-format.php",
        type: "post",
        data: { format },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {

                alertSuccess(data[1]);
                selectFormatButton();

            } else {
                alertFailure(response);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }

    });

}