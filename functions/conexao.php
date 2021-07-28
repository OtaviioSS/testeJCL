<?php
define('SERVER', 'localhost');
define('DBNAME', 'testejcl');
define('USER', 'root');
define('PASSWORD', '');

// Configura uma conexão com o banco de dados
try {
    $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conexao = new PDO("mysql:host=" . SERVER . "; dbname=" . DBNAME, USER, PASSWORD, $opcoes);

} catch (Exception $e) {
    echo "houve um problema ao conectar ao banco de dados";
}