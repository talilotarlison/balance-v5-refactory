 <?php  include('../src/controller/updateController.php'); ?>
 <section class="container horizontal" style="margin:0 auto; ">
 <!-- Modal Structure editar item -->
    <div style="width: 60vw ; position: absolute;top: 50%;left: 50%; transform: translate(-50%, -50%); z-index:7;display: <?= @$_GET['view'] == null ? 'none':'block' ?>" class="card-panel white lighten-1" id="view-modal">
          <h4>Visualização do Item </h4>
      <div class="col s12" class="">  
          <label><span>Tipo de transferencia:</span></label><br>
         <div class="row"> 
            <label>
              <input class="with-gap" name="tipo" type="radio" value="Entrada" <?= ($arrItem[0] ?? "Agendado") =="Entrada" ? "checked" : "required";?> disabled/>
              <span>Entrada</span>
            </label>
            <label>
              <input class="with-gap" name="tipo" type="radio" value="Saida"  <?= ($arrItem[0] ?? "Agendado") =="Saida" ? "checked" : "required";?>  disabled/>
              <span>Saida</span>
            </label>
            <label>
              <input class="with-gap" name="tipo" type="radio" value="Agendado"  <?= ($arrItem[0] ?? "Agendado")=="Agendado" ? "checked" : "required";?> disabled />
              <span>Agendado</span>
            </label>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Name do item adicionado" id="item_name" type="text" class="validate" name="nome" value="<?= $arrItem[1] ?? " ";?>" required disabled> 
              <label for="item_name">Name do item: </label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Preço do item adicionado" id="item_preco" type="number" class="validate" name="preco" value="<?= $arrItem[2] ?? " ";?>" step="0.010"  required disabled>
              <label for="item_preco">Preço do item: </label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Descrição do item adicionado" id="item_desc" type="text" class="validate" name="desc" value="<?= $arrItem[3] ?? " ";?>"  required disabled>
              <label for="item_desc">Descrição do item: </label>
            </div>
          </div>
          <div class="modal-footer">
             <a href="./home.php" class="waves-effect waves-green btn-flat blue white-text" >Voltar</a>
          </div>
      </div> 
    </div>
  </section>