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
      <title>Editar Médico</title>
    </head>

    <body>  
        <?php
            include "menu.php";
       
              //$e= $_POST['idEtapa'];
              
            $s_clinico = new s_clinico(); 
            $id_user = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            //var_dump($id_user);
            $result = $s_clinico->retornarClinico_consulta($id_user);

            foreach ($result as $res => $val){


              }

        ?>    
        <div class="col-md-9">
            <h3 class="mt-5 ml-2">Consulta</h3>
            <div class="formulario p-5">
                <form id="formCadastrar" action="" method="post">
                  <div class="form-row justify-content-end">
                      <div class="form-group col-md-2 ">
                          <label class="cInput pl-2">ID</label>
                          <label id="id" name="id"><?php echo $val->id;?></label>
                      </div>
                  </div>   
                    
                  <h5 class="mt-3 mb-3 corH">Médico</h5>
                      
                  <div class="form-row cDiv pt-1">
                      <div class="form-group col-md-4 ">
                          <label class="cInput pl-2">Nome:</label>
                          <label id="nome_med" name="nome_med" ><?php echo $val->nome_med;?></label>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="cInput">Especialidade:</label>
                          <label id="especialidade" name="especialidade"><?php echo $val->especialidade;?></label>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="cInput">CRM:</label>
                          <label id="CRM" name="CRM" ><?php echo $val->CRM;?></label>
                      </div>
                  </div>
                  <hr>
                  <h5 class="mt-3 mb-3 corH">Paciente</h5>
                        
                  <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="inputCpf">CPF</label>
                          <input type="text" name="cpf" class="form-control" id="cpf" placeholder="" value = "<?php echo $id_user;?>" >
                      </div>
                        
                      <div class="form-group col-md-8">
                          <label for="inputNome">Nome</label>
                          <input type="text" name="nome" class="form-control " id="nome" placeholder="" value = "<?php echo $val->nome;?>">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-5">
                          <label for="inputAddress">Sexo</label>
                          <select name="sexo" id="sexo" class="form-control" value="<?php echo $val->sexo;?>" >
                              <option value = ""><?php echo $val->sexo;?></option>
                              <option>Masculino</option>
                              <option>Feminino</option>
                          </select>
                      </div>

                      <div class="form-group col-md-7">
                          <label for="inputAddress2">Data de Nascimento</label>
                          <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" placeholder="" value = "<?php echo $val->data_nascimento;?>">
                      </div>
                  </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Evolução/Observação</label>
                        <textarea class="form-control" name="evolu_obs" id="evolu_obs" rows="5" value = ""><?php echo $val->evolu_obs;?></textarea>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md">
                            <label for="inputAddress">Medicamento</label>
                            <select name="medicamento" id="medicamento" class="form-control" value="<?php echo $val->medicamento;?>" >
                                  <option value = ""><?php echo $val->medicamento;?></option>
                                  <option>Alprazolam, Altrox, 2,0 mg</option>
                                  <option>Buspirona, Ansienon, 1,0 mg</option>
                                  <option>Clonazepam, Clonotril, 3,0 mg</option> 
                                  <option>Diazepam, Ansilive, 1,0 mg</option>
                                  <option>Fluoxetina, Daforin, 5,0 mg</option>
                                  <option>Fluvoxamina, Dumyrox, 2,0 mg</option>
                                  <option>Lorazepam, Ansilor, 2,5 mg</option>
                                  <option>Paroxetina, Pondera, 0,40 mg</option>
                                  <option>zepóxido, Librax, 0,50 mg</option> 
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Prescrição</label>
                        <textarea class="form-control" name="prescricao" id="prescricao" rows="3" value = ""><?php echo $val->prescricao;?></textarea>
                      </div>
                      
                  <div class="row justify-content-end">
                  <?php
              $s_clinico = new s_clinico();

              if(isset($_POST['enviar'])){

                        //$id = 000000;
                        $nome_med = $val->nome_med;
                        $especialidade = $val->especialidade;
                        $CRM = $val->CRM;
                        $id = $val->id;
                        //$nome_med = $_POST['nome_med'];
                        //$especialidade = $_POST['especialidade'];
                        //$CRM = $_POST['CRM'];
                        $cpf = $_POST['cpf'];
                        $nome = $_POST['nome'];
                        $sexo = $_POST['sexo'];
                        $data_nascimento = $_POST['data_nascimento'];
                        $evolu_obs = $_POST['evolu_obs'];
                        $medicamento = $_POST['medicamento'];
                        $prescricao = $_POST['prescricao'];


                        $s_clinico->setID($id);
                        $s_clinico->setNome_med($nome_med);
                        $s_clinico->setSexo($sexo);
                        $s_clinico->setEspecialidade($especialidade);
                        $s_clinico->setCRM($CRM);

                        $s_clinico->setCpf($cpf);
                        $s_clinico->setNome($nome);
                        $s_clinico->setData_nascimento($data_nascimento);
                        $s_clinico->setEvolu_obs($evolu_obs);
                        $s_clinico->setMedicamento($medicamento);
                        $s_clinico->setPrescricao($prescricao);

                

              
                  if($s_clinico->update_consulta()){
              ?>
              <div class="alert alert-success" role="alert">Atualização feita com sucesso!</div>
              <?php header('location:buscarConsulta.php');?>
              <?php
            }else{
              ?>
              <div class="alert alert-danger" role="alert">Não foi possível fazer a atualização!</div>
              <?php
            }
      }     
      ?>
                      <div class="form-group col-md-3 align-self-end ">
                          <button type="submit"  name = "enviar" id='enviar' class="btn btn-primary botao1 estiloFonte">Enviar</button>
                      </div>
                  </div>
                </form>
            </div>
        </div>
    
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js" ></script>
    </body>
  </html>