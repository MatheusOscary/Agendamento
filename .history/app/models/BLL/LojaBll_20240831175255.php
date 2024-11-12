<?php
require_once '../app/dal/LojaDal.php';
require_once '../app/models/Loja.php';

class LojaBll {

    private $lojaDal;

    public function __construct() {
        $this->lojaDal = new LojaDal();
    }

    public function select($id) {
        // Modifique o DAL para aceitar um ID como parâmetro
        $lojas = $this->lojaDal->select($id);
        return $lojas;
    }
}
?>
