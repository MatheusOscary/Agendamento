<?php
require_once __DIR__ .'/../Conexao.php';
require_once __DIR__ .'/../Usuario.php';

class UsuarioDal {

    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    public function select($id) {
        $sql = "SELECT Usuario.Cod_Usuario, Usuario.Nome, Usuario.Telefone, Loja.Nome AS Loja, Grupo.Nome AS Grupo, Usuario.Imagem FROM Usuario INNER JOIN Loja ON Usuario.Cod_loja = Loja.Cod_loja INNER JOIN Grupo ON Usuario.Cod_grupo = Grupo.Cod_grupo WHERE Cod_Usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $Usuario = new Usuario($row['Cod_Usuario'], $row['Nome'], $row['Telefone'], $row['Loja'], $row['Grupo'], base64_encode($row['Imagem']));
        }
        return $Usuario;
    }

    public function login($usuario, $senha){
        $sql = "SELECT Usuario.Cod_usuario, Usuario.Cod_loja FROM Usuario WHERE Usuario.Nome = '". $usuario ."' AND Usuario.Senha = '". hash('sha512', $senha) ."' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            echo $row['Cod_usuario'];
        }
    }
}
?>
