<section class="container horizontal" style="margin:0 auto;">
      <!-- Modal Structure editar item -->
      <div class="container" >
        <div >
          <h4>Editar item </h4>
            <form action='update.php' method="post" class="col s12" class="container">  
          <label><span>Tipo de transferencia:</span></label><br>
          <div class="row"> 
            <label>
              <input class="with-gap" name="tipo" type="radio" value="Entrada" <?= $arrItem[0]??"Entrada" =="Entrada" ? "checked" : "required";?> />
              <span>Entrada</span>
            </label>
            <label>
              <input class="with-gap" name="tipo" type="radio" value="Saida"  <?= $arrItem[0]??"Entrada" =="Saida" ? "checked" : "required";?>  />
              <span>Saida</span>
            </label>
            <label>
              <input class="with-gap" name="tipo" type="radio" value="Agendado"  <?= $arrItem[0]??"Entrada" =="Agendado" ? "checked" : "required";?>  />
              <span>Agendado</span>
            </label>
           </div>
          <div class="row">
          <div class="input-field col s12">
            <input placeholder="Name do item adicionado" id="item_name" type="text" class="validate" name="nome" value="<?= $arrItem[1]??"";?>" required> 
            <label for="item_name">Name do item: </label>
            </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
            <input placeholder="Preço do item adicionado" id="item_preco" type="number" class="validate" name="preco" value="<?= $arrItem[2] ??"";?>" step="0.010" required>
            <label for="item_preco">Preço do item: </label>
            </div>
          </div>
           <div class="">
          <div class="input-field col s12">
            <input style="display:none" placeholder="ID do item adicionado" id="item_id" type="number" class="validate" name="id" value="<?= $_GET['id'] ?? "";?>" required>
            <label style="display:none" for="item_id">ID do item: </label>
            </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
            <input placeholder="Descrição do item adicionado" id="item_desc" type="text" class="validate" name="desc" value="<?= $arrItem[3] ?? "";?>" required>
            <label for="item_desc">Descrição do item: </label>
            </div>
          </div>
            <div class="modal-footer">
            <a class=" waves-effect waves-green btn-flat green" onClick='bntVoltar()'>Voltar</a>
            <input class="blue waves-light btn"type="submit" value="Atualizar"> 
          </div>
      </form> 
        </div>
      </div>
</section>