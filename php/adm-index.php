<?php
    require_once "../Classes/Mensagem.php";
    $mensagem = new Mensagem();
    $lista = $mensagem->listar();
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/style-table.css" />
		<noscript><link rel="stylesheet" href="noscript.css" /></noscript>
	<head>
		<title>Area Adiministrativa</title>
		
	</head>
	<body>
	<section id="footer">
						<!-- Conteúdo da Área Administrativa -->
    <div class="container-fluid admin-content">
        <h2>Lista de perguntas </h2>
        <li class="nav-item">
            <a class="nav-link" href="../login.html">Sair</a>
            <a class="nav-link" href="../index.html">inicio</a>
        </li>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Mensagem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha):?>
                <tr>
                  
                    
                    <td><?php echo $linha['nome']?></td>
                    <td><?php echo $linha['email']?></td>
                    <td><?php echo $linha['mensagem']?></td>
                    <td class="act">
                        <br><a href="editar-.html">Editar</a>
                        <br><a href="mensagem-excluir.php?id_mensagem=<?= $linha['id_mensagem'] ?>">Excluir</a></br>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>
