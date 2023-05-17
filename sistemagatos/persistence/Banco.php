<?php

class Banco
{

	private $banco;
	private $url;
	private $usuario;
	private $senha;
	private $conexao;

	function __construct()
	{
		$this->banco="sistemagatos";
		$this->url="localhost"; //127.0.0.1
		$this->usuario="root";
		$this->senha="";
		$this->conexao=new mysqli($this->url,$this->usuario,$this->senha,$this->banco);
	}

	function executar($sql){
		echo var_dump($this->conexao->query($sql));
		$resp=$this->conexao->query($sql);
		if (!$resp) {
			return false;
		}else{
			return true;
		}

	}
	function consultar($sql){ //atentar com essa função
		$consulta=$this->conexao->query($sql);
	$num_linhas=$consulta->num_rows;
		if ($num_linhas>0) {
			return $consulta;
		}else{
			return false;
		}
	}


}
?>