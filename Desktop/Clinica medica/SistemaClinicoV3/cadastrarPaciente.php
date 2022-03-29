<?php

require_once 'classe/s_clinico.php';
require_once 'classe/validacao_login.php';
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="estilo/estilo.css">
      <title>Cadastrar Paciente</title>
    </head>

    <body>   
         <?php
            include "menu.php";
         ?>
          <div class="col-md-9">
              <h3 class="mt-5 ml-2">Cadastrar Paciente</h3>
                <div class="formulario p-5">
                  <form id="formCadastrar" action="" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputCpf">CPF</label>
                          <input type="text" name="cpf" class="form-control" id="cpf" placeholder="" >
                        </div>
                        
                        <div class="form-group col-md-8">
                          <label for="inputNome">Nome</label>
                          <input type="text" name="nome" class="form-control " id="nome" placeholder="" >
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputRg">RG</label>
                          <input type="text" name="RG"class="form-control" id="RG" placeholder="" >
                        </div>
                        
                        <div class="form-group col-md-4">
                          <label for="inputOM">Órgão Emissor</label>
                          <input type="text" name="orgao_emissor" class="form-control" id="orgao_emissor" placeholder="" >
                        </div>

                        <div class="form-group col-md-4">
                          <label for="inputDataEmissao">Data de Emissão</label>
                          <input type="date" name="data_emissao" class="form-control" id="data_emissao" placeholder="" >
                        </div>
                      </div>

                      <div class="form-row">
                          <div class="form-group col-md-5">
                            <label for="inputAddress">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control" >
                                    <option value="">Selecione:</option>
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                </select>
                          </div>

                          <div class="form-group col-md-7">
                            <label for="inputAddress2">Data de Nascimento</label>
                            <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" placeholder="" >
                          </div>
                      </div>

                      <div class="form-row">
                            <div class="form-group col-md-8">
                              <label for="inputAddress2">Endereço</label>
                              <input type="text" name="logradouro"class="form-control" id="logradouro" placeholder="" >
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputCity">Número</label>
                              <input type="text" name="numero"class="form-control" id="numero" >
                            </div>
                      </div>    
                      <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="inputCity">CEP</label>
                              <input type="text" name="CEP"class="form-control" id="CEP" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">Cidade</label>
                                <input type="text" name="cidade" class="form-control" id="cidade" >
                            </div>
                            <div class="form-group col-md-5">
                                    <label for="inputCity">Estado</label>
                                    <select  name="cod_estado" id="cod_estado" class="form-control" >
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
                              <input type="text" name="telefone"class="form-control" id="telefone" placeholder="" >
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputCity">Celular 1</label>
                              <input type="text" name="celular" class="form-control" id="celular1">
                            </div>

                            <div class="form-group col-md-4">
                              <label for="inputCity">Celular 2</label>
                              <input type="text" name="celular2" class="form-control" id="celular2">
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

                        

         
                        if($s_clinico->insert_paciente() && $s_clinico->insert_telefone_Paciente()){
                          ?>
                              <div class="text-success" id="msg" role="alert">Cadastro realizado com suceso </div>
                          <?php
                        }else{
                          ?>
                          <div class="text-danger" id="msg" role="alert">Não foi possível realizar o cadastro</div>

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