//if page completely loaded
$(window).on("load", function() {

    var visible = false;

    $(document).click(function(event) {

        if ($(event.target).closest("#profile").length) {
            if(visible == false) {
                visible = true;
                $("#profile-menu").show();

            } else {
                visible = false;
                $("#profile-menu").hide();

            }

        } else {
            if(visible == true) {
                visible = false;
                $("#profile-menu").hide();

            }

        }

    });


});