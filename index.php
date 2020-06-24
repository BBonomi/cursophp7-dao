<?php
require_once ("config.php");
/*
 * Aula 63
 * $sql = new Sql ();
 *
 * $usuarios = $sql->select ( "SELECT * FROM tb_usuarios" );
 *
 * echo json_encode ( $usuarios );
 */

// Aula 64 PDO - DAO - SELECT

/*
 * Carrega um usuario
 * $root = new Usuario (); // chamando classe Usuario
 * $root->loadById ( 3 ); // chamando o metodo loadByID usuario 3 do banco de dados
 * echo $root;
 */

// Carrega uma lista de usuarios aula 65
// $lista = Usuario::getList ();
// echo json_encode ( $lista );

// Carrega uma lista de usuarios buscando pelo login aula 65
// $search = Usuario::search ( "jo" );
// echo json_encode ( $search );

// Carregando um usuario usando login e senha
$usuario = new Usuario ();
$usuario->login ( "joao", "32165" );
echo $usuario;

?>