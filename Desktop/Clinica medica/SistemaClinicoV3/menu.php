<?php 
  $cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
        
        ?>

        <?php
                                    if(isset($_POST['cadastrarConsulta'])) {                         

                                        header('location: cadastrarConsulta.php?cpf=' . $cpf);
                                    
                                    }
                               ?>
<div class="row barraSuperior sticky-top ">
            <div class="col-6 d-flex align-content-center flex-wrap ">
                <h5 class="corFonte ml-5">Clínica Médica Especializada em Psiquiatria</h5>
            </div>
           <div class="col-6">
              <ul class="nav justify-content-end"> 
                    <li class="nav-item">
                        <a  class="nav-link corFonte" href="inicio.php">Início </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link corFonte" href="#">Contato </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link corFonte" href="#">Sobre </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link corFonte" href="logoff.php"> <img class="icones" src="img/sair.png" alt=""></a>
                    </li>
              </ul>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-3 barraLateral">
                <div class="barraLateralSusp">
                  <div class="text-center">
                    <img class="imgUser rounded mx-auto d-block" src="img/png/user-shape.png" alt="">
                    <h6 class="corFonte">Usuário</h6>
                  </div>

                  <nav class="navbar navbar-expand-sm barraLateralSusp navbar-dark bg-dark">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column lista">
                          <li class="nav-item active">
                              <button class="corFonte botao1 estiloFonte text-left"  data-toggle="collapse" 
                              data-target="#btn1, #btn2" aria-expanded="false" 
                              aria-controls="btn1 btn2"><img class="icones mr-2 mb-1" src="img/png/calendar-with-spring-binder-and-date-blocks.png" alt="">Agenda</button>
                                  <a id="btn1" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="#">Cadastrar Agenda</a>
                                  <a id="btn2" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="#">Buscar Agenda</a>     
                          </li>

                          <li class="nav-item active">
                              <button class="corFonte botao1 estiloFonte text-left"  data-toggle="collapse" 
                              data-target="#btn3, #btn4" aria-expanded="false" 
                              aria-controls="btn3 btn4"><img style="width: 28px;" class="mr-1 mb-1" src="img/consulta.png" alt="">Consulta</button>     
                                  <form id="formCadastrar" action="" method="post">
                                  <button id="btn3" class="dropdown-item collapse multi-collapse botao2 estiloFonte"id="cadastrarConsulta" name="cadastrarConsulta" >Cadastrar Consulta</button>
                                   </form>
                                  <a id="btn4" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="buscarConsulta.php">Buscar Consulta</a> 
                          </li>

                          <li class="nav-item active">
                              <button class="corFonte botao1 estiloFonte text-left"  data-toggle="collapse" 
                              data-target="#btn5, #btn6" aria-expanded="false" 
                              aria-controls="btn1 btn2"><img style="width: 32px;" class=" mb-1" src="img/paciente.png" alt="">Paciente</button>
                                  <a id="btn5" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="cadastrarPaciente.php">Cadastrar Paciente</a>
                                  <a id="btn6" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="buscarPaciente.php">Buscar Paciente</a>
                          </li>

                          <li class="nav-item active">
                              <button class="corFonte botao1 estiloFonte text-left"  data-toggle="collapse" 
                              data-target="#btn7, #btn8" aria-expanded="false" 
                              aria-controls="btn7 btn8"><img style="width: 22px;" class="mr-2 ml-1 mb-1" src="img/png/user-md-symbol.png" alt="">Médico</button>
                                  <a id="btn7" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="cadastrarMedico.php">Cadastrar Médico</a>
                                  <a id="btn8" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="buscarMedico.php">Buscar Médico</a>
                          </li>

                          <li class="nav-item active">
                              <button class="corFonte botao1 estiloFonte text-left"  data-toggle="collapse" 
                              data-target="#btn9" aria-expanded="false" 
                              aria-controls="btn9"><img class="icones mr-2 mb-1" src="img/relatorio.png" alt="">Relatório</button>
                                  <a id="btn9" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="#">Emitir Relatório</a>
                          </li>

                          <li class="nav-item active">
                              <button class="corFonte botao1 estiloFonte text-left"  data-toggle="collapse" 
                              data-target="#btn10, #btn11" aria-expanded="false" 
                              aria-controls="btn10 btn11"><img style="width: 12px;" class="mr-3 ml-1 mb-1" src="img/funcionario.png" alt="">Funcionário</button>
                                  <a id="btn10" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="cadastrarFuncionario.php">Cadastrar Funcionário</a>
                                  <a id="btn11" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="buscarFuncionario.php">Buscar Funcionário</a>  
                          </li>
    
                          <li class="nav-item active">
                              <button class="corFonte botao1 estiloFonte text-left"  data-toggle="collapse" 
                              data-target="#btn12, #btn13" aria-expanded="false" 
                              aria-controls="btn12 btn13"><img class="icones mr-1 mb-1" src="img/remedio.png" alt="">Medicamento</button>
                                  <a id="btn12" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="#">Cadastrar Medicamento</a>
                                  <a id="btn13" class="dropdown-item collapse multi-collapse botao2 estiloFonte" href="#">Buscar Medicamento</a>
                          </li>
                        </ul>
                      </div>
                    </nav>
                </div>
              </div>