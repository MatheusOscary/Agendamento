<?php
require_once __DIR__ .'/../Conexao.php';
require_once __DIR__ .'/../Usuario.php';
require_once __DIR__ .'/../../helpers/ip.php';
        
class UsuarioDal {

    private $conn;


    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }
    public function insert_session($Cod_usuario, $Cod_loja){
        $sql = "INSERT INTO Sessao (Cod_usuario, Cod_loja, Data_acesso,IP) VALUES(". $Cod_usuario .", ". $Cod_loja .", NOW(), '". getIP() ."')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $this->conn->lastInsertId();
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

    
    public function login($usuario, $senha) {
        $senhaHash = hash('sha512', $senha, true);
    
        $sql = "SELECT Usuario.Cod_usuario, Usuario.Cod_loja FROM Usuario WHERE Usuario.Login = :usuario AND Usuario.Senha = :senha";
    
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senhaHash, PDO::PARAM_LOB); 
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
        if ($row) {
            echo getIP();
            return true;
        } else {
            return false;
        }
    }
}
?>
