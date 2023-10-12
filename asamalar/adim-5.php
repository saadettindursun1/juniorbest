<form method="POST">
    <div class="card container-fluid mt-5  align-items-center justify-content-center">
        <div class="form-group">
            <label class="text-left">Kısa Açıklama</label>
            <input type="text" class="form-control" name="short-desc" id="">
        </div>
        <div class="form-group">
            <label class="text-left">Biografi</label><br>
            <textarea name="desc" class="form-control" id="" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Kaydet" name="desc-button" id="desc-button" class="btn btn-block btn-dark" readonly>
        </div>

        <?php
        if (isset($_POST["desc-button"])) {

            @$desc = $_POST["desc"];
            @$short_desc = $_POST["short-desc"];

            $data->bio->desc = $desc;
            $data->bio->short_desc = $short_desc;
            $data->asama = "6";

            $json_data_update = json_encode($data, JSON_UNESCAPED_UNICODE);
            $tag_query = "user_info='" . $json_data_update . "' , user_login_type='2'";
            $tag_where = "user_mail='" . $code_mail . "'";
            $jb_mysql->update("users", $tag_query, $tag_where);
            header("Refresh:0;Url=panel/anasayfa.php");
        }
        ?>
    </div>
</form>