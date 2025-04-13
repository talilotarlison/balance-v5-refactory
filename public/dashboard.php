<?php 
  # sessao usuario
  session_start();
  
  if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
  } 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Balance - Dashboard</title>
  <link rel="stylesheet" href="./assets/styles.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body style="background-color:<?= $_SESSION['temaUser'] == false ? '#e8eaf6' : '#303131';?>">
<?php 
  include_once('conexao.php');

  include('../src/model/classSelect.php'); 

?> 
	<!-- HEADER -->
  <?php include('../src/views/header.php'); ?>
 	 <!-- HEADER -->
  <!-- Dashboard da aplicação-->
   <main>
        <?php include('../src/views/dashboard.php'); ?>
          <!-- Dashboard da aplicação-->
     
        <section style="display: flex; flex-direction: row; justify-content: center; align-items: center; margin:20px;flex-wrap:nowrap">
                <!-- GRAFICO-->
            <div id="piechart" style="width: 35vw; height: 500px;"></div>
            <!-- GRAFICO-->
             
            <!-- calendario -->
            <div class='calendario' style="width: 30vw; height: 500px;">
                <?php include('./assets/calendario.php"'); ?>
            </div>
                <!-- calendario-->
        </section>
</main> 

 <!-- Modal Add Trigger nova entrada tbn-->
 <a href="#modal-add" class="btn-floating  btn-large waves-effect waves-light blue  modal-trigger waves-effect "><i class="material-icons">add</i></a>
 <!-- Modal Add Trigger nova entrada btn-->
  
   <!-- modal da aplicação-->
    <?php include('../src/views/modal.php'); ?>
    <!-- modal da aplicação-->
   
	<!-- footer -->
  <?php include('../src/views/footer.php'); ?>
  <!-- footer -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
  <?php include("./assets/modal.php");?>
   <?php include("./assets/btnVoltar.php"); ?>
  	<!-- grafico pizza -->
  <?php include('./assets/grafico.php"'); ?>
 	<!-- grafico pizza -->
</body>

</html>


	