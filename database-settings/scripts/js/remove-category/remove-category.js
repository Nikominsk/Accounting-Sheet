$(window).on("load", function() {

    $("#section-category-remove input[name='button-category-remove']").click(function(e) {
        e.preventDefault();

        var selectCategoryId = $("#section-category-remove select[name='select-categoryId']");

        console.log("sele: " + selectCategoryId.val());

        $.ajax({
                url: "../database-settings/scripts/php/RemoveCategory.php",
                type: "post",
                data: { categoryId: selectCategoryId.val() } ,
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