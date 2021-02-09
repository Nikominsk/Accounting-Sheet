function uploadProfilePicture() {

    var profilePic =  $("#section-upload-profile-picture input[name='file']")[0].files[0];

    // we have to change profilePic to be able to send via ajax
    var formData = new FormData();
    formData.append('file', profilePic);

    $.ajax({
        url : '../settings/scripts/php/form-actions/upload-profile-pic.php',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(response) {
            //console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {
                location.reload();
            } else {
                alertFailure(data[1]);
            }


        }
    });

}