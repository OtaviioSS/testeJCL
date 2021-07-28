<?php


$insertAluno = function ($data) use ($conexao) {
    try {

        $conexao->beginTransaction();
        $sql = "INSERT INTO alunos (cpf, nome, nascimento, telefone,
                    whatsapp,curso,caddata) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $data['cpf']);
        $stmt->bindValue(2, $data['nome']);
        $stmt->bindValue(3, $data['nascimento']);
        $stmt->bindValue(4, $data['telefone']);
        $stmt->bindValue(5, $data['whatsapp']);
        $stmt->bindValue(6, $data['curso']);
        $stmt->bindValue(7, $data['dataCad']);
        $stmt->execute();
        return $conexao->commit();

    } catch (Exception $e) {

        echo $e;
    }

};
$getAlunos = function () use ($conexao) {
    $query = "SELECT * FROM alunos";
    return $query;
};

$getCurso = function () use ($conexao) {
    try {
        $result = $conexao->prepare("select * from cursos");
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }catch (Exception $e){
        echo $e;
    }

};