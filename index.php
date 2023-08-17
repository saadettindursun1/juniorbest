<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="mincss/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <?php
        include("header.php");
        ?>
    <div class="row">
        <div class="baslik-icerik col-md-5">
            <h1>Haydi</h1>
            <h2>Kodlayalım!</h2>
            <p>Ekibini Kur, Yeteneğini Keşfet
                <br>
                <span style="text-decoration:underline;text-underline-offset: 8px;">Tamamen Ücretsiz</span>
            </p>


            <a href="#" class="lets-start-button"><span>Hemen Başla</span></a>
        </div>
        <div class="col-md-4">
            <img src="https://cdn.instawp.io/build/assets/authentication-img.f4bb9138.png" alt=""
                style="height: 700px;">
        </div>
    </div>


    <div class="row mt-5 icerik container-fluid bg-white">
        <div class="card col-md-6 border-0 ">
            <div class="card-body text-center">
                <h2 class="card-title mb-5 mt-5">JuniorBest Nedir?</h2>
                <p class="card-text mb-5 mt-5 text-left ml-5">JuniorBest, meraklı ve tecrübe sahibi olmayan, ancak
                    yazılıma ilgi
                    duyan herkes için bir web platformudur. Amacı, bu genç yeteneklerin
                    kendi ilgi alanlarında deneyim kazanmalarını ve gerçek projelerde yer
                    alarak kendilerini geliştirmelerini sağlamaktır. JuniorBest, deneyim
                    eksikliğini engel olmaktan çıkararak, katılımcılara ekipler oluşturma
                    ve gerçek projelerde yer alma fırsatı sunar.</p>
                <a href="#" class="btn btn-outline-dark baslayalim-btn text-center p-3 pr-5 pl-5">Devamını Oku</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="img/home-banner.png" class="icerik-img" alt="Responsive image">
        </div>
    </div>

    <div class="" style="background-color:#351250;">
        <?php
            include("faq.php");
        ?>
    </div>
</body>

</html>