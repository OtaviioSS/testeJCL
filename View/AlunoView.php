<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste JCL</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

</head>
<body>
<div class="container">
    <div id="divadd" class="row">
        <form id="form" method="post" action="src/controllers/AlunoController.php">
            <div class="form-control mt-4">
                <div class="text-center"><h1>Cadastro de Aluno</h1></div>

                <label for="nome">Nome</label>
                <input class="form-control" maxlength="32" required name="nome" id="nome" type="text">

                <label for="email">Email</label>
                <input required class="form-control" name="email" id="email" type="email">

                <label  for="curso">Curso que tem intenção de se Matricular</label>
                <select class="form-control" name="curso" id="curso" required>
                    <option value="0">Selecione um Curso</option>
                    <?php
                    $consulta = Connection::getConexao()->query("SELECT * FROM curso");
                    while ($cursos = $consulta->fetch()) { ?>

                        <option value="<?= $cursos['idecurso']; ?>"><?= $cursos['nomecurso']; ?></option>
                    <?php } ?>
                </select>


                <div class="text-center d-grid gap-2">
                    <input type="hidden" value="1" name="type">
                    <div class="text-center">
                        <button name="ajax" id="ajax" type="button"
                                class="btn btn-primary btn-lg mt-4 col-3">Cadastrar
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <div class="row">
        <table id="myTable" class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Editar</th>
                <th>Exluir</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $consulta = Connection::getConexao()->query("SELECT * FROM  aluno a  INNER JOIN curso c ON a.idecurso = c.idecurso");
            while ($row = $consulta->fetch()) { ?>
                <tr>
                    <input value="<?php echo $row['idaluno']; ?>" id="rowId" hidden onclick="editRow(this);"
                           contenteditable="true">
                    <td id="rowNome" onclick="editRow(this);" contenteditable="true"><?php echo $row['nome']; ?></td>
                    <td id="rowEmail" onclick="editRow(this);" contenteditable="true"><?php echo $row['email']; ?></td>
                    <td id="rowCurso" onclick="editRow(this);"
                        contenteditable="true"><?= $row['nomecurso']; ?></td>
                    <td>
                        <a href="pageedit.php?id=<?= $row['idaluno']; ?>" id="editSave" name="editSave"
                           class="btn btn-success">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="src/controllers/AlunoController.php?idexcluir=<?= $row['idaluno']; ?>" id="btnname"
                           name="btnname" class="btn btn-danger">Excluir</a>
                    </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-3.5.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({

        });
    });
</script>
<script>
    function editRow(editableObj) {
        $(editableObj).css("background", "#FFF");
    }

    function saveToDatabase() {
        var data = $("#user_form").serialize()

        //console.log(u_name, u_comment);
        $.ajax({
            url: 'src/controllers/AlunoController.php',
            method: 'POST',
            data: {
                name: u_name,
                email: u_email,
                curso: u_curso,
                cad: u_cad,
            },
            dataType: 'json',
            cache: false,
            error: function () {
                alert('Erro: Inserir Registo!!');
            },
            success: function (result) {
                if (result === true) {
                    alert("O seu registo foi inserido com sucesso!");
                } else {
                    alert("Ocorreu um erro ao inserir o seu registo!");
                }

            }
        });

    }

    $(document).on('click', '#ajax', function (e) {
        var data = $("#form").serialize();
        $.ajax({
            data: data,
            type: "post",
            url: "src/controllers/AlunoController.php",
            success: function (result) {
                if (result.status === "success") {
                    $(".table").reload();
                } else if (result.status === "error") {
                    alert("Email do aluno ja cadastrado");
                }
            }
        });
        $( "#myTable" ).load(window.location.href + " #myTable" );
        $( "#nome" ).val('');
        $( "#email" ).val('');
        $( "#curso" ).val('0');


    });

</script>
</body>
</html>

