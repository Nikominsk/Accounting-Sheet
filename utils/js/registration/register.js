//if page completely loaded
$(window).on("load", function() {

    $("#form-register input[name='submit-register']").click(function(e) {
        e.preventDefault();

        var inputUsername = $("#form-register input[name='input-username']");
        var inputEMail = $("#form-register input[name='input-email']");
        var inputPassword = $("#form-register input[name='input-password']");
        var inputPassword2 = $("#form-register input[name='input-password2']");

        $.ajax({
                url: "utils/php/registration/register/register.php",
                type: "post",
                data: { username: inputUsername.val(), email: inputEMail.val(), password: inputPassword.val(), password2: inputPassword2.val() } ,
                async: true,

                success: function (msg) {
                    inputUsername.val('');
                    inputEMail.val('');
                    inputPassword.val('');
                    inputPassword2.val('');
                    alertFailure(msg);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
        });

    });

});