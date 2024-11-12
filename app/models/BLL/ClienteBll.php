<?php
require_once __DIR__ . '/../DAL/ClienteDal.php';
require_once __DIR__ . '/../Cliente.php';

class ClienteBll {

    private $ClienteDal;

    public function __construct() {
        $this->ClienteDal = new ClienteDal();
    }

    public function insert(Cliente $cliente) {
        $this->ClienteDal->insert($cliente);
    }
    public function select(Cliente $cliente) {
        return $this->ClienteDal->select($cliente);
    }
    public function select_json(Cliente $cliente) {
        return $this->ClienteDal->select_json($cliente);
    }
    public function select_by_code($cod_cliente){
        return $this->ClienteDal->select_by_code($cod_cliente);
    }
}
?>
