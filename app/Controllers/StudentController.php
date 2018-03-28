<?php

namespace App\Controllers;

use \App\Models\Student;

class StudentController
{
    public function subscribe()
    {
        $StudentModel = new \App\Models\Student();
        $courses = $StudentModel::selectCourses();
        if (!$courses['error'])
            \App\View::make('students.subscription', ['registro' => false, 'courses' => arrayToUtf8($courses)]);
        else
            echo '<h1><b>DB ERROR!</b></h1>';
    }

    //Cadastra aluno no curso
    public function cadastrarCurso($campos)
    {
        $StudentModel = new \App\Models\Student();
        $courses = $StudentModel::selectCourses();
        $res = $StudentModel::cadastrarCurso($campos);

        if (!empty($res['matricula'])) {
            \App\View::make('students.subscription', ['cpfExistente' => $res, 'registro' => true, 'courses' => arrayToUtf8($courses)]);
        } else {
            if (!$res) {
                \App\View::make('students.subscription', ['cadastroSucesso' => true, 'registro' => true, 'courses' => arrayToUtf8($courses)]);
            } else {
                \App\View::make('students.subscription', ['cadastroSucesso' => false, 'registro' => true, 'courses' => arrayToUtf8($courses)]);
            }
        }
    }

    //Login

    public function doAuth($campos)
    {
        $StudentModel = new \App\Models\Student();
        $login = $StudentModel::fazerLogin($campos);

        if (is_array($login)) {
            if ($login['aluId'] && $login['aluSubmeteu'] == 0) {
                \App\View::make('students.gallery', ['id' => $login['aluId']]);

            } else {
                $this->auth('Ops, parece que você já enviou um logo!');
            }
        } else if ($login == NULL) {
            $this->auth('Matricula e/ou senha errada!');
        } else {
            $this->auth('Erro no servidor!');
        }
    }

    public function auth($error = null)
    {
        \App\View::make('students.auth', ['error', $error]);
    }
}