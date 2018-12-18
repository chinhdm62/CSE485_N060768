$(document).ready(function(){
    $("#del").click(function(){
        if (confirm("ban co muon xoa khong?")) {
            return true;
        } else {
            return false;
        }
    });
})