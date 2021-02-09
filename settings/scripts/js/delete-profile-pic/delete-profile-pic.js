function deleteProfilePicture() {


    $.ajax({
        url : '../settings/scripts/php/form-actions/delete-profile-pic.php',
        type : 'POST',
        success : function(response) {
            console.log("success: " + response);
            var data =  JSON.parse(response);

            if(data[0] == true) {
                location.reload();
            } else {
                alertFailure(data[1]);
            }


        }
    });

}