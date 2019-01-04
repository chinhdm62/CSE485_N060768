
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

    $("#cre-cv").click(function(){
        $(".form-login").toggleClass("showed");
        $("#btn-signup").toggleClass("disabledbutton");
    });

    $("#post").click(function(){
        $(".form-login").toggleClass("showed");
        $("#btn-signup").toggleClass("disabledbutton");
    });

    var password;
    var passwordConfSignup;
    $("#register").attr("disabled", true);
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

    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    // function detail(id, num_click) {
    //     var newNum = num_click + 1;
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.open("POST", "num_click.php?id="+id+"&num_click="+newNum, true);
    //     xhttp.send();
    // }

    $('#dataTables-example').DataTable({
        responsive: true
    });
});

function detail(id, num_click) {
    var newNum = num_click + 1;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "num_click.php?id="+id+"&num_click="+newNum, true);
    xhttp.send();
}