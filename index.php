<?php
require_once 'vendor/autoload.php';

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$app->get('/subscribe', function () {
    $StudentsController = new \App\Controllers\StudentController();
    $StudentsController->subscribe();
});

$app->post('/subscribe', function () {
    $StudentsController = new \App\Controllers\StudentController();
    $StudentsController->cadastrarCurso($_POST);
});

$app->get('/auth', function () {
    $StudentsController = new \App\Controllers\StudentController();
    $StudentsController->auth();
});

$app->post('/auth', function () {
    $StudentsController = new \App\Controllers\StudentController();
    $StudentsController->doAuth($_POST);
});

$app->run();
?>