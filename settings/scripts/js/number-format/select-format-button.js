function selectFormatButton() {

    $.post('../settings/scripts/php/utils/getUsersNumberFormat.php', { }, function(response) {
        //console.log("success: " + response);
        //parse JSON-response into JavaScript
        var format = JSON.parse(response);

        //hide first all
        $("#format-section img").hide();

        //show the only one
        $("#format-section ." + format + " img").show();

    });

}