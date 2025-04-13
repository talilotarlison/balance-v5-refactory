<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Balance</title>
    <meta charset="utf-8">
  </head>
  <body>
	<?php 
		// Sessão de usuário
		session_start();

		include('conexao.php');
		include('../src/model/classDados.php'); 
		include('../src/model/precoNegativo.php');
		include('../src/model/getHoras.php');
		include('../src/controller/validateDados.php'); 

		#Update dados na tabela
		$data = [
			'id' => $_POST['id'],
			'tipo' => $_POST['tipo'],
			'nome' => $_POST['nome'],
			'preco' => $_POST['preco'],
			'descricao' => $_POST['desc'],
			'date' => Horas::getHoraData()
		];

		if (isset($data['id'], $data['tipo'], $data['nome'], $data['preco'], $data['descricao'])) {
			$validatedData = validateData($data, $conexao);
			$data['preco'] = ($data['tipo'] === 'Saida') ? Preco::retornaNegativo($validatedData['preco']) : abs($validatedData['preco']);
			
			$meusDados = new Update(
				$validatedData['id'],
				$validatedData['tipo'], 
				$validatedData['nome'], 
				$data['preco'], 
				$validatedData['descricao'], 
				$data['date']
			);
			
			$query = $meusDados->atualizarDados();
			$resultado = mysqli_query($conexao, $query);
			
			$_SESSION['mensagem'] = "Atualizado com sucesso!";
		} else {
			$_SESSION['mensagem'] = "Falha ao atualizar!";
		}

		header('Location: index.php');
	?>
  </body>
  
</html>