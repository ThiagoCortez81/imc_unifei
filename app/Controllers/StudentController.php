<?php

namespace App\Controllers;

use \App\Models\Student;

class StudentController
{
    public function subscribe()
    {
        $StudentModel = new \App\Models\Student();
        $quantidade = $StudentModel::numInsc();
        $courses = $StudentModel::selectCourses();

        if (!$courses['error'] && !$quantidade['error']) {
            if ($quantidade[0]['num'] <= 50)
                \App\View::make('students.subscription', array('registro' => false, 'courses' => arrayToUtf8($courses), 'finalizado' => false));
            else if ($quantidade[0]['num'] < 60)
                \App\View::make('students.subscription', array('registro' => false, 'courses' => arrayToUtf8($courses), 'retaFinal' => true, 'finalizado' => false));
            else
                \App\View::make('students.subscription', array('registro' => false, 'courses' => arrayToUtf8($courses), 'finalizado' => true));

        } else
            echo '<h1><b>DB ERROR!</b></h1>';
    }

    //Cadastra aluno no curso
    public function cadastrarCurso($campos)
    {
        $StudentModel = new \App\Models\Student();
        $quantidade = $StudentModel::numInsc();
        $courses = $StudentModel::selectCourses();
        $res = $StudentModel::cadastrarCurso($campos);

        if ($quantidade[0]['num'] < 60) {
            if (!empty($res['matricula'])) {
                \App\View::make('students.subscription', array('cpfExistente' => $res, 'registro' => true, 'courses' => arrayToUtf8($courses)));
            } else {
                if (!$res) {
                    if ($quantidade[0]['num'] <= 50)
                        \App\View::make('students.subscription', array('cadastroSucesso' => true, 'registro' => true, 'courses' => arrayToUtf8($courses), 'finalizado' => false));
                    else if ($quantidade[0]['num'] <= 60)
                        \App\View::make('students.subscription', array('cadastroSucesso' => true, 'registro' => true, 'courses' => arrayToUtf8($courses), 'retaFinal' => true, 'finalizado' => false));
                    else
                        \App\View::make('students.subscription', array('cadastroSucesso' => true, 'registro' => true, 'courses' => arrayToUtf8($courses), 'finalizado' => true));
                } else {
                    \App\View::make('students.subscription', array('cadastroSucesso' => false, 'registro' => true, 'courses' => arrayToUtf8($courses)));
                }
            }
        } else
            \App\View::make('students.subscription', array('registro' => false, 'courses' => arrayToUtf8($courses), 'finalizado' => true));
    }

    //Login

    public function doAuth($campos)
    {
        $StudentModel = new \App\Models\Student();
        $login = $StudentModel::fazerLogin($campos);

        if (is_array($login)) {
            if ($login['aluId'] && $login['aluSubmeteu'] == 0) {
                $_SESSION['aluno'] = $login['aluId'];
                \App\View::make('students.upload', array());

            } else {
                $this->auth('Ops, parece que você já enviou um logo!');
            }
        } else if ($login == NULL) {
            $this->auth('Matricula e/ou senha não conferem!');
        } else {
            $this->auth('Erro no servidor!');
        }
    }

    public function auth($error = null, $success = null)
    {
        if ($_SESSION['success']) {
            $success = $_SESSION['success'];
            $_SESSION['success'] = '';
            unset($_SESSION['success']);
        }

        \App\View::make('students.auth', array('error' => $error, 'success' => $success));
    }

    //Receber imagem e salvar
    public function saveFile($file, $descricao)
    {
        $StudentModel = new \App\Models\Student();
        $upload = $StudentModel::upImg($file, $descricao);

        if ($upload) {
            $_SESSION['success'] = "Obrigado, seu logo foi enviado com sucesso!";
            $res['success'] = true;
            echo json_encode($res);
        }
    }

    //Login admin

    public function doAuthAdmin($campos)
    {
        $StudentModel = new \App\Models\Student();
        $login = $StudentModel::fazerLoginAdmin($campos);

        if (is_array($login)) {
            if (!empty($login['admId'])) {
                $_SESSION['admin'] = $login['admId'];
                \App\View::make('admin.viewAll', array());

            } else {
                $this->authAdmin('Ops, parece que você já enviou um logo!');
            }
        } else if ($login == NULL) {
            $this->authAdmin('Login e/ou senha não conferem!');
        } else {
            $this->authAdmin('Erro no servidor!');
        }
    }

    public function authAdmin($error = null, $success = null)
    {
        if ($_SESSION['success']) {
            $success = $_SESSION['success'];
            $_SESSION['success'] = '';
            unset($_SESSION['success']);
        }

        \App\View::make('admin.auth', array('error' => $error, 'success' => $success));
    }

    public function vote($campos)
    {
        $_SESSION['servidor'] = true;
        \App\View::make('galeria.viewAll', array('visualizar' => true, 'votou' => true));
    }
}