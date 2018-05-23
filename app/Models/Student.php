<?php

namespace App\Models;

use App\DB;

class Student
{
    public static function numInsc()
    {
        $sql = sprintf("SELECT COUNT(*) AS num FROM alunos_curso");
        $DB = new DB;

        $stmt = $DB->prepare($sql);
        if ($stmt->execute()) {
            $quantidade = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $quantidade['error'] = true;
        }
        $quantidade[0]['num'] = 60;

        return $quantidade;
    }

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
                $sql = sprintf("INSERT INTO alunos_curso (aluMatricula, aluNome, aluEmail, aluCurso, aluCPF) VALUES (:matricula, :nome, :email, :curso, :cpf)");
                $stmt = $DB->prepare($sql);
                $stmt->bindParam(':matricula', $array['matricula'], \PDO::PARAM_STR);
                $stmt->bindParam(':nome', $array['nome'], \PDO::PARAM_STR);
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

        $sql = "SELECT aluId, aluSubmeteu FROM alunos_curso WHERE aluMatricula = :matricula && MD5(REPLACE(REPLACE(aluCPF, '-', ''), '.', '')) = MD5(:cpf)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':matricula', $array['matricula'], \PDO::PARAM_INT);
        $stmt->bindParam(':cpf', $array['password'], \PDO::PARAM_INT);
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

    public static function fazerLoginAdmin($array)
    {
        $DB = new DB;

        $sql = "SELECT admId FROM admin_curso WHERE admUsuario = :usuario && admSenha = MD5(:password)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':usuario', $array['usuario'], \PDO::PARAM_STR);
        $stmt->bindParam(':password', $array['password'], \PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->errorCode() === "00000") {
            $admin = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $admin[0];
        } else {
            return false;
        }

    }

    public static function upImg($array, $descricao)
    {
        if (isset($array['file']['name']) && $array['file']['error'] == 0) {
            $file_tmp = $array['file']['tmp_name'];
            $nome = $array['file']['name'];
            $extensao = pathinfo($nome, PATHINFO_EXTENSION);
            $extensao = strtolower($extensao);

            // Somente imagens, .jpg;.jpeg;.gif;.png
            if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                $novoNome = $_SESSION['aluno'] . '.' . $extensao;
                $destino = viewsPath() . 'Frontend/images/alunos/' . $novoNome;

                if (move_uploaded_file($file_tmp, $destino)) {
                    $DB = new DB;

                    $sql = "INSERT INTO files (aluId, filDescricao, filTipo, filTamanho, filCaminho, filCriadoEm) VALUES (:aluno, :descricao, :tipo, :tamanho, :caminho, NOW())";
                    $stmt = $DB->prepare($sql);
                    $stmt->bindParam(':aluno', $_SESSION['aluno'], \PDO::PARAM_INT);
                    $stmt->bindParam(':descricao', $descricao, \PDO::PARAM_STR);
                    $stmt->bindParam(':tipo', $array['file']['type'], \PDO::PARAM_STR);
                    $stmt->bindParam(':tamanho', $array['file']['size'], \PDO::PARAM_INT);
                    $stmt->bindParam(':caminho', $destino, \PDO::PARAM_STR);
                    $stmt->execute();

                    if ($stmt->errorCode() === "00000") {
                        $sql = "UPDATE alunos_curso SET aluSubmeteu = 1 WHERE aluId = :aluno";
                        $stmt = $DB->prepare($sql);
                        $stmt->bindParam(':aluno', $_SESSION['aluno'], \PDO::PARAM_INT);
                        $stmt->execute();

                        if ($stmt->errorCode() === "00000") {
                            return true;
                        } else {
                            unlink($destino);
                            return false;
                        }
                    } else {
                        unlink($destino);
                        return false;
                    }

                } else
                    return false;
            } else
                return false;
        } else
            return false;
    }

    public static function selectAll()
    {
        $DB = new DB;

        $sql = "SELECT aluMatricula, aluNome, aluEmail, csDescricao, IF(aluSubmeteu, 'Logotipo enviado!', 'Matriculado') AS aluSubmeteu, filVotacao FROM alunos_curso ac JOIN cursos c ON ac.aluCurso = csId JOIN files f ON ac.aluId = f.aluId";
        $stmt = $DB->prepare($sql);
        $stmt->execute();

//        var_dump($stmt->errorCode());
        if ($stmt->errorCode() === "00000") {
            $alunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $alunos;
        } else {
            return false;
        }
    }

    public static function selectAllLogos()
    {
        $DB = new DB;

        $sql = "SELECT filDescricao, filCaminho, filId FROM alunos_curso ac JOIN files f ON f.aluId = ac.aluId ORDER BY filId";
        $stmt = $DB->prepare($sql);
        $stmt->execute();

        if ($stmt->errorCode() === "00000") {
            $alunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $alunos;
        } else {
            return false;
        }
    }

    public static function fazerLoginServidor($array)
    {
        $DB = new DB;

        $sql = "SELECT srvId, srvVotacao FROM servidores_votos WHERE srvCiap = :usuario && srvSenha = MD5(:password)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':usuario', $array['usuario'], \PDO::PARAM_STR);
        $stmt->bindParam(':password', $array['password'], \PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->errorCode() === "00000") {
            $admin = $stmt->fetchAll(\PDO::FETCH_ASSOC);;
            return $admin[0];
        } else {
            return false;
        }
    }

    public static function votar($id)
    {
        $DB = new DB;

        $sql = "UPDATE files SET filVotacao = filVotacao+1 WHERE filId = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->errorCode() === "00000") {
            $sql = "UPDATE servidores_votos SET srvVotacao = NOW() WHERE srvId = :id";
            $stmt = $DB->prepare($sql);
            $stmt->bindParam(':id', $_SESSION['servidor']['id'], \PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->errorCode() === "00000") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}