<?php require_once("./conexao/conexao.php"); ?>
<?php
//insecao no banco
    if(isset($_POST["nomedoaluno"])) {
        $nomedoaluno = $_POST["nomedoaluno"];
        $nomedamae   = $_POST["nomedamae"];
        $endereco    = $_POST["endereco"];
        $nascimento  = $_POST["nascimento"];
        $serie       = $_POST["serie"];
        $turno       = $_POST["turno"];

        $inserir = "INSERT INTO matricula ";
        $inserir .= "(nomedoaluno,nomedamae,endereco,nascimento,serie,turno) ";
        $inserir .= "VALUES ";
        $inserir .= "('$nomedoaluno','$nomedamae','$endereco','$nascimento','$serie','$turno')";

        $operacao_inserir = mysqli_query($conecta,$inserir);
        if(!$operacao_inserir) {
            die("Erro no banco");
        }else {
        header("location:listagem.php");
    }

    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulário de matrícula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src=""></script>
</head>
<body>
    <section>
        <div class="container">
            <div class="text-center">
                <h2>Matrícula de novos Alunos</h2>
            </div>
            <form action="index.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <input type="text" id="nomedoaluno" name="nomedoaluno" class="form-control" placeholder="Nome do aluno">
                        </div>
                        <div class="form-group">
                            <input type="text"  id="nomedamae" name="nomedamae" class="form-control" placeholder="Nome do mãe">
                        </div>
                        <div class="form-group">
                            <input type="text"  id="endereco" name="endereco" class="form-control" placeholder="Endereço">
                        </div>
                        <div class="form-group">
                            <input type="date"  id="nascimento" name="nascimento" class="form-control" placeholder="Data de nascimento">
                        </div>
                        <div class="form-group">
                            <input type="text"  id="serie" name="serie" class="form-control" placeholder="série">
                        </div>
                        <div class="form-group">
                            <input type="text"  id="turno" name="turno" class="form-control" placeholder="Turno">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Matricular">
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>