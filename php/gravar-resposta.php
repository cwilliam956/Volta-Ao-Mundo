<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecte-se ao seu banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    // Crie uma conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Recupere e limpe os dados do formulário
    $resposta = filter_input(INPUT_POST, 'resposta', FILTER_SANITIZE_STRING);
    $id_mensagem = $_POST['id_mensagem']; // Recupere o ID da mensagem

    // Consulta SQL para atualizar os dados na tabela usando declaração preparada
    $sql = "UPDATE tb_respostas SET resposta = ? WHERE id_mensagem = ?";

    // Preparar a declaração SQL
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Vincular os parâmetros e executar a consulta
    $stmt->bind_param("si", $resposta, $id_mensagem);

    if ($stmt->execute() === true) {
        echo "Resposta atualizada com sucesso.";
    } else {
        echo "Erro ao atualizar a resposta: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
    
    // Fechar a conexão
    $conn->close();
}
?>

