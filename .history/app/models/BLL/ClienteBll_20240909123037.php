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
}
?>
