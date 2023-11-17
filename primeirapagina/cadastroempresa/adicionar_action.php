<?php

require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if ($name && $email && $telefone) {


    if($usuarioDao->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);
        $novoUsuario->setTelefone($telefone);

        $usuarioDao->add( $novoUsuario );

        header("Location: index2.php");
        exit;
    } else {
        header("Location: adicionar.php");
      exit;
    }
    
} else {
    header("Location: adicionar.php");
    exit;
}
