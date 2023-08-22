<?php 
    class userRedirect{
        function redirect($login_type){
            if($login_type == 0){
            header('Refresh:0;Url=dogrulama.php');        
            }

            if($login_type == 1){
                header('Refresh:0;Url=bilgiler.php');        
            }

            if($login_type == 2){
                header('Refresh:0;Url=anasayfa.php');        
            }
        }
    }
?>