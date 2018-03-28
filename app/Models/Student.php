<?php

namespace App\Models;

use App\DB;

class Student
{
    public static function selectCourses()
    {
        $sql = sprintf("SELECT * FROM cursos ORDER BY csDescricao");
        $DB = new DB;

        $stmt = $DB->prepare($sql);
        if ($stmt->execute()) {
            $courses = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $courses['error'] = true;
        }

        return $courses;
    }

    public static function cadastrarCurso($array)
    {
        $DB = new DB;

        $sql = sprintf("SELECT aluId FROM alunos_curso WHERE aluCPF = :cpf OR aluMatricula = :matricula");
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':cpf', $array['cpf'], \PDO::PARAM_STR);
        $stmt->bindParam(':matricula', $array['matricula'], \PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->errorCode() === "00000") {
            $existe = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (empty($existe)) {
                $sql = sprintf("INSERT INTO alunos_curso (aluMatricula, aluEmail, aluCurso, aluCPF) VALUES (:matricula, :email, :curso, :cpf)");
                $stmt = $DB->prepare($sql);
                $stmt->bindParam(':matricula', $array['matricula'], \PDO::PARAM_STR);
                $stmt->bindParam(':email', $array['email'], \PDO::PARAM_STR);
                $stmt->bindParam(':curso', $array['curso'], \PDO::PARAM_INT);
                $stmt->bindParam(':cpf', $array['cpf'], \PDO::PARAM_STR);

                $stmt->execute();
                if ($stmt->errorCode() === "00000") {
                    return false;
                } else {
                    return true;
                }

            } else {
                return $array;
            }
        } else {
            return true;
        }
    }

    public static function fazerLogin($array)
    {
        $DB = new DB;

        $sql = "SELECT aluId, aluSubmeteu FROM alunos_curso WHERE aluMatricula = :matricula && MD5(REPLACE(REPLACE(aluCPF, '-', ''), '.', '')) = :cpf";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':matricula', $array['matricula'], \PDO::PARAM_INT);
        $stmt->bindParam(':cpf', md5($array['password']), \PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->errorCode() === "00000") {
            $submeteu = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (!$submeteu['aluSubmeteu']) {
                return $submeteu[0];
            } else {
                return false;
            }
        } else {
            return false;
        }

    }
}