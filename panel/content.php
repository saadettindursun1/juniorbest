<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/panel-style.css">
</head>
<body>
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
                <p id="postText">Merhaba arkadaşlar bu ilk post.</p>
                <img src="../img/metincan-pp.jpg">                
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

            likeButton.addEventListener("click", function(){
                if(!isLiked){
                    likeButton.src = "../img/like.png";
                    isLiked = true;
                }
                else{
                    likeButton.src = "../img/no-like.png";
                    isLiked = false;
                }
            });

            var saveButton = document.getElementById("save-button");
            var isSaved = false;

            saveButton.addEventListener("click", function(){
                if(!isSaved){
                    saveButton.src = "../img/saved.png";
                    isSaved = true;
                }
                else{
                    saveButton.src = "../img/save.png";
                    isSaved = false;
                }
            });

            function postTextControl(){
                var textLength = document.getElementById("postText").value.length;
                
            }
        </script>
</body>
</html>