jQuery(document).ready(function ($) {
    $("#user-register").on("click", function () {
        infoCheck();
    });

    function infoCheck() {
        var firstName = $("#first-name").val();
        var lastName = $("#last-name").val();
        var mail = $("#mail").val();
        var password = $("#password").val();


        if(firstName.length<3){
            $("#first-name-warning").css("display","block");
            $("#first-name").css("border-bottom","1px solid red");
            $("#first-name-warning").html("*Lütfen adınızı giriniz.");
        }
     
        console.log(firstName);

    
    }
});