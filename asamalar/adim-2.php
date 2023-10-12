<form method="POST" id="update-info-form" enctype="multipart/form-data">
    <div class="container-fluid mt-5 col-md-6 align-items-center justify-content-center">
        <div class="card ">
            <div class="card-header baslik">
                Genel Bilgi Formu </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="info-birthday" class="text-left">* Doğum Tarihi</label>
                    <input type="date" name="info-birthday" class="form-control" id="info-birthday" style="padding-right:5px;" required>
                </div>
                <div class="form-group">
                    <label for="info-phone" class="text-left">Telefon</label>
                    <input type="number" name="info-phone" class="form-control" id="info-phone" placeholder="Telefon">
                </div>
                <?php
                ?>
                <div class="form-group">
                    <label for="info-city" class="text-left">* Şehir</label>
                    <select name="info-city" class="form-control" id="info-city" id="">
                        <option value="">Şehir Seçiniz</option>

                        <?php
                        $city = $jb_mysql->list_all("*", "city");
                        foreach ($city as $c) {
                        ?>

                            <option value="<?php echo $c["id"]; ?>"><?php echo $c["city"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="info-town" class="text-left">* İlçe</label>
                    <select name="info-town" class="form-control" id="info-town">
                        <option value="">İlçe Seçiniz</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="info-photo" class="text-left">Fotoğraf</label>
                    <input type="file" name="info-photo" id="info-photo" accept="image/*">

                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="Kaydet" name="create-info" id="create-info" class="btn btn-lg btn-dark btn-block" readonly>

                <?php
                if (isset($_POST["create-info"])) {
                    $birthday = $_POST["info-birthday"];

                    $phone = $_POST["info-phone"];
                    $city = $_POST["info-city"];
                    $town = $_POST["info-town"];

                    $data->user_info->birthday = $birthday;
                    $data->user_info->phone = $phone;
                    $data->user_info->city = $city;
                    $data->user_info->town = $town;
                    if (isset($phone)) {
                        $data->user_info->phone = $phone;
                    }

                    $uploadDir = "uploads/"; // Yüklenen fotoğrafların saklanacağı dizin

                    if ($_FILES["info-photo"]["name"] != "") {

                        $upload = $jb_uploads->uploads($_FILES);

                        $data->user_info->photo = $upload;
                    }

                    $data->asama = "3";
                    $json_data_update = json_encode($data, JSON_UNESCAPED_UNICODE);
                    $info_query = "user_info='" . $json_data_update . "'";
                    $info_where = "user_mail='" . $code_mail . "'";
                    $jb_mysql->update("users", $info_query, $info_where);
                    header("Refresh:0;Url=bilgiler.php");
                }
                ?>

            </div>
        </div>
    </div>
</form>