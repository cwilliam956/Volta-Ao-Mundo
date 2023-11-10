 <?php

class Usuario {

    public $id;
    public $usuario;
    public $senha;


    public function __construct($id = false)
    {
        if($id){
            $this->id = $id;
            $this->carregar();
        }
    }

    public function Inserir(){

        $sql = "INSERT INTO usuarios (usuario,senha) VALUES ('{$this->usuario}', '{$this->senha}')";
        include_once "Classes/Conexao.php";
        $conexao->exec($sql);
        echo "Registro gravado com sucesso!";
    }

}
 ?>