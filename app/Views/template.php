<!doctype html>
<html>
<head>
    <title>UNIFEI - Logotipo IMC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png"
          href="https://unifei.edu.br/wp-content/themes/twentytwelve-child/img/cabecalho/logo-unifei-oficial.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo frontendPath(); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/main.css?v=1.1">
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/dropzone-basic.min.css">
    <!--===============================================================================================-->
    <script src="<?php echo frontendPath(); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
</head>

<body>
<?php
if (isset($viewName)) {
    $path = viewsPath() . $viewName . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
}
?>
</body>

<!--===============================================================================================-->
<script src="<?php echo frontendPath(); ?>vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo frontendPath(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo frontendPath(); ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo frontendPath(); ?>js/jquery.mask.js"></script>
<script src="<?php echo frontendPath(); ?>js/dropzone.js"></script>
<script src="<?php echo frontendPath(); ?>js/main.js"></script>
<script>
    Dropzone.autoDiscover = false;
    $(document).ready(function () {
        uploadLogo = new Dropzone("#uploadLogo", {
            url: '/unifei/index.php/sendImage',
            method: 'post',
            paramName: "file",
            thumbnailHeight: 350,
            thumbnailWidth: 350,
            uploadMultiple: false,
            maxFiles: 1,
            acceptedFiles: 'image/*',
            maxFilesize: 2,
            addRemoveLinks: false,
            autoProcessQueue: false
        });

        uploadLogo.on('error', function (file, message) {
            alert(message);
            uploadLogo.removeAllFiles();
        });

        uploadLogo.on("success", function (file, message) {
            var res = JSON.parse(message);
            if (res.success) {
                console.log("aqui");
                window.location.replace("/unifei/index.php/send");
            }
        });

        $('#sendImg').on('click', function (e) {
            uploadLogo.processQueue();
        });
    });
</script>
</html>