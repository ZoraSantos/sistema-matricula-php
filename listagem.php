<?php require_once("./conexao/conexao.php"); ?>
<?php
    // tabela de matrículas
    $tr = "SELECT * FROM matricula ";
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alunos matriculados</title>
        
        <style>
            div#list_matricula {
                width:700px;
                margin:60px auto 0;
                border:1px solid #EDEDDC;
                font-family:sans-serif;
                font-size:13px;
                color:#9A9668;
            }
            
            div#list_matricula ul {
                margin:0;padding:0; 
                border-bottom:1px solid #EDEDDC;
            }
            
            div#list_matricula ul:last-child {
                border-bottom:none;
            }
            
            div#list_matricula ul:nth-child(odd) {
                background:#EDEDDC;   
            }
            
            div#list_matricula li {
                list-style:none;
                display:inline-block;
                
            }
            
            div#list_matricula li:nth-child(1) {
                width:200px; 
                padding:8px 4px;
            }

            div#list_matricula li:nth-child(2) {
                width:140px;  
                padding:5px 2px;
            }    
            
            div#list_matricula li:nth-child(3) a {
                color:#9A9668;
            }
        </style>
    </head>
    <body>
    <main>
        <div id="list_matricula">
                <?php
                    while($linha = mysqli_fetch_assoc($consulta_tr)) {
                ?>
                <ul>
                    <li><?php echo $linha["nomedoaluno"] ?></li>
                    <li><?php echo $linha["nomedamae"] ?></li>
                    <li><?php echo $linha["endereco"] ?></li>
                    <li><?php echo $linha["nascimento"] ?></li>
                    <li><?php echo $linha["serie"] ?></li>
                    <li><?php echo $linha["turno"] ?></li>
                    <li><a href="alteracao.php?codigo=<?php echo $linha["matriculaID"] ?>">Alterar</a> </li>
                    <li><a href="exclusao.php?codigo=<?php echo $linha["matriculaID"] ?>">Exclusão</a> </li>
                </ul>
                <?php
                    }
                ?>
        </div>
    </main>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>