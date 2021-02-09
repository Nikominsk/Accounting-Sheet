//if page is loaded
$(window).on("load", function() {

    //entry for advance
    $("#advance-input-section input[name='button-save']").click(function(e) {
        e.preventDefault();

        var inputDate = $("#advance-input-section input[name='input-date']");
        var inputAdvance = $("#advance-input-section input[name='input-advance']");

        //save inputs/ entries
        $.ajax({
                    url: "../entry/scripts/php/advance/save-advance.php",
                    type: "post",
                    data: { date: inputDate.val(),
                            advance: inputAdvance.val() } ,
                    async: true,

                    success: function (response) {
                        //console.log("success: " + data);
                        var data =  JSON.parse(response);

                        if(data[0] == true) {

                            alertSuccess(data[1]);

                            //clear inputs
                            inputAdvance.val('');

                        } else {
                            alertFailure(data[1]);
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
        });

    });

});