<?php
/**
 * Created by PhpStorm.
 * User: thiagocortez
 * Date: 12/04/18
 * Time: 21:24
 */


require_once __DIR__ . '/init.php';
require_once __DIR__ . '/app/DB.php';
require_once __DIR__ . '/app/Models/Student.php';
require_once __DIR__ . '/app/View.php';
require_once __DIR__ . '/app/helpers.php';
require_once __DIR__ . '/app/Controllers/StudentController.php';

if ($_POST) {
    $AdminController = new \App\Controllers\StudentController();
    $AdminController->doAuthAdmin($_POST);
} else {
    $AdminController = new \App\Controllers\StudentController();
    $AdminController->authAdmin();
}