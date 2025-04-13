<?php
  // Incluir arquivos
  include('conexao.php');
  include_once('../src/model/classBuscar.php'); 
  // sessao de usuario 
  session_start();
  
  if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
  } 

  include('../src/model/classSelect.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Balance - Buscar Dados</title>
  <link rel="stylesheet" href="./assets/styles.css">
</head>
<body style="background-color: <?= $_SESSION['temaUser'] == false ? '#e8eaf6' : '#303131'; ?>">

  <!-- HEADER -->
  <?php include('../src/views/header.php'); ?>
  <!-- HEADER -->

  <!-- view da aplicação-->
  <?php include('../src/views/view.php'); ?>
  <!-- view da aplicação-->

  <!-- modal da aplicação-->
  <?php include('../src/views/modal.php'); ?>
  <!-- modal da aplicação-->

  <!-- Formulario buscar dados -->
  <main>
  <section class="container">
      <div style="max-width: 600px; margin: 0.1rem auto; padding: 2rem;" id="buscar">
      <h4 class="center-align" style="margin-bottom: 1.5rem; color: #000;">Buscar Item</h4>
      <div class="col s12">
        <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>"> 
        <div class="row">
          <div class="input-field col s12">
          <input placeholder="Digite o nome do item" id="busca" type="text" class="validate" name="busca" required style="border-bottom: 2px solid #2196f3;">
          <label for="busca" style="color: #666;">Busca por nome:</label>
          </div>
        </div>
        <div class="row center-align" style="margin-top: 1.5rem;">
          <a class="waves-effect waves-light btn red lighten-1" onclick="bntVoltar();" style="margin-right: 1rem;">
          <i class="material-icons left">arrow_back</i>Voltar
          </a>
          <button type="submit" class="waves-effect waves-light btn blue">
          <i class="material-icons left">search</i>Buscar
          </button>
        </div>
        </form> 
      </div> 
      </div>
    </section>
    <!-- Formulario buscar dados -->

    <!-- Formulario exibe dados-->
    <section class="container">
      <table class='striped centered responsive-table'>
        <thead>
          <tr>
            <th>Status</th>
            <th>Item Nome</th>
            <th>Item Preço</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Operação</th>
          </tr>
        </thead>

        <tbody>
        <?php 
          $busca = $_POST["busca"] ?? " ";
          $buscaVerificada = mysqli_real_escape_string($conexao, trim($busca)); 
          $buscarDados = new Buscar($buscaVerificada);
          $query = $buscarDados->buscarPorDadosDesc();
          $resultadoBusca = mysqli_query($conexao, $query);
          $row = mysqli_num_rows($resultadoBusca);

          if ($row === 0) {
        ?>
            <tr><td colspan="6">Nenhum lançamento encontrado no sistema!</td></tr>
        <?php 
          } else {
            while ($linha = mysqli_fetch_assoc($resultadoBusca)) {
        ?>
            <tr>
              <td>
                <?php
                  if ($linha['tipo'] == 'Saida') {
                    echo "<div class='code-status'><span class='saida code-tipe'></span>" . $linha['tipo'] . "</div>";
                  } elseif ($linha['tipo'] == 'Entrada') {
                    echo "<div class='code-status'><span class='entrada code-tipe'></span>" . $linha['tipo'] . "</div>";
                  } elseif ($linha['tipo'] == 'Agendado') {
                    echo "<div class='code-status'><span class='agendado code-tipe'></span>" . $linha['tipo'] . "</div>";
                  }
                ?>
              </td>
              <td><?= substr($linha['nome'], 0, 20) . "..." ?></td>
              <td>R$ <?= number_format($linha['preco'], 2, ',', ' ') ?></td>
              <td><?= substr($linha['disc'], 0, 20) . "..." ?></td>
              <td><?= $linha['data'] ?></td>
              <td>
                <a href="#modal<?= $linha['id'] ?>" class="waves-effect waves-light btn red lighten-1 modal-trigger">
                  <i class="material-icons">delete</i>
                </a>
                <a href="./atualizar.php?id=<?= $linha['id'] ?>" class="btn blue waves-effect waves-light">
                  <i class="material-icons">edit</i>
                </a>
                <a href="?view=<?= $linha['id'] ?>" class="btn green waves-effect lighten-1">
                  <i class="material-icons">visibility</i>
                </a>
              </td>
            </tr>

            <!-- Modal de exclusão -->
            <div id="modal<?= $linha['id'] ?>" class="modal">
              <div class="modal-content">
                <h4>Excluir item: <?= $linha['nome'] ?></h4>
                <p>Tem certeza que quer excluir?</p>
              </div>
              <div class="modal-footer">
                <a href="./delete.php?id=<?= $linha['id'] ?>" class="modal-close waves-effect red btn-flat">Aceitar</a>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </div>
            </div>
        <?php 
            }
          }
        ?>
        </tbody>
      </table>
    </section> 
  </main>

 <!-- Modal Add Trigger nova entrada tbn-->
 <a href="#modal-add" class="btn-floating  btn-large waves-effect waves-light blue  modal-trigger waves-effect "><i class="material-icons">add</i></a>
 <!-- Modal Add Trigger nova entrada btn-->
  
  <!-- Formulario exibe dados-->
  <!-- modal da aplicação-->
  <?php include('../src/views/modal.php'); ?>
  <!-- modal da aplicação-->

  <!-- footer -->
  <?php include('../src/views/footer.php'); ?>
  <!-- footer -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  <?php include("./assets/modal.php"); ?>
  <?php include("./assets/btnVoltar.php"); ?>

</body>

</html>
