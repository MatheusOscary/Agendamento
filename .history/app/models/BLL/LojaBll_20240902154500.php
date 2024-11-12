<?php
require_once '../DAL/LojaDal.php';  // Corrigido o caminho para refletir a estrutura correta
require_once '../models/Loja.php';  // Corrigido o caminho para refletir a estrutura correta

class LojaBll {

    private $lojaDal;

    public function __construct() {
        $this->lojaDal = new LojaDal();
    }

    public function select($id) {
        $lojas = $this->lojaDal->select($id);
        return $lojas;
    }
}
?>
