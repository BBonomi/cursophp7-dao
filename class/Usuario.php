<?php
// Classe Usuario
class Usuario {
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro; // data do cadastro
	public function getIdusuario() {
		return $this->idusuario;
	}
	public function setIdusuario($value) {
		$this->idusuario = $value;
	}
	public function getDeslogin() {
		return $this->deslogin;
	}
	public function setDeslogin($value) {
		$this->deslogin = $value;
	}
	public function getDessenha() {
		return $this->dessenha;
	}
	public function setDessenha($value) {
		$this->dessenha = $value;
	}
	public function getDtcadastro() {
		return $this->dtcadastro;
	}
	public function setDtcadastro($value) {
		$this->dtcadastro = $value;
	}

	// Metodo Select
	public function loadById($id) {
		$sql = new Sql ();
		$results = $sql->select ( "SELECT * FROM tb_usuarios WHERE idusuario = :ID", array (
				":ID" => $id
		) );
		// if(isset($results[0])) //verifica se existe(isset) no results no indice 0
		if (count ( $results ) > 0) {
			$this->setData ( $results [0] );
		}
	}

	// Metodo List Aula 65
	public static function getList() {
		$sql = new Sql ();
		return $sql->select ( "SELECT * FROM tb_usuarios ORDER BY deslogin;" );
	}
	public static function search($login) {
		$sql = new Sql ();
		return $sql->select ( "SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array (
				':SEARCH' => "%" . $login . "%"
		) );
	}
	public function login($login, $password) {
		$sql = new Sql ();
		$results = $sql->select ( "SELECT * FROM tb_usuarios WHERE deslogin = : LOGIN AND dessenha = :PASSWORD", array (
				':LOGIN' => $login,
				':PASSWORD' => $password
		) );
		// if(isset($results[0])) //verifica se existe(isset) no results no indice 0
		if (count ( $results ) > 0) {
			$this->setData ( $results [0] );
		} else {
			throw new Exception ( "Login e/ou senha inválidos." );
		}
	}

	// Metodo Dados
	public function setData($data) {
		$this->setIdusuario ( $data ['idusuario'] );
		$this->setDeslogin ( $data ['deslogin'] );
		$this->setDessenha ( $data ['dessenha'] );
		$this->setDtcadastro ( new DateTime ( $data ['dtcadastro'] ) ); // new DateTime coloca no padrão data e hora
	}
	// Metodo Inserir
	public function insert() {
		$sql = new Sql ();
		$results = $sql->select ( "CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array (
				':LOGIN' => $this->getDeslogin (),
				':PASSWORD' => $this->getDessenha ()
		) );
		if (count ( $results ) > 0) {
			$this->setData ( $results [0] );
		}
	}
	// METODO UPDATE
	public function update($login, $password) {
		$this->setDeslogin ( $login );
		$this->setDessenha ( $password );
		$sql = new Sql ();
		$sql->query ( "UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array (
				':LOGIN' => $this->getDeslogin (),
				':PASSWORD' => $this->getDessenha (),
				':ID' => $this->getIdusuario ()
		) );
	}
	// Metodo Constutor Login e Password
	public function __construct($login = "", $password = "") { // = " " para não afetar os outros registros, não obrigatorio
		$this->setDeslogin ( $login );
		$this->setDessenha ( $password );
	}
	public function __toString() {
		return json_encode ( array (
				"idusuario" => $this->getIdusuario (),
				"deslogin" => $this->getDeslogin (),
				"dessenha" => $this->getDessenha (),
				"dtcadastro" => $this->getDtcadastro ()
		) );
	}
}