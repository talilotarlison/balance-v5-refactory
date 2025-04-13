<?php 
  # sessao do usuario
  session_start();
  
  if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
  } 


  #Conexão com o banco de dados
  include_once('conexao.php');
  include('../src/model/classSelect.php'); 
  // pega class select do banco
 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Balance - Home</title>
  <link rel="stylesheet" href="./assets/styles.css">
</head>

<body style="background-color:<?= $_SESSION['temaUser'] == false ? '#e8eaf6' : '#303131';?>">
	 <!-- Header da aplicação-->
  <?php include('../src/views/header.php'); ?>
   <!-- Header da aplicação-->

  <!-- Main da aplicação-->
  <main>

  	<!-- Dashboard da aplicação-->
		<?php include('../src/views/dashboard.php'); ?>
		<!-- Dashboard da aplicação-->
 
    <!-- view da aplicação-->
    <?php include('../src/views/view.php'); ?>
    <!-- view da aplicação-->
  
		<!-- modal da aplicação-->
		<?php include('../src/views/modal.php'); ?>
		<!-- modal da aplicação-->

      <!--Table com os dados-->
			<?php include('../src/views/table.php'); ?>
       <!--Table com os dados-->

  </main>
  <!-- Modal Add Trigger nova entrada tbn-->
  <a href="#modal-add" class="btn-floating  btn-large waves-effect waves-light blue  modal-trigger waves-effect "><i class="material-icons">add</i></a>
 <!-- Modal Add Trigger nova entrada btn-->
 
<!-- footer -->
  <?php include('../src/views/footer.php'); ?>
<!-- footer -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
  <?php include("./assets/modal.php"); ?>
  <?php include("./assets/btnVoltar.php"); ?>
  
  <?php  
      // mensagem do sistema para o usuario 
      if(isset($_SESSION['mensagem'])){
          include('./assets/mensagem.php');
          unset($_SESSION['mensagem']);
      }
  ?>
</body>

</html>