//if page is loaded
$(window).on("load", function() {

    //entry for accounting
    $("#accounting-input-section input[name='button-save']").click(function(e) {
         e.preventDefault();

        var inputTravelId = $("#accounting-input-section input[name='input-travelId']");
        var inputCategory = $("#accounting-input-section select[name='select-category']");
        var inputDate = $("#accounting-input-section input[name='input-date']");
        var inputDescription = $("#accounting-input-section input[name='input-description']");
        var inputAmount = $("#accounting-input-section input[name='input-amount']");

        //save inputs/ entries
        $.ajax({
                    url: "../entry/scripts/php/costs/save-cost.php",
                    type: "post",
                    data: { travelId: inputTravelId.val(),
                            category: inputCategory.val(),
                            date: inputDate.val(),
                            description: inputDescription.val(),
                            amount: inputAmount.val() } ,
                    async: true,

                    success: function (response) {
                        //console.log("success: " + response);
                        var data =  JSON.parse(response);

                        if(data[0] == true) {

                            alertSuccess(data[1]);

                            //clear inputs
                            inputTravelId.val('');

                            //reset categroy input to first index
                            inputCategory.prop('selectedIndex',0);

                            inputDescription.val('');

                            inputAmount.val('');

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