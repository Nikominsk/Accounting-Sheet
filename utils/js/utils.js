
//if page completely loaded
function alertSuccess(msg) {
    var alertContainer = $( '<div class = "alert alert-success">' + msg + '</div>' );

    alertContainer.appendTo("body");

    alertContainer.fadeIn(300).delay(1700).fadeOut(400, function() {
        alertContainer.remove();
    });

}

function alertFailure(msg) {

  var alertContainer = $( '<div class = "alert alert-failure">' + msg + '</div>' );

  alertContainer.appendTo("body");

  alertContainer.fadeIn(300).delay(5000).fadeOut(400, function() {
      alertContainer.remove();
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