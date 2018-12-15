<?php require_once("./conexao/conexao.php"); ?>
<?php
    if(isset($_POST["nomedoaluno"]) ) {
        $mID = $_POST["matriculaID"];
        $exclusao = "DELETE FROM matricula ";
        $exclusao .= "WHERE matriculaID = {$mID}";
        $con_exclusao = mysqli_query($conecta,$exclusao);
        if(!$con_exclusao){
        die("Registro não excluído");
    } else {
        header("location:listagem.php");
    }
    }
//Consulta a tabela de matrículas
    $tr = "SELECT * ";
    $tr .= "FROM matricula ";
    if(isset($_GET["codigo"]) ) {
        $id = $_GET["codigo"];
        $tr .= "WHERE matriculaID = {$id} ";
    }
    $con_matricula = mysqli_query($conecta,$tr);
    $info_matricula = mysqli_fetch_assoc($con_matricula);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exclusão de dados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src=""></script>
</head>
<body>
    <section class="form-row">
        <div class="container">
            <div class="text-center">
                <h2>Exclusão de dados</h2>
            </div>
            <form action="exclusao.php" method="post">
            <div class="form-group col-md-6">
                <div class="form-group">
                    <label for="nomedoaluno" class="lab">Nome do aluno</label>
                    <input type="text" value="<?php echo $info_matricula["nomedoaluno"] ?>" id="nomedoaluno" name="nomedoaluno" class="form-control" placeholder="Nome do aluno">
                </div>
                <div class="form-group">
                    <label for="nomedamae" class="lab">Nome da mãe</label>
                    <input type="text" value="<?php echo $info_matricula["nomedamae"] ?>" id="nomedamae" name="nomedamae" class="form-control" placeholder="Nome do mãe"> 
                </div>
                <div class="form-group">
                    <label for="endereco" class="lab">Endereço</label>
                    <input type="text" value="<?php echo $info_matricula["endereco"] ?>" id="endereco" name="endereco" class="form-control" placeholder="Endereço">  
                </div>
                <div class="form-group">
                    <label for="nascimento" class="lab">Data de nacimento</label>
                    <input type="date" value="<?php echo $info_matricula["nascimento"] ?>" id="nascimento" name="nascimento" class="form-control" placeholder="Data de nascimento">  
                </div>
                <div class="form-group">
                    <label for="serie" class="lab">Série</label>
                    <input type="text" value="<?php echo $info_matricula["serie"] ?>" id="serie" name="serie" class="form-control" placeholder="série"> 
                </div>
                <div class="form-group">
                    <label for="turno" class="lab">Turno</label>
                    <input type="text" value="<?php echo $info_matricula["turno"] ?>" id="turno" name="turno" class="form-control" placeholder="Turno">
                </div>
                <input type="hidden" name="matriculaID" value="<?php echo $info_matricula["matriculaID"] ?>">
                <input type="submit" class="btn btn-primary" value="Excluir">
            </form>

        </div>

    </section>
</body>
</html>
<?php
    // Fechar conexao
    mysqli_close($conecta);
?>