
<?php
$usuario = $_POST["usuario"];
$senhaLimpa = $_POST["senha"];
$senha = hash("sha256", $senhaLimpa);


$sql = "SELECT * FROM usuarios WHERE
        usuario = :user and senha = :passwd";
        
/* SLQ modificado apra evitar logim com a ( 'or'a'='a ) garantindo mais segurança, tratando como parametros e não valores */

$conexao = new PDO('mysql:host=127.0.0.1;dbname=login', 'root', '');
$resultado = $conexao->prepare($sql);
$resultado ->bindParam(':user', $usuario);
$resultado ->bindParam(':passwd', $senha);
$resultado ->execute();



$linha = $resultado->fetch();
$usuario_logado = $linha['usuario'];

if ($usuario_logado == null) {
	// Usuário ou senha inválida
	header('Location: usuario-erro.php');
} 
else {
	session_start();
	$_SESSION['usuario_logado'] = $usuario_logado;
	header('Location: adm-index.php');
}
?>