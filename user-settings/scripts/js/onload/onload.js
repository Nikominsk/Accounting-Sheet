
var chooseUser = "ChooseUser";

//if page completely loaded
$(window).on("load", function() {

    //form reloads
    reloadAllForms();

    // form actions //

    //form add new email for new user
    $("#section-username-add input[name='submit-email-add']").click(function(e) {
        e.preventDefault();

        var eMailInput = $("#section-username-add input[name='input-email']");

        $.ajax({
                url: "../user-settings/scripts/php/forms-actions/AddUser.php",
                type: "post",
                data: { email: eMailInput.val() } ,
                async: true,

                success: function (response) {
                    //console.log(response);
                    var data =  JSON.parse(response);

                    if(data[0] == true) {
                        alertSuccess(data[1]);

                        eMailInput.val('');

                    } else {
                        alertFailure(data[1]);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
        });

    });

    //form password change
    $("#section-user-password-change input[name='submit-user-password-change']").click(function(e) {
        e.preventDefault();

        var selectUserId = $("#section-user-password-change select[name='select-userId']");

        var inputPassword = $("#section-user-password-change input[name='input-password']");
        var inputPassword2 = $("#section-user-password-change input[name='input-password2']");

        $.ajax({
                url: "../user-settings/scripts/php/forms-actions/UserPasswordChange.php",
                type: "post",
                data: { userId: selectUserId.val(), password: inputPassword.val(), password2: inputPassword2.val() } ,
                async: true,

                success: function (response) {
                    var data =  JSON.parse(response);

                    if(data[0] == true) {
                        alertSuccess(data[1]);

                        selectUserId.prop('selectedIndex', 0);

                        inputPassword.val('');
                        inputPassword2.val('');

                    } else {
                        alertFailure(data[1]);
                        inputPassword.val('');
                        inputPassword2.val('');
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
        });

    });

    //form user allow
    $("#section-user-allow input[name='submit-user-allow']").click(function(e) {
        e.preventDefault();

        var selectUserId = $("#section-user-allow select[name='select-userId']");

        $.ajax({
                url: "../user-settings/scripts/php/forms-actions/UserAllow.php",
                type: "post",
                data: { userId: selectUserId.val() } ,
                async: true,

                success: function (response) {
                    var data =  JSON.parse(response);

                    if(data[0] == true) {

                        alertSuccess(data[1]);

                        reloadAllForms();

                    } else {
                        alertFailure(data[1]);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
        });

    });

    //form user deny
    $("#section-user-deny input[name='submit-user-deny']").click(function(e) {
        e.preventDefault();

        var selectUserId = $("#section-user-deny select[name='select-userId']");

        $.ajax({
                url: "../user-settings/scripts/php/forms-actions/UserDeny.php",
                type: "post",
                data: { userId: selectUserId.val() } ,
                async: true,

                success: function (response) {
                    var data =  JSON.parse(response);

                    if(data[0] == true) {
                        alertSuccess(data[1]);

                        reloadAllForms();

                    } else {
                        alertFailure(data[1]);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
        });

    });

    //form user remove
    $("#section-user-remove input[name='submit-user-remove']").click(function(e) {
        e.preventDefault();

        var selectUserId = $("#section-user-remove select[name='select-userId']");

        $.ajax({
                url: "../user-settings/scripts/php/forms-actions/UserRemove.php",
                type: "post",
                data: { userId: selectUserId.val() } ,
                async: true,

                success: function (response) {
                    var data =  JSON.parse(response);

                    if(data[0] == true) {
                        alertSuccess(data[1]);

                        reloadAllForms();

                    } else {
                        alertFailure(data[1]);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
        });

    });

    //form rank-distribution
    $("#section-rank-distribution input[name='submit-rank-change']").click(function(e) {
        e.preventDefault();

        var selectUserId = $("#section-rank-distribution select[name='select-userId']");
        var selectRankId = $("#section-rank-distribution select[name='select-rankId']");

        $.ajax({
                url: "../user-settings/scripts/php/forms-actions/UserRankChange.php",
                type: "post",
                data: { userId: selectUserId.val(), rankId: selectRankId.val() } ,
                async: true,

                success: function (response) {
                    var data =  JSON.parse(response);

                    if(data[0] == true) {
                        alertSuccess(data[1]);

                        reloadAllForms();

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

    loadFormUsersPasswordChange();
    loadFormUserAllow();
    loadFormUserDeny()
    loadFormUserRemove();
    loadFormRankDistribution();

}

function loadFormUsersPasswordChange() {

    var selectElement = $('#section-user-password-change select[name="select-userId"]');
    selectElement.empty();
    selectElement.load("../user-settings/scripts/php/utils/LoadUsers.php", {
        firstOptionText: chooseUser,
        active: 1,
        deleted: 0
    }, function() {});

}

function loadFormUserAllow() {

    var selectElement = $('#section-user-allow select[name="select-userId"]');
    selectElement.empty();
    selectElement.load("../user-settings/scripts/php/utils/LoadUsers.php", {
        firstOptionText: chooseUser,
        active: 0,
        deleted: 0
    }, function() {});

}

function loadFormUserDeny() {

    var selectElement = $('#section-user-deny select[name="select-userId"]');
    selectElement.empty();
    selectElement.load("../user-settings/scripts/php/utils/LoadUsers.php", {
        firstOptionText: chooseUser,
        active: 1,
        deleted: 0
    }, function() {});

}

function loadFormUserRemove() {

    var selectElement = $('#section-user-remove select[name="select-userId"]');
    selectElement.empty();
    selectElement.load("../user-settings/scripts/php/utils/LoadUsers.php", {
        firstOptionText: chooseUser,
        deleted: 0
    }, function() {});

}

function loadFormRankDistribution() {

    var selectElement = $('#section-rank-distribution select[name="select-userId"]');
    selectElement.empty();
    selectElement.load("../user-settings/scripts/php/utils/LoadUsers.php", {
        firstOptionText: chooseUser,
        active: 1,
        deleted: 0
    }, function() {});

}



