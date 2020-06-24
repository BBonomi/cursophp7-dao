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

$root = new Usuario (); // chamando classe Usuario
$root->loadById ( 3 ); // chamando o metodo loadByID usuario 3 do banco de dados
echo $root;

?>