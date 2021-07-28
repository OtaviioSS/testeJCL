<?php

include "../functions/conexao.php";
include "../functions/sql.php";


$data = [
    'nome' => trim($_POST['txtnome']),
    'cpf' => trim($_POST['txtcpf']),
    'nascimento' => trim($_POST['txtnascimento']) ,
    'telefone' => trim($_POST['txttelefone']),
    'whatsapp' => trim($_POST['txtwhatsapp']),
    'curso' => trim($_POST['txtcurso']),
    'dataCad' => date('m d Y')
];


if ($insertAluno($data)) {
    try {
        echo "<script>alert('Dados Enviados com Sucesso!');</script>";
        echo "<script language=javascript>window.history.back();</script>";
    }catch (Exception $e){
        echo $e;
    }


}else{
    echo "<script>alert('Houve um problema ao cadastrar o aluno!');</script>";
    echo "<script language=javascript>window.history.back();</script>";
}

