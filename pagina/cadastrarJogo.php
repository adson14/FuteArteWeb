<?php
 include '../class/conexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../libs/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class='container'>
            <h1>Cadastrar Jogo</h1>
            <form  method="POST" action="" id="form-contato">                
                
                <div class="form-group">
                    <label for="turma">Turma</label>   
                    <select class="form-control" name="select_Turma" id="select_Turma">                  
                        <option></option>
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
                              
                <div class="form-group">
                    <label for="dia">Dia do jogo</label>
                    <input type="date" class="form-control" id="dia" name="dia" placeholder="Informe o Dia do Jogo">
                    <span class='msg-erro msg-dia'></span>
                </div>
                
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input type="time" class="form-control" id="hora" name="hora" placeholder="Informe a hora do jogo">
                    <span class='msg-erro msg-hora'></span>
                </div>
                
                             
                <br/>
                <br/>
                <input type="submit" class="btn btn-success" id="btnEnviarJogo" name="btnEnviarJogo" value="Enviar">               
                <input type="reset" class="btn btn-outline-secondary" name="btnResetar" value="Limpar">
            </form>
        </div>

        
        <?php
        require_once '../class/JogoClass.php';
        $objJogo = new JogoClass();

        if (isset($_POST['btnEnviarJogo'])) {
            $dia = $_POST['dia'];
            $hora = $_POST['hora'];
            $cod_Turma = $_POST['select_Turma'];
           
            
            $objJogo->setdia($dia);
            $objJogo->setHora($hora);
            $objJogo->setTURMA_cod_Turma($TURMA_cod_Turma);

            $objJogo->inserirJogo($objJogo);
        }
        ?>
    </body>
</html>
