<?php

require_once 'classe/s_clinico.php';
require_once 'classe/validacao_login.php';
?>

<!DOCTYPE html>
  <html>
    <head>
        <meta charset="UTF-8">
      <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="estilo/estilo.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Editar Paciente</title>
    </head>

    <body>   
         <?php
            include "menu.php";
       
              //$e= $_POST['idEtapa'];
              
            $s_clinico = new s_clinico(); 
            $id_user = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            //var_dump($id_user);
            $result = $s_clinico->retornarClinico_paciente($id_user);


            foreach ($result as $res => $val){

              }

        ?>
              <div class="col-md-9">
                  <h3 class="mt-5 ml-2">Editar Paciente</h3>
                  <div class="formulario p-5">
                  <form id="formCadastrar" action="" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputCpf">CPF</label>
                          <input type="text" name="cpf" class="form-control" id="cpf" placeholder="" value = "<?php echo $id_user;?>"/>
                        </div>
                        
                        <div class="form-group col-md-8">
                          <label for="inputNome">Nome</label>
                          <input type="text" name="nome" class="form-control" id="nome" placeholder="" value = "<?php echo $val->nome;?>">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputRg">RG</label>
                          <input type="text" name="RG"class="form-control" id="RG" placeholder="" value = "<?php echo $val->RG;?>">
                        </div>
                        
                        <div class="form-group col-md-4">
                          <label for="inputOM">Órgão Emissor</label>
                          <input type="text" name="orgao_emissor" class="form-control" id="orgao_emissor" placeholder="" value = "<?php echo $val->orgao_emissor;?>">
                        </div>

                        <div class="form-group col-md-4">
                          <label for="inputDataEmissao">Data de Emissão</label>
                          <input type="date" name="data_emissao" class="form-control" id="data_emissao" placeholder="" value = "<?php echo $val->data_emissao;?>">
                        </div>
                      </div>

                      <div class="form-row">
                          <div class="form-group col-md-5">
                            <label for="inputAddress">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control" value = "<?php echo $val->sexo;?>">
                                    <option>Selecione::</option>
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                </select>
                          </div>

                          <div class="form-group col-md-7">
                            <label for="inputAddress2">Data de Nascimento</label>
                            <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" placeholder="" value = "<?php echo $val->data_nascimento;?>">
                          </div>
                      </div>

                      <div class="form-row">
                            <div class="form-group col-md-8">
                              <label for="inputAddress2">Endereço</label>
                              <input type="text" name="logradouro"class="form-control" id="logradouro" placeholder="" value = "<?php echo $val->logradouro;?>">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputCity">Número</label>
                              <input type="text" name="numero"class="form-control" id="numero" value = "<?php echo $val->numero;?>">
                            </div>
                    </div>    
                    <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="inputCity">CEP</label>
                              <input type="text" name="CEP"class="form-control" id="CEP" value = "<?php echo $val->CEP;?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">Cidade</label>
                                <input type="text" name="cidade" class="form-control" id="cidade" value = "<?php echo $val->cidade;?>">
                            </div>
                            <div class="form-group col-md-5">
                                    <label for="inputCity">Estado</label>
                                    <select  name="cod_estado" id="cod_estado" class="form-control">

                                      <option value="<?php echo $val->cod_estado;?>"><?php echo utf8_encode($s_clinico->nomeEstado($val->cod_estado)); ?></option>

                                             <?php
                                          $s_clinico = new s_clinico();
                                          foreach($s_clinico->tipoEstado() as $res => $value){
                                            $nome = utf8_encode($value->nome);
                                            echo "<option value ='$value->cod_estado'>$nome</option>";
                                            
                                            }
                                            ?>
                                    </select>   
                            </div>
                      </div>
                      <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="inputAddress2">Telefone</label>
                              <input type="text" name="telefone"class="form-control" id="telefone" placeholder="" value = "<?php echo $val->nro_telefone;?>">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputCity">Celular 1</label>
                              <input type="text" name="celular" class="form-control" id="celular1" value = "<?php echo $val->celular1;?>">
                            </div>

                            <div class="form-group col-md-4">
                              <label for="inputCity">Celular 2</label>
                              <input type="text" name="celular2" class="form-control" id="celular2" value = "<?php echo $val->celular2;?>">
                            </div>
                      </div>

                      <div class="row justify-content-end">
                      <?php
              $s_clinico = new s_clinico();

              if(isset($_POST['enviar'])){

                $cpf = $_POST['cpf'];
                $nome = $_POST['nome'];
                $RG = $_POST['RG'];
                $orgao_emissor = $_POST['orgao_emissor'];
                $data_emissao = $_POST['data_emissao'];
                $sexo = $_POST['sexo'];
                $data_nascimento = $_POST['data_nascimento'];
                $logradouro = $_POST['logradouro'];
                $numero = $_POST['numero'];
                $CEP = $_POST['CEP'];
                $cidade = $_POST['cidade'];
                $cod_estado = $_POST['cod_estado'];
                $telefone = $_POST['telefone'];
                $celular1 = $_POST['celular'];
                $celular2 = $_POST['celular2'];
              

                $s_clinico->setCpf($cpf);
                $s_clinico->setNome($nome);
                $s_clinico->setRG($RG);
                $s_clinico->setOrgao_emissor($orgao_emissor);
                $s_clinico->setData_emissao($data_emissao);
                $s_clinico->setSexo($sexo);
                $s_clinico->setData_nascimento($data_nascimento);
                $s_clinico->setLogradouro($logradouro);
                $s_clinico->setNumero($numero);
                $s_clinico->setCEP($CEP);
                $s_clinico->setCidade($cidade);
                $s_clinico->setCod_Estado($cod_estado);
                $s_clinico->setTelefone($telefone);
                $s_clinico->setCelular1($celular1);
                $s_clinico->setCelular2($celular2);

                

              
                  if($s_clinico->update_paciente() && $s_clinico->update_telefone_Paciente()){
              ?>
              <div class="alert alert-success" role="alert">Atualização feita com sucesso!</div>
              <?php
            }else{
              ?>
              <div class="alert alert-danger" role="alert">Não foi possível fazer a atualização!</div>
              <?php
            }
      }     
      ?>

                      <div class="form-group col-md-3 align-self-end ">
                          <button type="submit" name="enviar" id="enviar" class="btn btn-primary botao1 estiloFonte">Enviar</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
        </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js" ></script>
    </body>
  </html>