jQuery(document).ready(function ($) {
  $("#user-register").on("click", function () {
    infoCheck();
  });

  $("#nickname").on("input", function () {
    nicknameCheck();
  });
  function nicknameCheck(){
    var nickname = $("#nickname").val();
    if(nickname.length>2){
    var url = "check_nickname.php";
    // JQuery kütüphanesini kullanarak AJAX isteği yap
    $.ajax({
      type: "POST",
      url: url,
      data: {
        nickname: nickname,
      },
      success: function (data) {
        if (data == true) {
          $("#nickname-warning").html("Bu kullanıcı adı kullanılabilir.");
          $("#nickname-warning").css("color", "green");
        }
        if (data == false) {
          $("#nickname-warning").html("Bu kullanıcı adı alınmış.");
          $("#nickname-warning").css("color", "red");

        }
      },
    });
  }
  }

  function mailControl(mail, callback) {
    var url = "check_email.php";
    // JQuery kütüphanesini kullanarak AJAX isteği yap
    $.ajax({
      type: "POST",
      url: url,
      data: {
        email: mail,
      },
      success: function (data) {
        if (data == true) {
          callback("1");
        }
        if (data == false) {
          callback("0");
        }
      },
    });
  }

  function infoCheck() {
    var mail = $("#mail").val();
    var firstName = $("#first-name").val();
    var lastName = $("#last-name").val();
    var password = $("#password").val();

    var hata = 0;

    //css classlarını    sıfırlama
    infoCheckClassClear("first-name", "first-name-warning");
    infoCheckClassClear("last-name", "last-name-warning");
    infoCheckClassClear("mail", "mail-warning");
    infoCheckClassClear("password", "password-warning");

    if (firstName.length < 3) {
      var warningMessage = "*Lütfen adınızı giriniz.";
      infoCheckClass("first-name", "first-name-warning", warningMessage);
      hata++;
    }
    if (lastName.length < 3) {
      var warningMessage = "*Lütfen soyadınızı giriniz.";
      infoCheckClass("last-name", "last-name-warning", warningMessage);
      hata++;
    }
    if (MailCheck(mail) == false) {
      var warningMessage = "*Lütfen mail adresini doğru formatta giriniz.";
      infoCheckClass("mail", "mail-warning", warningMessage);
      hata++;
    }

    if (password.length < 6) {
      var warningMessage = "*Lütfen en az 6 haneden oluşan bir parola giriniz.";
      infoCheckClass("password", "password-warning", warningMessage);
      hata++;
    }

    if (hata == 0) {
      mailControl(mail, function (result) {
        if (result == 0) {
          var warningMessage = "*Bu e-posta adresi daha önce alınmış.";
          infoCheckClass("mail", "mail-warning", warningMessage);
          hata++;
        } else {
          var form = document.getElementById("register-form");
          form.submit();
        }
      });
    }
  }

  //Kayıt sayfasında input kontrolleri sonrası verilecek klaslar
  function infoCheckClass(inputId, warningId, warningMessage) {
    $("#" + inputId).css("border-bottom", "1px solid red");
    $("#" + warningId).css("display", "block");
    $("#" + warningId).html(warningMessage);
  }

  function infoCheckClassClear(inputId, warningId) {
    $("#" + warningId).css("display", "none");

    $("#" + inputId).css("border", "1px solid #ced4da");
  }

  //mail kontrolü
  function MailCheck(email) {
    var control = new RegExp(
      /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/i
    );
    return control.test(email);
  }
});

$(document).ready(function () {
  $("#nickname").keypress(function (evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    //Bu şartımız ile harf girildiği takdirde true olarak geri dönüş sağlıyoruz.
    //(Yalnızca İngilizce karakterleri desteklemektedir. Türkçe karakterler için 2. Yöntemi kullanabilirsiniz.)
    if (
      (charCode >= 65 && charCode <= 90) ||
      (charCode >= 97 && charCode <= 122) ||
      (charCode >= 48 && charCode <= 57) ||
      charCode === 8
    ) {
      return true;
    }
    return false;
  });
});
