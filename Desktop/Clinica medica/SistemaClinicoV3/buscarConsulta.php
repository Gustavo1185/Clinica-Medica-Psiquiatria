<?php

require_once 'classe/s_clinico.php';
ob_start();
  require_once 'classe/validacao_login.php';
?>

<!DOCTYPE html>

  <html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="estilo/estilo.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Buscar Consulta</title>
    </head>

    <body>  
        <?php
            include "menu.php";
            include "modal.php";
            $mensagem="";
            $valida="";
        ?>
        <div class="col-md-9">
            <h3 class="mt-5 ml-2">Gerenciar Consulta</h3>
            <form action="" method="post" id="buscar"> 
                <div style="width: 97%;">
                    <div class="tabela mb-3">
                        <div class="form-row pt-3 ml-3">
                            <div class="form-group col-md-5">
                                <select name ="buscaF"class="form-control" id ="buscaE">
                                    <option value="">Procurar por:</option>
                                    <option>CPF</option>
                                    <option>Nome</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name ="valorF" class="form-control" id="formGroupExampleInput" placeholder="">                  
                            </div>
                            <div class="form-group col-md-1">
                              <button class="btn btn-link" type="submit" name="buscar">
                                <img class="icones" src="img/png/magnifying-glass.png" alt="">
                              </button>
                            </div>
                      </div>
                  </div>
            </form>
            <form action="" method="post">
                <div class="tabela rolagem">
                    <table class="table">
                        <thead class="table-active ">
                            <tr class="nQuebra">
                              <th scope="col">                      
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="checkTodos">
                                      <label class="form-check-label" for="defaultCheck1">
                                          
                                      </label>

                                  </div>
                              </th>
                              <th scope="col">ID da Consulta</th>
                              <th scope="col">Médico</th>
                              <th scope="col">CRM</th>
                              <th scope="col">Especialidade</th>
                              <th scope="col">Paciente</th>
                              <th scope="col">CPF do Paciente</th>
                              <th scope="col">Sexo do Paciente</th>
                              <th scope="col">Data de Nascimento do Paciente</th>
                              <th scope="col">Evolução/Observação</th>
                              <th scope="col">Medicamento</th>
                              <th scope="col">Prescrição</th>
                          </tr>
                        </thead>
                        <?php
                                $s_clinico = new s_clinico();
                                if(isset($_POST['buscar'])){
                                $buscaF = $_POST['buscaF'];
                                $valorF = $_POST['valorF'];
                                $result = $s_clinico->buscaConsulta($valorF,$buscaF);
                                if($result == null){
                                  $mensagem= "Não foi encontrado nenhum registro";
                                }
                                  foreach ($result as $res => $value) {
                                    ?>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                       
                                            <input class="form-check-input" name="check[]" type="checkbox" value="<?php echo $value->cpf;?>" id="checkTodos">
                                            <label class="form-check-label" for="defaultCheck1">
                                                
                                            </label>
                                          
                                        </div>
                                    </th>
                                    <td><?php echo $value->id;?></td>
                                    <td><?php echo $value->nome_med;?></td>
                                    <td><?php echo $value->CRM;?></td>
                                    <?php $valida= $value->id;?>
                                    <td><?php echo $value->especialidade;?></td>
                                    <td><?php echo $value->nome;?></td>
                                    <td><?php echo $value->cpf;?></td>
                                    <td><?php echo $value->sexo;?></td>
                                    <td><?php echo $value->data_nascimento;?></td>
                                    <td><?php echo $value->evolu_obs;?></td>
                                    <td><?php echo $value->medicamento;?></td>
                                    <td><?php echo $value->prescricao;?></td>
                                    
                                </tr>
                                </tbody>
                                <?php
                              }
                              ?>
                              <?php
                              }
                              
                              ?>

                              <?php
                                if(isset($_POST['delete'])) {
                                  $s_clinico = new s_clinico();
                                    foreach($_POST["check"] as $registro){ // Loop nas linhas via post / Pode selecionar post avontade                                     
                                      // SEU COMANDO SQL DE DELETE PEGANDO O VALOR DO VALUE DO CHECK BOX                                  
                                      $s_clinico->deleteConsulta($registro);
                                      //mysql_query("DELETE FROM exemplo WHERE id = $registro ");
                                    } // fecha foreach
                                  } // fecha if(isset($_POST['check'])) 
                                  # FECHA AÇÃO #
                                  //cabecalho da tabela
                                ?>
                                <?php
                                    if(isset($_POST['editar'])) {                         
                                        $elementos = $_POST['check'];

                                        header('location: editarConsulta.php?cpf=' . $elementos[0]);
                                    
                                        foreach($elementos as $e) {
                                            echo $e . "<br />";
                                      }
                                    }
                               ?>       
                        </table> 
                    </div>
                    <div class="row justify-content-end" id="autoUpdate">          
                          <?php
                            if($valida!=""){
                          ?> 
                          <div class="form-group col-md-3 mt-5 ">
                              <button type="button" class="btn btn-deletar btn-primary botao2 estiloFonte">Excluir</button>
                              <button type="submit"  name="delete" class="btn d-none">Excluir</button>
                          </div>
                          <div class="form-group col-md-3 mt-5 ">
                              <button id="add" type="submit" name="editar" class="btn btn-primary botao1 estiloFonte">Editar</button>
                          </div> 
                          <?php
                             }
                          ?> 
                      </div>
                      <div class="row justify-content-end ">
                          <div class="text-danger text-end mr-5 mt-4" id="msg" role="alert"><?php echo $mensagem ?></div>
                      </div>  
        </form>


      <script type="text/javascript" src="js/jquery-3.4.1.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js" ></script>
      <script type="text/javascript" src="js/jquery.validate.min.js" ></script>
      <script type="text/javascript" src="js/jquery.mask.min.js" ></script>
      <script type="text/javascript" src="js/additional-methods.min.js" ></script>
      <script type="text/javascript" src="js/localization/messages_pt_BR.js" ></script>
      <script type="text/javascript" src="validacaoJQ/validacao.js" ></script>
      <script type="text/javascript" src="validacaoJQ/mascara.js" ></script>
    </body>
  </html>