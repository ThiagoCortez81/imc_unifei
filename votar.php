<?php

require_once __DIR__ . '/init.php';
require_once __DIR__ . '/app/DB.php';
require_once __DIR__ . '/app/Models/Student.php';
require_once __DIR__ . '/app/View.php';
require_once __DIR__ . '/app/helpers.php';
require_once __DIR__ . '/app/Controllers/StudentController.php';

if ($_GET['id'] != '') {
    $StudentController = new \App\Controllers\StudentController();
    $StudentController->doVote($_GET['id']);
}