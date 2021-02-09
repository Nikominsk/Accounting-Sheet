function changeLanguageTo(language) {

    $.ajax({
        url: "../settings/scripts/php/form-actions/change-language.php",
        type: "post",
        data: { language },
        async: true,

        success: function (response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {

                alertSuccess(data[1]);
                selectLanguageButton();

            } else {
                alertFailure(data[1]);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }

    });

}