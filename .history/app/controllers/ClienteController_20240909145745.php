<?php
require_once '../models/BLL/ClienteBll.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = new ClienteBll();
    echo $_POST["Nome"];
}

?>