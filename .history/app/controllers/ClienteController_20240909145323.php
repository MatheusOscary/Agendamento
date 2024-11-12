<?php
require_once '../models/BLL/ClienteBll.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $_POST["Nome"];
}

?>