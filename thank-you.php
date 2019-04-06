<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thank You</title>
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/New/gr.ico">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .main-wrap-thanks {
            width: 50%;
            margin: 25px auto;
            border: 1px dotted #e4e4e4;
            height: 350px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.19), 0 0px 6px rgba(0, 0, 0, 0.19);
            margin-top: 10%;
            background-image: url(./images/giphyn.gif);
        }
        .inner-wrap-thanks {
            margin-top: 7%;
        }
        .inner-wrap-thanks img {
            display: block;
            margin: 10px auto;
        }
        .inner-wrap-thanks h1 {
            margin-bottom: 10px;
            font-weight: 800;
            color: #444;
        }
        .inner-wrap-thanks h3 {
            font-size: 17px;
            margin-bottom: 20px;
            line-height: 25px;
            color: #444;
        }
        .btn.btn-bgprimary {
            color: #fff;
            background-color: #ffaa22;
        }
        .btn-bgprimary:hover {
            color: #fff;
            background-color: #ffaa22;
        }
        @media(max-width:767px){
            .main-wrap-thanks {
                width: 100%;}
        }
    </style>
</head>
<body>
    <?php
    error_reporting(0);
    @session_start();
    include 'controls/Users.php';
    $objU = new User();
  $objU->Querytoemptycart('cart',session_id());
    ?>
    <div class="col-md-12">
        <div class="main-wrap-thanks">
            <div class="inner-wrap-thanks text-center">
                <h1>Thank you !</h1>   
                <img src="images/sign1.png" alt="" class="img-responsive">
                <h3>Thank you for your interest in our service.<br> We will reach out to you shortly !</h3>
                <a href="index" class="btn btn-bgprimary btn-small">Go to Home Page</a>
                <a href="my-order" class="btn btn-bgprimary btn-small">check order</a>
            </div>
        </div>
    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
