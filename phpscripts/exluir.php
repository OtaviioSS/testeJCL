<?php
include "../functions/conexao.php";
include "../functions/sql.php";

$data = $_GET['id'];

if($deleteAluno($data)){


    echo "<script>alert('Erro exluir os dados, por favor tente novamente mais tarde');</script>";
    echo "<script language=javascript>window.history.back();</script>";



}else{
    echo "<script>alert('Excluido com Sucesso!');</script>";
    sleep(3);
    echo "<script language=javascript>window.location='index.php';</script>";


}