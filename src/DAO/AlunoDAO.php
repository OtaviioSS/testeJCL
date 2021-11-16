<?php

namespace DAO;

use models\Aluno;
use Connection;
use Exception;

class AlunoDAO
{


    public function inserirAluno(Aluno $aluno)
    {
        $conexao = Connection::getConexao();
        $conexao->beginTransaction();
        $sql = "INSERT INTO aluno (nome,email,idecurso) VALUES (?, ?, ?)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $aluno->getNome());
        $stmt->bindValue(2, $aluno->getEmail());
        $stmt->bindValue(3, $aluno->getCurso());
        $stmt->execute();
        return $conexao->commit();

    }

    public function atualizarAluno(Aluno $aluno)
    {
        try {

            $sql = "UPDATE aluno SET nome=?,
                                     email=?,
                                     idecurso=?
                                     WHERE idaluno=?";

            $stmt = Connection::getConexao()->prepare($sql);
            $stmt->bindValue(1, $aluno->getNome());
            $stmt->bindValue(2, $aluno->getEmail());
            $stmt->bindValue(3, $aluno->getCurso());
            $stmt->bindValue(4, $aluno->getId());
            return $stmt->execute();

        } catch (Exception $exception) {
            return $exception;

        }
    }

    public function buscarAlunoEmail($email)
    {
        try {
            $result = Connection::getConexao()->prepare("SELECT * FROM aluno 
                                                WHERE email = ?");
             $result->execute([$email]);
            return $result->rowCount();
        } catch (Exception $exception) {
            return false;
        }
    }


    public function deletar($id)
    {
        try {
            $sql = Connection::getConexao()->prepare("DELETE FROM aluno WHERE
                                    idaluno= $id");
            $sql->execute();
            return true;
        } catch (Exception $exception) {
            return $exception;

        }
    }


}