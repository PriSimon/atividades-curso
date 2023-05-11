<?php 
require_once 'cabecalho.php'; 
require_once 'model/Usuario.php';

$estalog=estaLogado();
	if(!$estalog){ //se falso
	echo "<h2>Você não está logado, favor logar!</h2>";
	echo "<a href='//localhost/SistemaEscola/'>Voltar</a>";
}else{ //está logado: return true

?>
<div id="topo">
	<div id="logo">
		<img src="img/logo.png">
	</div>
	<div id="menu">
		<ul class="nav">
			<li>Cadastrar
				<ol>
					<li><a href="cadastrarCurso.php" target="quadro">Curso</a></li>
					<li><a href="cadastrarTurma.php" target="quadro">Turma</a></li>
					<li><a href="cadastrarAluno.php" target="quadro" onclick="gatinho()">Aluno</a></li>
			</ol>
			</li>
				
			<li>Listar
				<ol>
					<li><a href="listarCurso.php" target="quadro" onclick="gatinho()">Curso</a></li>
					<li><a href="listarTurma.php" target="quadro" onclick="gatinho()">Turma</a></li>
					<li><a href="listarAluno.php" target="quadro" onclick="gatinho()">Aluno</a></li>
				</ol>
			</li>
			<li>Buscar
				<ol>
				<li><a href="buscar.php" target="quadro">Dados</a></li>
				</ol>
			</li>
			<li>Sair
				<ol>
					<li><a href="sair.php" target="quadro">LogOff</a></li>
				</ol>
			</li>
		</ul>
	</div>
		</li>
	</ul>
	</div>
	</div>
<div id="principal">
	<iframe src="home.php" name="quadro" onload="escondegato()"></iframe>
<span id="mensagem"></span>
	<img id="gatinho">
</div>
<div id="rodape">
	<div id="endereco">
		<p>Rua X de Y, 1228</p>
		<p>CEP 84053-444</p>
		<p>Tel: (42) 3232-3434</p>
		<p>Ponta Grossa - PR</p>
</br>
	</div>
	<div id="sobre">
		<p>Página criada no curso de Programador de Sistemas&reg;</p>
	</div>
</div>

<?php 
} //fechou a parte do login caso ele consiga logar a página toda vai aparecer.
?>
<script src="js/mensagem2.js"></script>
</body>
</html>


