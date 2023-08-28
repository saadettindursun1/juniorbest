<form method="POST" id="update-nickname-form">
    <div class="container-fluid mt-5 col-md-6 align-items-center justify-content-center">


        <div class="card text-center">
            <div class="card-header ">
                Şimdi size bir nickname belirleyelim
            </div>
            <div class="card-body">
                <input type="text" id="nickname" name="nickname" class="form-control" maxlength="25">
                <small id="nickname-warning" class="form-text text-left">Seçeceğiniz nickname özel karakter
                    içermemelidir. </small>
            </div>
            <div class="card-footer">
                <button type="submit" id="create-nickname" name="create-nickname"
                    class="btn btn-dark btn-block ">Kaydet</button>
                <?php
                if (isset($_POST["create-nickname"])) {
                    $nickname = $_POST["nickname"];
                        $data->asama = "2";
                        $json_data_update = json_encode($data);
                        $nickname_query = "user_nickname='" . $nickname . "' ,user_info='" . $json_data_update . "'";
                        $nickname_where = "user_mail='" . $code_mail . "'";
                        $jb_mysql->update("users", $nickname_query, $nickname_where);
                        header("Refresh:0;Url=bilgiler.php");
                    
                }
                ?>

            </div>
        </div>
    </div>
</form>