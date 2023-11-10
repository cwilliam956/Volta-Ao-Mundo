<?php
require_once('Mensagem.php'); // Certifique-se de incluir a classe Mensagem

// Verifique se o ID da mensagem a ser editada foi fornecido na URL
if (isset($_GET['id'])) {
    $id_mensagem = $_GET['id'];
    $mensagem = new Mensagem($id_mensagem);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifique se o formulário de edição foi enviado
        if (isset($_POST['nome'], $_POST['mensagem'])) {
            // Atualize as propriedades da mensagem com os novos valores
            $mensagem->nome = $_POST['nome'];
            $mensagem->mensagem = $_POST['mensagem'];

            // Tente atualizar a mensagem no banco de dados
            if ($mensagem->atualizar()) {
                echo "Mensagem atualizada com sucesso.";
            } else {
                echo "Erro ao atualizar a mensagem.";
            }
        }
    }
}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <title>Editar Mensagem</title>
</head>
<body>
    <section id="footer">
        <div class="inner">
            <h2><a name="faleconosco" class="major">Atualizar Mensagem</h2></a>
            <p></p>
            <form method="post" action="gravar-mensagem.php">
                <input type="hidden" name="id_mensagem" value="<?php echo $mensagem->id_mensagem; ?>">
                <div class="fields">
                    <div class="field">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" value="<?php echo $mensagem->nome; ?>" />
                    </div>
                    <div class="field">
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" id="mensagem" rows="4"><?php echo $mensagem->mensagem; ?></textarea>
                    </div>
                </div>
                <ul class="actions">
                    <input type="submit" value="Atualizar Mensagem">
                </ul>
            </form>
        </div>
    </section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
