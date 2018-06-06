<?php

require_once __DIR__ . '/init.php';
require_once __DIR__ . '/app/DB.php';
require_once __DIR__ . '/app/Models/Student.php';
require_once __DIR__ . '/app/View.php';
require_once __DIR__ . '/app/helpers.php';
require_once __DIR__ . '/app/Controllers/StudentController.php';
//error_reporting(E_ALL);

if ($_POST || $_SESSION) {
    if ($_POST)
        $arr = $_POST;

    $StudentsController = new \App\Controllers\StudentController();
    $StudentsController->vote($arr);
} else {
    $StudentsController = new \App\Controllers\StudentController();
    $StudentsController->vote(null);
}