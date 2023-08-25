<?php 
ob_start();
session_start();
require_once("class-loader.php");

$jb_mysql = new jbMysql();
$jb_send_mail = new jbMailer();
$jb_encrypt = new jbEncrypt();
$jb_uploads = new jbUploads();

$mail = $_SESSION["mail"];
$code_mail = $jb_encrypt->code_encrypt($mail);

$json_data =  $jb_mysql->list("user_info","users","user_mail='".$code_mail."'");
$data = json_decode($json_data["user_info"]);
$asama =    $data->asama;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="mincss/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/juniorbest.js"></script>
</head>

<style>
body {
    margin-top: 20px;
}


.timeline-step {
    opacity: 0.2;
}

.active-step {
    opacity: 1;
}

.timeline-steps {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap
}

.timeline-steps .timeline-step {
    align-items: center;
    display: flex;
    flex-direction: column;
    position: relative;
    margin: 1rem
}

@media (min-width:768px) {
    .timeline-steps .timeline-step:not(:last-child):after {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.46rem;
        position: absolute;
        left: 7.5rem;
        top: .3125rem
    }

    .timeline-steps .timeline-step:not(:first-child):before {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.8125rem;
        position: absolute;
        right: 7.5rem;
        top: .3125rem
    }
}

.timeline-steps .timeline-content {
    width: 10rem;
    text-align: center
}

.timeline-steps .timeline-content .inner-circle {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #3b82f6
}

.timeline-steps .timeline-content .inner-circle:before {
    content: "";
    background-color: #3b82f6;
    display: inline-block;
    height: 3rem;
    width: 3rem;
    min-width: 3rem;
    border-radius: 6.25rem;
    opacity: .5
}
</style>

<body>

    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-xl-6 col-lg-8">
                <h2 class="font-weight-bold">Seni Biraz Tanıyalım</h2>
                <p class="text-muted">Bu bilgiler sayesinde seni daha iyi tanıyıp algoritmanı sana uygun bir şekilde
                    oluşturacağız.
                </p>
            </div>
        </div>


        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
            <div class="timeline-step <?php if($asama==1){echo "active-step";} ?>">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                    data-content="And here's some amazing content. It's very engaging. Right?"
                    data-original-title="2003">
                    <div class="inner-circle"></div>
                    <p class="h6 mt-3 mb-1">Adım - 1 </p>
                </div>
            </div>
            <div class="timeline-step <?php if($asama==2){echo "active-step";} ?>">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                    data-content="And here's some amazing content. It's very engaging. Right?"
                    data-original-title="2004">
                    <div class="inner-circle"></div>
                    <p class="h6 mt-3 mb-1">Adım - 2 </p>
                </div>
            </div>
            <div class="timeline-step <?php if($asama==3){echo "active-step";} ?>">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                    data-content="And here's some amazing content. It's very engaging. Right?"
                    data-original-title="2005">
                    <div class="inner-circle"></div>
                    <p class="h6 mt-3 mb-1">Adım - 3 </p>
                </div>
            </div>
            <div class="timeline-step <?php if($asama==4){echo "active-step";} ?>">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                    data-content="And here's some amazing content. It's very engaging. Right?"
                    data-original-title="2010">
                    <div class="inner-circle"></div>
                    <p class="h6 mt-3 mb-1">Adım - 4 </p>
                </div>
            </div>

            <div class="timeline-step <?php if($asama==5){echo "active-step";} ?>">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                    data-content="And here's some amazing content. It's very engaging. Right?"
                    data-original-title="2010">
                    <div class="inner-circle"></div>
                    <p class="h6 mt-3 mb-1">Adım - 5 </p>
                </div>
            </div>
        </div>


        <?php
            include("asamalar/adim-".$asama.".php");

             ?>


    </div>

</body>

</html>