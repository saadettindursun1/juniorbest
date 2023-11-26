jQuery(document).ready(function ($) {


    $('.add-btn').on('click', function () {
        var addText = $(this).html();
        var veri = $(this).attr('id');
        var id = veri.replace("btn-", "");
        var url = "../actions/add.php";
        var type;
        if (addText == "İstek Gönderildi"){ 

            $(this).html("Arkadaş Ekle");
            $(this).css("background-color", "#001B79");
            $(this).css("color", "white");
      type = "re_add";

        }
        if (addText != "İstek Gönderildi"){
            type = "add";

        // Tıklanan butonun ID'sini alalım
        $(this).html("İstek Gönderildi");
        $(this).css("background-color", "white");
        $(this).css("color", "black");

        }
        // JQuery kütüphanesini kullanarak AJAX isteği yap
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id,
                type:type
            },
            success: function (data) {
                if (data == true) {
                }
                if (data == false) {



                }
            },
        });
    
        // Elde edilen ID'yi kullanma veya konsola yazdırma
    });


    $('.select-btn').on('click', function () {
        var addText = $(this).html();
        var veri = $(this).attr('id');
        var id = veri.replace("btn-", "");
        var url = "../actions/update-contact.php";
        var type;
        $("#row-"+id).remove();

        if (addText == "Onayla"){ 
            
      type = "1";


        }
        if (addText == "Reddet"){
            type = "0";


        // Tıklanan butonun ID'sini alalım
        $(this).html("Reddet");


        }
        // JQuery kütüphanesini kullanarak AJAX isteği yap
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id,
                type:type
            },
            success: function (data) {
                if (data == true) {
                }
                if (data == false) {



                }
            },
        });

        // Elde edilen ID'yi kullanma veya konsola yazdırma
    });


});