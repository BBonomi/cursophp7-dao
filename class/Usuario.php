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
	public function setDesenha($value) {
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
			$row = $results [0];

			$this->setIdusuario ( $row ['idusuario'] );
			$this->setDeslogin ( $row ['deslogin'] );
			$this->setDesenha ( $row ['dessenha'] );
			$this->setDtcadastro ( new DateTime ( $row ['dtcadastro'] ) ); // new DateTime coloca no padrão data e hora
		}
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