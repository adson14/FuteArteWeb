<?php       
        include_once("../class/conexao.php");
        $result_alunos = "SELECT * FROM aluno";
	$resultado_alunos = mysqli_query($conn, $result_alunos);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fut Arte</title>
        <link href="libs/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../libs/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="./libs/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <div id="area">
        <div class="container theme-showcase" role="main">
            <div class="page-header">
                <h1>Funcionários Cadastrados</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome do Aluno</th>
                                <th>Idade</th>
                                <th>Rg</th>
                                <th>CPF</th>
                                <th>Endereço</th>
                                <th>Turma</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rows_alunos = mysqli_fetch_assoc($resultado_alunos)) { ?>
                                <tr> <!--Linhas da tabela-->
                                    <td><?php echo $rows_alunos['cod_Aluno']; ?></td>
                                    <td><?php echo $rows_alunos['nome']; ?></td>
                                    <td><?php echo $rows_alunos['idade']; ?></td>
                                    <td><?php echo $rows_alunos['rg']; ?></td>
                                    <td><?php echo $rows_alunos['cpf']; ?></td>
                                    <td><?php echo $rows_alunos['endereco']; ?></td>
                                    <td><?php echo $rows_alunos['TURMA_cod_Turma']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_alunos['cod_Aluno']; ?>">Visualizar</button>
                                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal"
                                                data-whatever="<?php echo $rows_alunos['cod_Aluno'];
                                        ?>" data-whatevernome="<?php echo $rows_alunos['nome'];
                                        ?>"data-whateveridade="<?php echo $rows_alunos['idade'];
                                        ?>"data-whateverrg="<?php echo $rows_alunos['rg']; 
                                        ?>"data-whatevercpf="<?php echo $rows_alunos['cpf']; 
                                        ?>"data-whateverendereco="<?php echo $rows_alunos['endereco']; 
                                        ?>"data-whateverturma="<?php echo $rows_Aluno['TURMA_cod_Turma'];
                                        ?>">Editar</button>
                                        <button type="button"  class="btn btn-xs btn-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $rows_alunos['cod_Aluno'];
                                        ?>" >Apagar</button>
                                    </td>
                                </tr>
                                
                                
                                <!-- Inicio ModalEditar -->
                            <div class="modal fade" id="myModal<?php echo $rows_alunos['cod_Aluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_alunos['nome']; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php echo $rows_alunos['cod_Aluno']; ?></p>
                                            <p><?php echo $rows_alunos['nome']; ?></p>
                                            <p><?php echo $rows_alunos['idade']; ?></p>
                                            <p><?php echo $rows_alunos['rg']; ?></p>
                                            <p><?php echo $rows_alunos['cpf']; ?></p>
                                            <p><?php echo $rows_alunos['endereco']; ?></p>
                                            <p><?php echo $rows_alunos['TURMA_cod_Turma']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal -->
							
							 <!-- Inicio ModalApagar -->
                            <div class="modal fade" id="myModal2<?php echo $rows_alunos['cod_Aluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="myModalLabel2"><?php echo $rows_alunos['nome']; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php echo $rows_alunos['cod_Aluno']; ?></p>
                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal -->
							
							
							
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>		
        </div>




        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">aluno</h4>
                    </div>
                    <div class="modal-body"> <!--dados que vão apreceer no modal-->
                        <form method="POST" id="cadform" name="cadform" onsubmit="return validaCampo();" action="http://localhost/FutArte/class/EditarAluno.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nome:</label>
                                <input name="nome" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-number" class="control-label">Idade:</label>
                                <input name="idade" type="text" class="form-control"id="recipient-idade">
                            </div>
                            <div class="form-group">
                                <label for="recipient-number" class="control-label">Rg:</label>
                                <input name="rg" type="text" class="form-control" id="recipient-rg">
                            </div>
                            <div class="form-group">
                                <label for="recipient-number" class="control-label">CPF:</label>
                                <input name="cpf" type="text" class="form-control" id="recipient-cpf"  >
                            </div>
                            <div class="form-group">
                                <label for="recipient-text" class="control-label">Endereço:</label>
                                <textarea name="endereco" class="form-control" id="recipient-endereco"></textarea>
                                
                            </div>
							
							  <div class="form-group">
                                <label for="idade">Turma</label>   
                                <select class="form-control" name="select_Turma" id="recipient-turma"  >                  
                                    
                                    <?php
                                    $result_Turma = "SELECT * FROM Turma";
                                    $resultado_Turma = mysqli_query($conn, $result_Turma);
                                    while ($row_Turma = mysqli_fetch_assoc($resultado_Turma)) {
                                        ?>
                                        <option value="<?php echo $row_Turma['cod_Turma']; ?>"> <?php echo $row_Turma['nome'] ?>                                   
                                        </option><?php
										
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <input name="cod_Aluno" type="hidden" class="form-control" id="cod_Aluno" value="">

                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Alterar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
		
		 <!-- Form Modal Apagar -->
		  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel2">aluno</h4>
                    </div>
                    <div class="modal-body"> <!--dados que vão apreceer no modal-->
                        <form method="POST" action="http://localhost/FutArte/class/DeletarAluno.php" enctype="multipart/form-data">
                           
						   <h4>Deseja Apagar?</h4>
						   
                            <input name="cod_Aluno2" type="hidden" class="form-control" id="cod_Aluno2" value="">

                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
		
		
	
		
		


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')
                var recipientidade = button.data('whateveridade')
				var recipientrg = button.data('whateverrg')
				var recipientcpf = button.data('whatevercpf')
				var recipientendereco = button.data('whateverendereco')
				var recipientturma = button.data('whateverturma')
			
				
				
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Código ' + recipient)
                modal.find('#id-aluno').val(recipient)
                modal.find('#recipient-name').val(recipientnome)
                modal.find('#recipient-idade').val(recipientidade)
				modal.find('#recipient-rg').val(recipientrg)
				modal.find('#recipient-cpf').val(recipientcpf)
				modal.find('#recipient-endereco').val(recipientendereco)
				modal.find('#recipient-turma').val(recipientturma)
				
				 modal.find('#cod_Aluno').val(recipient)
				  modal.find('#cod_Aluno2').val(recipient)

            })
        </script>
		
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $('#exampleModal2').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
               
				
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Código ' + recipient)
                modal.find('#id-aluno').val(recipient)
                modal.find('#cod_Aluno2').val(recipient)

            })
        </script>
		
		
		<script type="text/javascript">
function validaCampo()
{
if(document.cadform.select_Turma.value=="")
{
alert("A turma é Obrigatória");
return false;
}
else
return true;
}
<!-- Fim do JavaScript que validará os campos obrigatórios! -->
</script>
		
        </div>	
    </body>
</html>