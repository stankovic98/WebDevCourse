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