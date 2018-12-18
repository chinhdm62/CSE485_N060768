
$(document).ready(function(){
    // var xhttp;
    // $("#login").click(function(){
    //     xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             $("#error").text(this.responseText);
    //         }
    //     };
    //     var username = $("#username").val();
    //     var password = $("#password").val();
    //     var req = "user="+username+"&pass="+password;
    //     xhttp.open("POST", "checkLogin.php?username="+username+"&password="+password, true);
    //     xhttp.send();
    // });
    $("#btn-login").click(function(){
        $(".form-login").toggleClass("showed");
    });

    $(".hide-login-btn").click(function(){
        $(".form-login").toggleClass("showed");
    });
});