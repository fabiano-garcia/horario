<?php
	// Conexão com o banco de dados
	require 'conexao_exe.php';

	// Pegando dados via POST
	$turma = $_POST['cod_turma'];
	$disciplina = $_POST['cod_disciplina'];

	$selecionar = "SELECT cod_turma FROM turma WHERE nome = '$turma'";
	$resultado = mysqli_query($conexao, $selecionar);
	$array = mysqli_fetch_array($resultado);
	$cod_turma = $array['cod_turma'];

	$selecionar = "SELECT cod_disciplina FROM disciplina WHERE nome = '$disciplina'";
	$resultado = mysqli_query($conexao, $selecionar);
	$array = mysqli_fetch_array($resultado);
	$cod_disciplina = $array['cod_disciplina'];
	var_dump($cod_turma);
	var_dump($cod_disciplina);

	// Inserindo dados na tabela
	$inserir_disciplina_turma = "INSERT INTO disciplina_por_turma (cod_turma, cod_disciplina) VALUES ('$cod_turma', '$cod_disciplina')";

	// Sucesso no cadastro
	if (mysqli_query($conexao, $inserir_disciplina_turma)) {
		echo '<script type="text/javascript">
			window.location.href="../admin/index.php?tela=disciplina_turma";
			</script>';
	} else { // Falha no cadastro
		echo '<script type="text/javascript">
			alert("Falha no cadastro. Verifique os dados inseridos.");
			/*window.location.href="../index.php";*/
			</script>';
	}
?>
