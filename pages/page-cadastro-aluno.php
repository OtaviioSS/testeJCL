<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste JCL</title>
    <!-- CSS only -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form method="post" action="../phpscripts/salvaraluno.php">

        <div class="form-control mt-4">
            <div class="text-center"><h1>Cadastro de Aluno</h1></div>

            <label for="txtnome">Nome</label>
            <input class="form-control" name="txtnome" id="txtnome" type="text">

            <label for="txtnascimento">Data de Nascimento</label>
            <input class="form-control"  name="txtnascimento" id="txtnascimento" type="date">

            <label for="txtcpf">CPF</label>
            <input  required maxlength="11" minlength="11" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})" name="txtcpf" class="form-control" id="txtcpf">

            <label for="txttelefone">Telefone</label>
            <input name="txttelefone" data-mask="(00) 00000-0000" maxlength="11" data-mask-selectonfocus="true"
                   required class="form-control" id="txttelefone">

            <label for="txtwhatsapp">Numero do Whatsapp</label>
            <input maxlength="9"  name="txtwhatsapp" class="form-control" id="txtwhatsapp" type="text" >

            <label for="txtcurso">Curso que tem intenção de se Matricular</label>
            <select class="form-control" name="txtcurso" id="txtcurso" required>
                <option value="">Selecione um Curso</option>
                <?php foreach ($getCurso() as $curso): ?>
                    <option value="<?= $curso['id']; ?>"><?= $curso['nome']; ?></option>
                <?php endforeach; ?>
            </select>


            <div class="text-center d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg mt-4 align-content-center">Cadastrar</button>
            </div>

        </div>
    </form>

</div>
<!-- JavaScript Bundle with Popper -->
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>