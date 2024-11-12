<?php
require_once './DAL/LojaDal.php';
require_once '../Loja.php';

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
