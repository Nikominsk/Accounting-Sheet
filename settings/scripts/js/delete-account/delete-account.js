function deleteAccount() {

    var inputPassword = $("#section-account-delete input[name='input-password']");

    $.ajax({
            url: "../settings/scripts/php/form-actions/delete-account.php",
            type: "post",
            data: { password: inputPassword.val() } ,
            async: true,

            success: function (response) {
                console.log(response);
                var data =  JSON.parse(response);

                if(data[0] == false) {
                    inputPassword.val('');
                    alertFailure(data[1]);
                } else {
                    window.location.replace(data[1]);
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
    });

}