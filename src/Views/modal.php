
	<!-- modal de configuração -->
	<section>

      <!-- Modal Structure configuração -->
      <div id="modal-config" class="modal">
		   <div class="modal-content">
				<h4>Modal de configurações</h4>
				<div class="col s12">
					<p><strong>Nome:</strong> <?= ucwords($_SESSION['usuario']);?></p>
					<p><strong>Usuario:</strong> <?= strstr($_SESSION['email'], '@', true);?></p>
					<p><strong>Email:</strong> <?= $_SESSION['email'];?></p>
					<p><strong>Status de Login:</strong> <?= (new DateTime('America/Sao_Paulo'))->format('d/m/Y H:i:s');?></p>
				</div>

				<div class="row">	
					<div class="col s12" style="display: flex; justify-content: start; align-items: start;">
						<a href="tema.php?id=<?= base64_encode($_SESSION['idUser']);?>&tema=<?= $_SESSION['temaUser'];?>" 
						   class="waves-effect waves-light btn orange" 
						   style="margin-right: 10px;display: flex; align-items: center;width: 160px;gap: 12px;">
							<i class="material-icons"><?= $_SESSION['temaUser'] == false ? 'brightness_3' : 'brightness_5';?></i> Mudar TEma
						</a>
						<a href="login/sair.php" 
						   onclick='return confirm("Deseja realmente sair?")' 
						   class="waves-effect waves-light btn red" 
						   style="margin-right: 10px;display: flex; align-items: center;width: 100px;gap: 12px;"
						   title="Sair"> 
							<i class="material-icons">exit_to_app</i>Sair
						</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green btn blue" >Voltar</a>
		  </div>
      </div>

    </section>

    <section>

      <!-- Modal Structure adicionar item -->
      <div id="modal-add" class="modal">
        <div class="modal-content">
          <h4>Adicionar novo item</h4>
             <form action='adicionar.php' method="post" class="col s12">	
			  <label><span>Tipo de transferencia:</span></label><br>
			 	<div class="row">	
					<label>
					  <input class="with-gap" name="tipo" type="radio" value="Entrada" checked />
					  <span>Entrada</span>
					</label>
					<label>
					  <input class="with-gap" name="tipo" type="radio" value="Saida"/>
					  <span>Saida</span>
					</label>
					<label>
					  <input class="with-gap" name="tipo" type="radio" value="Agendado"/>
					  <span>Agendado</span>
					</label>
			   </div>
			  <div class="row">
				<div class="input-field col s12">
				  <input placeholder="Name do item adicionado" id="item_name" type="text" class="validate" name="nome" required> 
				  <label for="item_name">Name do item: </label>
				  </div>
			  </div>
			  <div class="row">
				<div class="input-field col s12">
				  <input placeholder="Preço do item adicionado" id="item_preco" type="number" class="validate" name="preco" step="0.010" required>
				  <label for="item_preco">Preço do item: </label>
				  </div>
			  </div>
			  <div class="row">
				<div class="input-field col s12">
				  <input placeholder="Descrição do item adicionado" id="item_desc" type="text" class="validate" name="desc" required>
				  <label for="item_desc">Descrição do item: </label>
				  </div>
			  </div>
			  	<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
					<input class="blue waves-light btn"type="submit" value="Adicionar">
				</div>
			</form>
        </div>

      </div>
	</section>