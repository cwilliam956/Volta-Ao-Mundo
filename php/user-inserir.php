<?php

try{
    $usuario = $_POST["usuario"];


    //gera um bash SHA-256 da senha recebido pelo formulário
    $senha = hash("sha256", $_POST["senha"]);

    //cria uma nova instancia da classe DateTime
    //e obtem a data atual no formulário "dia-mês-ano"


    $sql = "INSERT INTO usuarios (usuario, senha)
            VALUES ('{$usuario}','{$senha}')";

    include_once "../Classes/Conexao.php";
    $conexao->exec($sql);
    echo "<h3>Registro gravado com suscesso</h3>";

}

catch (Exception $erro) {
    //habilitar o codigo abaixo para depurar o erro
    //echo $erro->getMessage();
    echo "Ocorreu um erro. Por favor, tente novamente mais tarde.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERRO</title>
    <link href="https://getbootstrap.com.br/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilos customizados para esse template -->
  <link href="https://getbootstrap.com.br/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body class="text-center flex-column">
    <a class="btn btn-lg btn-dark px-5 mt-3" href="../login.html">Faça login</a>
</body>
</html>