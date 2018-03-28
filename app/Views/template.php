<!doctype html>
<html>
<head>
    <title>Contact V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo frontendPath(); ?>images/icons/favicon.ico"/>
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
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo frontendPath(); ?>css/bootstrap-reboot.min.css">
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
<script src="<?php echo frontendPath(); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo frontendPath(); ?>vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo frontendPath(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo frontendPath(); ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo frontendPath(); ?>js/jquery.mask.js"></script>
<script src="<?php echo frontendPath(); ?>js/main.js"></script>
</html>