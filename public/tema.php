<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Balance</title>
    <meta charset="utf-8">
  </head>
  <body>
  <?php 
		// sessao de usuario
		session_start();
		include('conexao.php');
		include_once('../src/model/classTemaUser.php');

		// Obter valores de id e tema no array
		$dados = [
			'id' => isset($_GET['id']) ? mysqli_real_escape_string($conexao, trim($_GET['id'])) : null,
			'tema' => isset($_GET['tema']) ? mysqli_real_escape_string($conexao, trim($_GET['tema'])) : null
		];

		if (!is_null($dados['id']) && !is_null($dados['tema'])) {
			$novoTema = ($dados['tema'] == 0) ? 1 : 0; // Alternar tema
			$_SESSION['temaUser'] = $novoTema;

			$temaUser = new TemaUser(base64_decode($dados['id']), $novoTema);
			$query = $temaUser->mudarTemaUser();
			$resultado = mysqli_query($conexao, $query);

			$_SESSION['mensagem'] = ($novoTema == 1) ? "Novo tema escuro!" : "Novo tema claro!";
		}

		header('Location: home.php');
   ?>
  </body>
  
</html>