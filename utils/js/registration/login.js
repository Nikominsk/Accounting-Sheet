//if page completely loaded
$(window).on("load", function() {

    $("#form-login input[name='submit-login']").click(function(e) {
        e.preventDefault();

        var inputUsername = $("#form-login input[name='input-username']");
        var inputPassword = $("#form-login input[name='input-password']");

        $.ajax({
                url: "utils/php/registration/login/login.php",
                type: "post",
                data: { username: inputUsername.val(), password: inputPassword.val() } ,
                async: true,

                success: function (msg) {
                    if(msg == "Success") {
                        window.location.replace('./intern/entry.php');
                    } else {
                        inputUsername.val('');
                        inputPassword.val('');

                        alertFailure(msg);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
        });

    });

});