<?php 
	include('conexao.php');
	// array de dados da tarefa
	$arrItem = array();

	if(isset( $_GET['id'])){
		$idVerificado = mysqli_real_escape_string($conexao, trim($_GET['id']));
		// mostra os dados na pagina atualizar os dados pelo id
		$resultado = showDados($idVerificado ,$conexao);
		while ($linha = mysqli_fetch_assoc($resultado)) {	
			array_push($arrItem, $linha['tipo'], $linha['nome'],$linha['preco'],$linha['disc']);
		}		
	}else if(isset($_GET['view'])){
		$idViewVerificado = mysqli_real_escape_string($conexao, trim($_GET['view']));
		// mostra os dados para visualizar os dados pelo id
		$resultado = showDados($idViewVerificado ,$conexao);
		while ($linha = mysqli_fetch_assoc($resultado)) { 
			array_push($arrItem, $linha['tipo'], $linha['nome'],$linha['preco'],$linha['disc']);
		}  
	}

	// função que mostra dados na tela pelo id para ver ou para atualizar os dados
	function showDados(int $id ,object $conexao):mixed{
		$buscarDados = new SelectId( $id );
		$query = $buscarDados -> selectDadosId();
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}

?>