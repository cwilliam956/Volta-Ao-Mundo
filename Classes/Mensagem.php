<?php

class Mensagem{

        public $id_mensagem;
        public $nome;
        public $mensagem;

        public function __construct($id_mensagem = false)
        {
            if($id_mensagem){
                $this->id_mensagem = $id_mensagem;
                $this->carregar();
            }
        }

    public function listar(){

        $sql = "SELECT * FROM tb_mensagems";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=login', 'root', '');
      
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
        
    }

    public function carregar(){

        $sql = "SELECT * FROM tb_mensagems WHERE id_mensagem=" . $this->id_mensagem;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=login', 'root', '');

    // Execução da query e armazenamento do resultado em uma variável
    $resultado = $conexao->query($sql);
    // Recuperação da primeira linha do resultado como um array associativo
    $linha = $resultado->fetch();



        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
        $this->mensagem = $linha['mensagem'];
    }    

    public function excluir()
	{
        $sql = "DELETE FROM tb_mensagems WHERE id_mensagem=".$this->id_mensagem;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=login','root','');
        $conexao->exec($sql);
	}

    public function atualizar() {
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=login', 'root', '');

        $sql = "UPDATE tb_mensagems SET nome = :nome, mensagem = :mensagem WHERE id_mensagem = :id_mensagem";

        $stmt = $conexao->prepare($sql);

        // Vincule os parâmetros da consulta aos valores das propriedades do objeto
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':mensagem', $this->mensagem);
        $stmt->bindParam(':id_mensagem', $this->id_mensagem);

        try {
            $stmt->execute();
            return true; // Sucesso na atualização
        } catch (PDOException $e) {
            // Trate qualquer erro que possa ocorrer durante a atualização
            return false; // Falha na atualização
        }
    }
}

