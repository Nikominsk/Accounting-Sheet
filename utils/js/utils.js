let alertWrapper = null;

$(window).on("load", function() {
    $('<div id = "falerts-parent-wrapper"><div id = "falerts-child-wrapper"></div></div>').appendTo("body");
    alertWrapper = document.getElementById("falerts-child-wrapper");
});


//if page completely loaded
function alertSuccess(msg) {
    var alertContainer = $( '<div class = "alert-success">'+
                                    msg +
                            '</div>' );

    alertContainer.appendTo("body");

    alertContainer.fadeIn(300).delay(2000).fadeOut(400, function() {
        alertContainer.remove();
    });

}

function alertFailure(msg) {
    var alertContainer = $( '<div class = "alert-failure">'+
                                    '<button >×</button>' +
                                        msg +
                                '</div>');
    var clicked = false;

    alertContainer.appendTo(alertWrapper);

    alertContainer.children('button')[0].addEventListener("click", function() {
        alertContainer.remove();
    });

    alertContainer.on("click", function() {
        //dont remove automatically, wait until user closes
        clicked = true;
        alertContainer.attr('style', 'border: 2px solid #ff4141 !important');
    });

    alertContainer.fadeIn(300);

    setTimeout(function() {
        if(!clicked) {
            alertContainer.fadeOut(400, function() {
                alertContainer.remove();
            });
        }
    }, 3000);

}

function alertFailureLang(msgId) {
    $.ajax({
        type: "POST",
        url: '../utils/php/MakeTranslation.php',
        data: {functionname: 'lang', arguments: [msgId]},
        success: function (response) {
                    alertFailure(response);
                }
    });
}

function getFirstDateThisYear() {
    var firstDayThisYear = new Date(new Date().getFullYear()-1, 0, 1);  //remove the -1 later!
    firstDayThisYear.setDate(firstDayThisYear.getDate() + 1);
    return firstDayThisYear.toISOString().split('T')[0];
}

function getCurrentDate() {
    //todays date
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    return now.getFullYear()+"-"+(month)+"-"+(day);
}