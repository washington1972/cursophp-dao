<?php

require_once "config.php";

 $sql = new Sql();

/* carrega apenas 1 usuário */
/* $usuarios = $sql->select("SELECT * FROM tb_usuarios");
$root = new Usuario();
echo json_encode($usuarios);

$root->loadById(3); */




//carrega uma lista de usuários
$lista = Usuario::getList();

echo json_encode($lista, JSON_PRETTY_PRINT);

//carrega uma lista de usuários pelo login

/* $search = Usuario::search("wa");

echo json_encode($search); */

//Carregar um usuário pelo login e senha

/* $user = new Usuario();

$user->login("waseso", "12345");

echo $user; */

/* $aluno = new Usuario();

$aluno->setLogin("medico");
$aluno->setSenha("@1234");

$aluno->insert();

echo $aluno; */

/* $usuarios = new Usuario();

$usuarios->loadById(3);

$usuarios->update("fernando", "!#test");

echo $usuarios; */

