<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UNIFEI - Logotipo IMC</title>
    <link rel="icon" type="image/png"
          href="https://unifei.edu.br/wp-content/themes/twentytwelve-child/img/cabecalho/logo-unifei-oficial.png"/>

    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/main.css?v=1.1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="<?php echo frontendPath(); ?>css/thumbnail-gallery.css">
    <style>
        #baguetteBox-overlay .full-image img {
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        }
    </style>
    <script src="<?php echo frontendPath(); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<body style="margin-top: -22px;background-image: url('<?php echo frontendPath(); ?>images/bg-01.jpg');">
<div style="background: rgba(16, 58, 132, 0.8);  <?php if (empty($_SESSION['servidor'])) {
    echo "height: fit-content;";
} ?>">
    <div class="container gallery-container wrap-contact2" style="margin-top: 20px;">
        <?php
        if (isset($viewName)) {
            $path = viewsPath() . $viewName . '.php';
            if (file_exists($path)) {
                require_once $path;
            }
        }
        ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>