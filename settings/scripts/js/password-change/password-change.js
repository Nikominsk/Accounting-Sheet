function changePassword() {

    var inputPassword = $("#section-password-change input[name='input-password']");

    var inputPasswordNew = $("#section-password-change input[name='input-password-new']");
    var inputPasswordNew2 = $("#section-password-change input[name='input-password-new2']");

    $.ajax({
            url: "../settings/scripts/php/form-actions/password-change.php",
            type: "post",
            data: { password: inputPassword.val(), passwordNew: inputPasswordNew.val(), passwordNew2: inputPasswordNew2.val() } ,
            async: true,

            success: function (response) {
                var data =  JSON.parse(response);

                if(data[0] == true) {
                    alertSuccess(data[1]);
                } else {
                    alertFailure(data[1]);
                }

                inputPassword.val('');
                inputPasswordNew.val('');
                inputPasswordNew2.val('');

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
    });

}