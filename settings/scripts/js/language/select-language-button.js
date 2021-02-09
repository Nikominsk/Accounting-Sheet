function selectLanguageButton() {
    $.post('../settings/scripts/php/utils/getUsersLanguage.php', { }, function(response) {
        //console.log("success: " + response);
        //parse JSON-response into JavaScript
        var  language = JSON.parse(response);

        //hide first all
        $("#language-section img").hide();

        //show the only one
        $("#language-section ." + language + " img").show();

    });

}