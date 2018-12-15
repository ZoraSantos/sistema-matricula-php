<?php
    //conexão
    $conecta = mysqli_connect("localhost","root","","escola");

    //teste conexão
    if (mysqli_connect_error()) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

?>