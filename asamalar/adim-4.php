<form method="POST" id="tag-form">

    <div class="container-fluid mt-5 col-md-8 align-items-center justify-content-center">

        <div class=" table-warning text-center d-flex justify-content-lg-between">
            <?php
            $tags = $jb_mysql->list_all("*","tags");
foreach($tags as $tag) {
    ?>

            <label class="tag-label" id="tag-<?php echo $tag["tag_id"]; ?>"><?php echo $tag["tag_name"]; ?></label>

            <?php } ?>
        </div>

        <div class="selected-tags col-md-4 mt-5" id="selected-tags">

        </div>
        <input type="hidden" id="tag-values" name="tag-values">
        <input value="Kaydet" name="get-tags-button" id="get-tags-button" class="btn btn-block btn-outline-dark"
            readonly>

        <?php 
if (isset($_POST["get-tags-button"])) {

    @$tags = $_POST["tag-values"];
    echo $tags;

    $data->tag = $tags;
    $data->asama = "5";
    $json_data_update = json_encode($data, JSON_UNESCAPED_UNICODE);
    $tag_query = "user_info='" . $json_data_update . "'";
    $tag_where = "user_mail='" . $code_mail . "'";
    $jb_mysql->update("users", $tag_query, $tag_where);
    header("Refresh:0;Url=bilgiler.php");
}
        ?>
    </div>


</form>