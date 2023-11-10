<?php
require_once '../Classes/Mensagem.php';

if (isset($_GET['id_mensagem'])) {
    $id_mensagem = $_GET['id_mensagem'];
    $mensagem = new Mensagem($id_mensagem);
    $mensagem->excluir();
    header('Location: adm-index.php');
} else {
    echo "O parâmetro 'id_mensagem' não foi fornecido no formulário POST.";
}