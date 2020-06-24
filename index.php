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

// Carregando um usuario usando login e senha (NÃO FUNCIONOU)
// $usuario = new Usuario ();
// $usuario->login ( "joao", "32165" );
// echo $usuario;

// Aula 66 Insert inserindo um usuario
// $aluno = new Usuario ( "aluno", "@lun0" );
// $aluno->insert ();
// echo $aluno;

// Aula 67 update atualizando dados usuario
/*
 * $usuario = new Usuario ();
 * $usuario->loadByID ( 8 );
 * $usuario->update ( "professor", "!@#$%^&" );
 * echo $usuario;
 */

// Deletando Usuario DELETE
$usuario = new Usuario ();
$usuario->loadById ( 7 );
$usuario->delete ();

echo $usuario;

?>