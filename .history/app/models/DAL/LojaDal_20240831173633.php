<?php

USE CONNECTION\Conexao;
USE MODEL\Loja;

namespace DAL;

class LojaDal{
    $sql = "SELECT * FROM Loja WHERE Cod_loja = 1";
    $con = Conexao::conectar();
    
}
?>