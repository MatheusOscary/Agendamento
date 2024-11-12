<?php
require_once __DIR__ . '/../DAL/ClienteDal.php';
require_once __DIR__ . '/../Cliente.php';

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
