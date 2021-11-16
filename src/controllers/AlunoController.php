<?php

namespace controllers;

use models\Aluno;
use DAO\AlunoDAO;

require __DIR__ . "./../Models/Aluno.php";
require __DIR__ . "./../DAO/AlunoDAO.php";
require __DIR__ . "./../Config/Connection.php";
header('Content-Type: application/json');


class AlunoController
{

    public function criarNovoAluno()
    {

        $alunoDAO = new AlunoDAO();
        $result = $alunoDAO->buscarAlunoEmail(trim($_POST['email']));

        if ($result == 0){
            $aluno = new Aluno();
            $aluno->setNome(trim($_POST['nome']));
            $aluno->setEmail(trim($_POST['email']));
            $aluno->setCurso(trim($_POST['curso']));
            $alunoDAO->inserirAluno($aluno);
            echo json_encode(array(
                'status' => 'success',
                'message'=> 'success message'
            ));
        }else{
            echo json_encode(array(
                'status' => 'error',
                'message'=> 'error message'
            ));

        }


    }

    public function atualizarAluno(Aluno $aluno)
    {
        $alunoDAO = new AlunoDAO();
        $alunoDAO->atualizarAluno($aluno);
        return true;
    }

    public function deleteAluno($id)
    {
        $alunoDAO = new AlunoDAO();
        $alunoDAO->deletar($id);
        return true;

    }


    public function verificarEmail($email)
    {
        try {
            $alunoDAO = new AlunoDAO();
            return ;
        }catch (\Exception $exception){
            return false;
        }


    }
}

$alunoController = new AlunoController();

if (isset($_POST['cadasatrar'])) {
    $alunoController->criarNovoAluno();
}

if (count($_POST)>0) {
    if ($_POST['type']==1){

        $alunoController->criarNovoAluno();
    }

}

if (isset($_POST['editSave'])) {
    try {
        $aluno = new Aluno();
        $aluno->setNome(trim($_REQUEST['nome']));
        $aluno->setEmail(trim($_REQUEST['email']));
        $aluno->setCurso(trim($_REQUEST['curso']));
        $aluno->setId(trim($_REQUEST['idaluno']));
        $alunoController->atualizarAluno($aluno);
        header('Location: ./../../index.php');
        return true;

    } catch (\Exception $exception) {
        return $exception;
    }


}

if (isset($_GET['idexcluir'])) {
    $id = $_GET['idexcluir'];
    $alunoController->deleteAluno($id);
    header('Location: ./../../index.php');
}