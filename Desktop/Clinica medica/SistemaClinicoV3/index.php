<?php
require_once 'classe/s_clinico.php';

?>

<!DOCTYPE html>
  <html>
    <head>
        <meta charset="UTF-8">
      <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="estilo/estilo.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Sistema Clínico</title>
    </head>

    <body id="fundo">   
        <div class="row barraSuperior sticky-top ">
            <div class="col-6 d-flex align-content-center flex-wrap ">
                <h5 class="corFonte ml-5">Clínica Médica Especializada em Psiquiatria</h5>
            </div>
           <div class="col-6">
              <ul class="nav justify-content-end"> 
                <li class="nav-item">
                  <a  class="nav-link corFonte" href="#">Início </a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link corFonte" href="#">Contato </a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link corFonte" href="#">Sobre </a>
                </li>
              </ul>
            </div>
        </div>
        <div class="row justify-content-center" >
          <div class="col-md-4">
              <div class="telaLogin mt-5 p-5">
                  <form id="formCadastrar" action="" method="post">
                      <div class="form-group">
                        <h2 class="corTitulo estiloFonte text-center mb-3">Acesse o Sistema</h2>
                        <label class="estiloFonte corFonte" for="exampleInputEmail1">Usuário ou Código</label>
                        <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemplo">
                        <small id="text" class="form-text text-muted legenda">Entre com o usuário ou código do funcionário.</small>
                      </div>
                      <div class="form-group estiloFonte corFonte">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        <?php
                          $s_clinico = new s_clinico();

                          if(isset($_POST['login'])){
                            $usuario = $_POST['usuario'];
                            $senha = $_POST['senha'];
                            $s_clinico->setUsuario($usuario);
                            $s_clinico->setSenha($senha);
                            $s_clinico->login();   
                          }
                        ?>
                      
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Lembrar</label>
                      </div>
                      <button type="submit" name="login" class="btn btn-primary botao1 estiloFonte">Entrar</button>
                    </form>
              </div>
          </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js" ></script>
    </body>
  </html>