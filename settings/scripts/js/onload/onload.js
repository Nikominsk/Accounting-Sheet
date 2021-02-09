$(window).on("load", function() {

    selectLanguageButton();
    selectFormatButton();

    $("#section-upload-profile-picture input[name='button-upload']").click(function(e) {
        uploadProfilePicture();
    });

    $("#section-upload-profile-picture input[name='button-remove']").click(function(e) {
        deleteProfilePicture();
    });

    $("#language-section .DE").click(function(e) {
        if($('#language-section .DE img').css('display') == 'none') {
            changeLanguageTo("DE");
        }
    });

    $("#language-section .EN").click(function(e) {
        if($('#language-section .EN img').css('display') == 'none') {
            changeLanguageTo("EN");
        }
    });


    $("#format-section .de_DE").click(function(e) {
        if($('#format-section .de_DE img').css('display') == 'none') {
            changeFormatTo("de_DE");
        }
    });

    $("#format-section .en_US").click(function(e) {
        if($('#format-section .en_US img').css('display') == 'none') {
            changeFormatTo("en_US");
        }
    });


    $("#section-password-change input[name='button-password-change']").click(function(e) {
        changePassword();
    });

    $("#section-account-delete input[name='button-account-delete']").click(function(e) {
        deleteAccount();
    });

});