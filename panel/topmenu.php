<?php
$json_user_info = $_SESSION["user_info"];
$user_info = json_decode($json_user_info);
?>
<div class="top-menu">
    <div class="top-menu-left">
        <a href="anasayfa.php"> <img src="../img/junior-best-logo-dark.png"></a>
        <!-- arama kutusu yapılacak! -->
    </div>
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Ara...">
        <button class="search-button">Arama</button>
    </div>
    <div class="top-menu-right">

        <div class="ustmenu-icons">
            <a href="kisiler.php"><img class="top-icons" src="../img/baglantilar.png" alt=""></a>

        </div>
        <div class="ustmenu-icons">
            <img class="top-icons" src="../img/messages.png" alt="">

        </div>
        <div class="ustmenu-icons" style="margin-right: 35px;">
            <img class="top-icons" src="../img/bildirim.png" alt="">

        </div>
        <div class="top-menu-profil">
            <a href="profil.php"><img src="../<?php echo $user_info->user_info->photo ?>"></a>
        </div>
    </div>

</div>