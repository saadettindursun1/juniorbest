    <div class="top-content-box">
        <button id="myBtn">Gönderi Oluştur</button>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Gönderi Oluştur</p>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <select name="" id="">
                            <option value="">
                                Paylaşımın Yapılacağı Hesap
                            </option>
                            <option value="">
                                Metincan Çakmak
                            </option>
                        </select>
                        <textarea name="post-description" class="post-desc" id="" cols="30" rows="4"
                            placeholder="Açıklama" required></textarea>
                        <input type="file" name="post-photo" id="info-photo" accept="image/*">

                        <button name="post-share" type="submit">Paylaş</button>

                        <?php
                        if (isset($_POST["post-share"])) {


                            $post_photo;
                            if ($_FILES["post-photo"]["name"] != "") {

                                $upload = $jb_uploads->uploads($_FILES, "post-photo", "../uploads/");

                                $post_photo = $upload;
                            }
                            $post_photos_array = array(
                                "post_photo_1" => $post_photo,
                            );

                            $json_post_photo = json_encode($post_photos_array, JSON_UNESCAPED_UNICODE);

                            $data = array(
                                "post_builder_id" =>  $_SESSION["user_id"],
                                "post_description" => $_POST["post-description"],
                                "post_photos" => $json_post_photo,
                                "post_type" =>  "0",
                                "post_date" => date("Y-m-d H:i"),

                                "post_deleted" => "0",
                            );



                            $table = "post";
                            $value_name = "post_builder_id,post_description,post_photos,post_type,post_date,post_deleted";
                            $ekle = $jb_mysql->insert($table, $value_name, $data);
                        }
                        ?>
                    </div>

                </form>
            </div>

        </div>



    </div>

    <?php
    $posts = $jb_mysql->list_all("*", "post");
    foreach ($posts as $post) {

        $get_post_photo = json_decode($post["post_photos"]);
    ?>
    <div class="content-box">

        <div class="content-header">
            <div class="content-header-img">
                <img src="../img/metincan-pp.jpg">
            </div>
            <div class="content-header-info">
                <a href="#">Metincan Çakmak</a>
                <p><?php echo $post["post_date"] ?></p>
            </div>
        </div>
        <div class="content">
            <p id="postText"><?php echo $post["post_description"] ?></p>
            <img src="<?php echo $get_post_photo->post_photo_1; ?>">
        </div>
        <div class="interactive">
            <div class="abc">
                <span><a href="#">Beğenmeler</a></span>
                <div class="in-interactive">
                    <div class="like">
                        <input id="like-button" type="image" src="../img/no-like.png" value="submit">
                    </div>
                    <div class="comment">
                        <input type="image" src="../img/comment.png" value="submit">
                    </div>
                </div>
            </div>
            <div class="in-interactive-right">
                <div class="save">
                    <input id="save-button" type="image" src="../img/save.png" value="submit">
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="content-box">
        <div class="content-header">
            <div class="content-header-img">
                <img src="../img/metincan-pp.jpg">
            </div>
            <div class="content-header-info">
                <a href="#">Metincan Çakmak</a>
                <p>29.08.2023</p>
            </div>
        </div>
        <div class="content">
            <p>Selam bu 2.</p>
            <img src="../img/home-banner.png">
        </div>
    </div>
    <div class="content-box">
        <div class="content-header">
            <div class="content-header-img">
                <img src="../img/metincan-pp.jpg">
            </div>
            <div class="content-header-info">
                <a href="#">Metincan Çakmak</a>
                <p>29.08.2023</p>
            </div>
        </div>
        <div class="content">
            <p>Sadece artı.</p>
            <img src="../img/plus.png">
        </div>
    </div>

    <script>
var likeButton = document.getElementById("like-button");
var isLiked = false;

likeButton.addEventListener("click", function() {
    if (!isLiked) {
        likeButton.src = "../img/like.png";
        isLiked = true;
    } else {
        likeButton.src = "../img/no-like.png";
        isLiked = false;
    }
});

var saveButton = document.getElementById("save-button");
var isSaved = false;

saveButton.addEventListener("click", function() {
    if (!isSaved) {
        saveButton.src = "../img/saved.png";
        isSaved = true;
    } else {
        saveButton.src = "../img/save.png";
        isSaved = false;
    }
});

function postTextControl() {
    var textLength = document.getElementById("postText").value.length;

}


// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    </script>