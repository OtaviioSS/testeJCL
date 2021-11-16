<?php
include_once 'src/Config/Connection.php';
$id = $_GET['id'];

$sql = Connection::getConexao()->prepare("SELECT * FROM  aluno a  INNER JOIN curso c ON a.idecurso = c.idecurso where idaluno = $id");
$sql->execute();
$aluno = $sql->fetch();

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<form method="post" action="src/controllers/AlunoController.php">
    <input name="idaluno" id="idaluno" hidden value="<?= $aluno['idaluno']; ?>">
    <div class="form-control mt-4">
        <div class="text-center"><h1>Editar Aluno</h1></div>

        <label for="nome">Nome</label>
        <input class="form-control" value="<?= $aluno['nome']; ?>" name="nome" id="nome" type="text">

        <label for="email">Email</label>
        <input class="form-control"  value="<?= $aluno['email']; ?>" name="email" id="email" type="email">

        <label for="curso">Curso que tem intenção de se Matricular</label>
        <select class="form-control"  name="curso" id="curso" required>
            <option  value="<?= $aluno['idecurso']; ?>"><?= $aluno['nomecurso']; ?></option>
            <?php
            $consulta = Connection::getConexao()->query("SELECT * FROM curso");
            while ($cursos = $consulta->fetch()) { ?>

                <option value="<?= $cursos['idecurso']; ?>"><?= $cursos['nomecurso']; ?></option>
            <?php } ?>
        </select>


        <div class="text-center d-grid gap-2">
            <button name="editSave" id="editSave" type="submit"
                    class="btn btn-primary btn-lg mt-4 align-content-center">Cadastrar
            </button>
        </div>

    </div>
</form>
</body>
</html>
