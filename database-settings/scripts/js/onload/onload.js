//if page completely loaded
$(window).on("load", function() {

    reloadAllForms();

    //form action

    //form add category
    $("#section-category-add input[name='submit-category-add']").click(function(e) {
        e.preventDefault();

        var category = $("#section-category-add input[name='input-category']");

        $.ajax({
                url: "../database-settings/scripts/php/forms-actions/AddCategory.php",
                type: "post",
                data: { category: category.val() } ,
                async: true,

                success: function (response) {
                    var data =  JSON.parse(response);

                    if(data[0] == true) {
                        alertSuccess(data[1]);

                        category.val('');

                        loadFormRemoveCategory();

                    } else {
                        alertFailure(data[1]);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
        });

    });

    //form remove category
    $("#section-category-remove input[name='submit-category-remove']").click(function(e) {
        e.preventDefault();

        var selectCategoryId = $("#section-category-remove select[name='select-categoryId']");

        $.ajax({
                url: "../database-settings/scripts/php/forms-actions/RemoveCategory.php",
                type: "post",
                data: { categoryId: selectCategoryId.val() } ,
                async: true,

                success: function (response) {
                    var data =  JSON.parse(response);

                    if(data[0] == true) {
                        alertSuccess(data[1]);

                        loadFormRemoveCategory();

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


function reloadAllForms() {

    //loadFormAddCategory(); //not necessary since it has only input fields
    loadFormRemoveCategory();

}


function loadFormRemoveCategory() {

    var selectElement = $('#section-category-remove select[name="select-categoryId"]');
    selectElement.empty();
    selectElement.load("../database-settings/scripts/php/forms-load/FormRemoveCategory.php", {}, function() {});

}



