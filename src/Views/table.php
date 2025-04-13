<section class="itens">
  <!--Table com os dados-->
  <table class="striped centered responsive-table">
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
      $buscarDadosTela = new SelectAll();
      $query = $buscarDadosTela->selectDadosDesc();
      $resultado = mysqli_query($conexao, $query);
      $row = mysqli_num_rows($resultado);

      if($row === 0) {
    ?>
        <tr><td colspan="6">Nenhum lançamento encontrado no sistema!</td></tr>
    <?php 
      } else {
        while ($linha = mysqli_fetch_assoc($resultado)) {
    ?>
        <tr>
          <td>
            <?php
              if ($linha['tipo'] == 'Saida') {
                echo "<div class='code-status'><span class='saida code-tipe'></span>" . $linha['tipo'] . "</div>";
              } else if ($linha['tipo'] == 'Entrada') {
                echo "<div class='code-status'><span class='entrada code-tipe'></span>" . $linha['tipo'] . "</div>";
              } else if ($linha['tipo'] == 'Agendado') {
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
