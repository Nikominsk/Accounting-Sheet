$(window).on("load", function() {

    $("#section-category-add input[name='button-category-add']").click(function(e) {
        e.preventDefault();

        var inputCategory = $("#section-category-add input[name='input-category']");

        $.ajax({
                url: "../database-settings/scripts/php/AddCategory.php",
                type: "post",
                data: { category: inputCategory.val() } ,
                async: true,

                success: function (response) {
                    //console.log("success: " + response);
                    var data =  JSON.parse(response);

                    if(data[0] == true) {

                        location.reload();

                        alertSuccess(data[1]);

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