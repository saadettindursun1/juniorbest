<form method="POST" id="update-info-form" enctype="multipart/form-data">
    <div class="container-fluid mt-5 col-md-6 align-items-center justify-content-center">
        <div class="card ">
            <div class="card-header ">
                Statü Formu </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="text-left">Çalışma Durumu</label>
                    <select name="select-job" id="" class="form-control">
                        <option>Çalışmıyorum</option>
                        <option>Özel Sektör</option>
                        <option>Kamu Kurumu</option>
                        <option>Freelancer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-left">Okul Durumu</label>
                    <select name="select-education" id="" class="form-control">
                        <option>Yüksek Lisans</option>
                        <option>Lisans</option>
                        <option>Önlisans</option>
                        <option>Lise</option>
                        <option>Diğer</option>
                    </select>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Kaydet" name="create-statu" id="create-statu"
                        class="btn btn-lg btn-dark btn-block" readonly>

                    <?php
           
                if (isset($_POST["create-statu"])) {
                    $job = $_POST["select-job"];
                    $education = $_POST["select-education"];
                    $data->status->job = $job;
                    $data->status->education = $education;

                   
                  

                    $data->asama = "4";
                    $json_data_update = json_encode($data, JSON_UNESCAPED_UNICODE);
                    $job_query = "user_info='" . $json_data_update . "'";
                    $job_where = "user_mail='" . $code_mail . "'";
                    $jb_mysql->update("users", $job_query, $job_where);
                    header("Refresh:0;Url=bilgiler.php");
                }
                ?>

                </div>
            </div>
        </div>
</form>