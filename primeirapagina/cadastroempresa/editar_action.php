<?php

require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if ($id && $name && $email && $telefone) {
    
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);
    $usuario->setTelefone($telefone);

    $usuarioDao->update( $usuario );

    header("Location: index2.php");
    exit;
    
    
} else {
    header("Location: editar.php?id=".$id);
    exit;
}