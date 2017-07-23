$("#toggleLogin").click(function () {
    if ($("#loginActive").val() == 1) {
        $("#loginActive").val("0");
        $("#loginModalTitle").text("Sign Up");
        $("#loginSignUpButton").text("Sign Up");
        $("#toggleLogin").text("Login");
    } else {
        $("#loginActive").val("1");
        $("#loginModalTitle").text("Login");
        $("#loginSignUpButton").text("Login");
        $("#toggleLogin").text("Sign Up");
    }
});

$("#loginSignUpButton").click(function () {
    $.ajax({
        type: "POST",
        url: "actions.php/?action=loginSingUp",
        data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
        success: function (result) {
            if (result == "1") {
                window.location.assign("http://antonio.stankovic.com.stackstaging.com/contents/12-twitter/");
            } else {
                $("#loginAlert").text(result).show();
            }
        }
    });
});
