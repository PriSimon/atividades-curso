<?php
require_once './persistence/Banco.php'; //para 'puxar' a classe Banco e conectar o banco de dados

function cadastrarCurso($cod_cur,$nome_cur,$periodos_cur,$mensalidade_cur,$turno_cur){ //parametros que devem aparecer, todo no caso estão no banco de dados, o nome das colunas das tabelas
	$banco=new Banco();
	$sql="insert into curso values($cod_cur,'$nome_cur',$periodos_cur,$mensalidade_cur,'$turno_cur')";
	$resp=$banco->executar($sql);
	if($resp){
		return true;
	}else{
		return false;
	}
}

function retornaUltimoCodigo(){ //vai ajudar a ver o código do curso, pois não tem como saber ele
	$banco=new Banco();
	$sql="select max(cod_cur) from curso";
	$consulta=$banco->consultar($sql);
	if (!$consulta) { //false ou falso
		return false;
	}else{
		while($linha=$consulta->fetch_assoc()){ //para que a consulta saia em partes e não enorme
			$ultimo=$linha['max(cod_cur)'];
		}
		return $ultimo;
	}
}

function listarCurso(){
		$banco=new Banco();
		$sql="select * from curso order by cod_cur"; //aqui liga o Banco de Dados com o cadastro
		$consulta=$banco->consultar($sql);
		if (!$consulta) {//resposta false
			return false;
		}else{
			return $consulta;
		}
	}

function cursoParaCod($nome){ //para mostrar o nome ou o código do curso quando solicitar
		$banco=new Banco();
		$sql="select cod_cur from curso where nome_cur='$nome'";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				$codigo=$linha['cod_cur'];
			}
		}return $codigo;
	}


function codigoParaNome($codigo){
		$banco=new Banco();
		$sql="select nome_cur from curso where cod_cur=$codigo";
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				$nome=$linha['nome_cur'];
			}
		}return $nome;
	}

function listarNomeCurso(){ //para otimizar a listagem, buscando apenas o nome dele para que seja mais rápido
		$banco=new Banco();
		$sql="select nome_cur from curso"; //aqui liga o Banco de Dados com o cadastro
		$consulta=$banco->consultar($sql);
		if (!$consulta) {//resposta false
			return false;
		}else{
			return $consulta;
		}
	}
 	
 function buscarCurso($busca){
 		$banco=new Banco(); //criar baseado nas possibilidades de busca
 		$sql="select * from curso where cod_cur='$busca' or nome_cur like '%$busca%' or mensalidade_cur='$busca' or periodos_cur='$busca' or turno_cur like 
 		'%$busca%'";
 		$consulta=$banco->consultar($sql);
 		if (!$consulta) {
 			return false;
 		}else{
 			return $consulta;
 		}
 	}
?>