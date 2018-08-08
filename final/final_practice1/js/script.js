
function OnkeyUpEvent(event) {
    $('#last-login').removeClass('success');
    $('#last-login-status').removeClass('success');
    $('#last-login').removeClass('failure');
    $('#last-login-status').removeClass('failure');
    $('#last-login').html("");
    $('#last-login-status').html("");

    var entered = event.value;
    getUserLoginStatus(entered);
}


function getUserLoginStatus(username) {
    // need to update this url to run on different system
    //var url = "http://localhost/practice/getLastLogin.php";
    var url = "/CST336/final/final_practice1/getLastLogin.php";
    $.ajax({
        url: url,
        type: "POST",
        data: { username: username }
    }).done(function(result) {
        if (result !== "false") {
            var result = result.split("#");
            lastLogin = result[0];
            lastLoginStatus = result[1];
            console.log(lastLogin, lastLoginStatus);
            $('#last-login').html("Last Login Attempt : " + lastLogin);
            $('#last-login-status').html("Last Login Attempt Status : " + lastLoginStatus);

            if (lastLoginStatus === "S") {
                $('#last-login').addClass('success');
                $('#last-login-status').addClass('success');
            } else {
                $('#last-login').addClass('failure');
                $('#last-login-status').addClass('failure');
            }
        }
    });
}