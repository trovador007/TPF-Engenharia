<?php
		class Modal{ 

			//Função de Execução de Modal

			function cadastroModal($valor){
					echo '<!-- Modal -->
								      <div class="modal fade" id="ModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="TituloModalCentralizado">TPF Engenharia</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        '.$valor.'
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
										      </div>
										    </div>
										  </div>
										</div>
										<script>
												$(document).ready(function(){
													$("#ModalCentralizado").modal("show");
													});
										</script>
										';
									}

							
		function atualizarModal($valor){
					
					echo '<!-- Modal -->
								      <div class="modal fade" id="ModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="TituloModalCentralizado">TPF Engenharia</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" onclick="redirecionar()">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        '.$valor.'
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="redirecionar()">Fechar</button>
										      </div>
										    </div>
										  </div>
										</div>
										<script>
												$(document).ready(function(){
													$("#ModalCentralizado").modal("show");
   												});

   												function redirecionar(){
   													window.location.href = "http://localhost/form-lista-rota.php";
   												}
										</script>';
									}


					function atualizarPontoCritico($valor){
					
					echo '<!-- Modal -->
								      <div class="modal fade" id="ModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="TituloModalCentralizado">TPF Engenharia</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" onclick="redirecionar()">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        '.$valor.'
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="redirecionar()">Fechar</button>
										      </div>
										    </div>
										  </div>
										</div>
										<script>
												$(document).ready(function(){
													$("#ModalCentralizado").modal("show");
   												});

   												function redirecionar(){
   													window.location.href = "http://localhost/form-lista-ponto-critico.php";
   												}
										</script>';
									}

		function senhaIncorreta($valor){
					
					echo '<!-- Modal -->
								      <div class="modal fade" id="ModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="TituloModalCentralizado">TPF Engenharia</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" onclick="redirecionar()">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        '.$valor.'
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="redirecionar()">Fechar</button>
										      </div>
										    </div>
										  </div>
										</div>
										<script>
												$(document).ready(function(){
													$("#ModalCentralizado").modal("show");
   												});

   												function redirecionar(){
   													window.location.href = "http://localhost/index.php";
   												}
										</script>';
									}

	}
?>