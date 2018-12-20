
$(document).ready(function(){
    $("#btn-login").click(function(){
        $(".form-login").toggleClass("showed");
        $("#btn-signup").toggleClass("disabledbutton");
        
    });

    $(".hide-login-btn").click(function(){
        $(".form-login").toggleClass("showed");
        $("#btn-signup").toggleClass("disabledbutton");
    });

    $("#btn-signup").click(function(){
        $(".form-register").toggleClass("showed");
        $("#btn-login").toggleClass("disabledbutton");
    });

    $(".hide-signup-btn").click(function(){
        $(".form-register").toggleClass("showed");
        $("#btn-login").toggleClass("disabledbutton");
    });

    var password;
    var passwordConfSignup;
    $("#passwordConf-signup").keyup(function() {
        password = $("#password-signup").val();
        passwordConfSignup = $("#passwordConf-signup").val();
        if (passwordConfSignup.length > 0) {
            if ($("#passwordConf-signup").val() != password) {
                $("#error-signup").text("Vui lòng nhập đúng mật khẩu ở trên!");
                $("#register").attr("disabled", true);
            } else {
                $("#error-signup").text("");
                $("#register").removeAttr('disabled');
            }
        } else if (passwordConfSignup.length == 0) {
            $("#error-signup").text("");
        }
    });
});