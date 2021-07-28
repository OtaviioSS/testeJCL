<?php require_once "functions/conexao.php";
    include "functions/sql.php";
?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste JCL</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="form-control">
        <h1>Lista de alunos</h1>

        <div><a href="cadastro.php" class="btn btn-primary">Cadastrar Novo Aluno</a></div>
        <table class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Whatsapp</th>
                <th>Curso</th>
                <th>Data e hora do cadastro</th>
                <th>#</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $consulta = $conexao->query($getAlunos());
            while ($row = $consulta->fetch()) { ?>

            <tr>
                <td><?php echo $row['nome']?></td>
                <td><?php echo $row['nascimento']?></td>
                <td><?php echo $row['cpf']?></td>
                <td><?php echo $row['telefone']?></td>
                <td><?php echo $row['whatsapp']?></td>
                <td><?php echo $row['curso']?></td>
                <td><?php echo $row['caddata']?></td>
                <td><a href="phpscripts/exluir.php?id=<?=$row['cpf']; ?>" class="btn btn-danger">Excluir</a> </td>



            </tr>
            </tbody>
            <?php } ?>

        </table>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>