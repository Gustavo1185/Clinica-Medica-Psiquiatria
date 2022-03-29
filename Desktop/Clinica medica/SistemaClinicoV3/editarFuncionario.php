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
      <title>Editar Funionário</title>
    </head>

    <body>   
          <?php
              include "menu.php";
         

              //$e= $_POST['idEtapa'];
              
        $s_clinico = new s_clinico(); 
        $id_user = filter_input(INPUT_GET, 'cod_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
        //var_dump($id_user);
        $result = $s_clinico->retornarClinico_funcionario($id_user);

        foreach ($result as $res => $val){
        	 
      

           }
        ?>


              <div class="col-md-9">
                  <h3 class="mt-5 ml-2">Editar Funcionário</h3>
                  <div class="formulario p-5">
                 
                  <form id="formCadastrar" action="" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputEmail4">Código do Funcionário</label>
                          <input type="text" name="cod_funcionario" id="codigo" class="form-control" id="inputCod" placeholder="" value = "<?php echo $id_user;?>">
                        </div>
                        
                        <div class="form-group col-md-8">
                          <label for="inputPassword4">Nome</label>
                          <input type="text" name="nome" id="nome" class="form-control" id="inputNome" placeholder="" value = "<?php echo $val->nome;?>">
                        </div>
                      </div>

                      <div class="form-row">
                          <div class="form-group col-md-5">
                            <label for="inputAddress">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" id="inputCpf" placeholder="" value = "<?php echo $val->cpf;?>">
                          </div>

                          <div class="form-group col-md-7">
                            <label for="inputAddress2">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" id="inputEmail" placeholder="" value = "<?php echo $val->email;?>">
                          </div>
                      </div>

                      <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="inputAddress2">Telefone</label>
                              <input type="text" name="telefone" id="telefone" class="form-control" id="inputTelefone" placeholder="" value = "<?php echo $val->telefone;?>">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputCity">Celular 1</label>
                              <input type="text" name="celular1" id="celular1" class="form-control" id="inputClular1" value = "<?php echo $val->celular1;?>">
                            </div>

                            <div class="form-group col-md-4">
                              <label for="inputCity">Celular 2</label>
                              <input type="text"  name="celular2" id="celular2" class="form-control" id="inputClular2" value = "<?php echo $val->celular2;?>">
                            </div>
                      </div>

                      <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="inputCEP">Usuário</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" id="inputUsuario" value = "<?php echo $val->usuario;?>">
                          </div>
                          <div class="form-group col-md-4">
                              <label for="inputCEP">Senha</label>
                              <input type="password" name="senha" id="senha" class="form-control" id="inputSenha" value = "<?php echo $val->senha;?>">
                            </div>
                   
                      </div>

                      <div class="row justify-content-end">
                      <?php
              $s_clinico = new s_clinico();

              if(isset($_POST['enviar'])){

                $cod_funcionario = $_POST['cod_funcionario'];
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $email = $_POST['email'];
                $usuario = $_POST['usuario'];
                $senha = $_POST['senha'];
                $telefone = $_POST['telefone'];
                $celular1 = $_POST['celular1'];
                $celular2 = $_POST['celular2'];
              

                $s_clinico->setCod_funcionario($cod_funcionario);
                $s_clinico->setNome($nome);
                $s_clinico->setCpf($cpf);
                $s_clinico->setEmail($email);
                $s_clinico->setUsuario($usuario);
                $s_clinico->setSenha($senha);
                $s_clinico->setTelefone($telefone);
                $s_clinico->setCelular1($celular1);
                $s_clinico->setCelular2($celular2);
                
                

                if($s_clinico->update_funcionario() && $s_clinico->update_telefone_Funcionario()){
              ?>
              <div class="alert alert-success" role="alert">Cadastro feito com sucesso!</div>
              <?php
            }else{
              ?>
              <div class="alert alert-danger" role="alert">Não foi possível fazer o cadastro!</div>
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
        </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js" ></script>
    </body>
  </html>