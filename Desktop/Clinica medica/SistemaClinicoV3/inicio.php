
  <?php
    require_once 'classe/validacao_login.php';
    ?>
<!DOCTYPE html>
  <html>
    <head>
        <meta charset="UTF-8">
      <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="estilo/estilo.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Página Inicial</title>
    </head>

    <body>
       <?php
            include "menu.php";
       ?>
            <div class="col-md-4">
                <div class="telaInfor mt-5">
                    <h3 class="ml-4 mt-2">Pacientes</h3>
                <div class=" telaInforItens1 row m-4">
                    <div class="col-md-4 mt-2">
                        <img style="width: 100%;" src="img/pacienteInfo.png" alt="">
                    </div>
                    <div class="col-md-8">
                        <p class="telaInforValores text-right">0</p>
                        <p class="text-right">Pacientes Cadastrados</p>
                    </div>
                </div>

                <div class=" telaInforItens2 row m-4">
                        <div class="col-md-4 mt-2">
                            <img style="width: 100%;" src="img/gift-box.png" alt="">
                        </div>
                        <div class="col-md-8">
                            <p class="telaInforValores text-right">0</p>
                            <p class="text-right">Pacientes Fazem anivérsario</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4  ">
                <div class="telaInfor mt-5">
                    <h3 class="ml-4 mt-2">Agendamentos</h3>
                <div class=" telaInforItens1 row m-4">
                    <div class="col-md-4 mt-2">
                        <img style="width: 100%;" src="img/calendario.png" alt="">
                    </div>
                    <div class="col-md-8">
                        <p class="telaInforValores text-right">0</p>
                        <p class="text-right">Agendamentos para hoje</p>
                    </div>
                </div>

                <div class=" telaInforItens2 row m-4">
                        <div class="col-md-4 mt-2">
                            <img style="width: 100%;" src="img/check.png" alt="">
                        </div>
                        <div class="col-md-8">
                            <p class="telaInforValores text-right">0</p>
                            <p class="text-right">Agendamentos confirmados</p>
                        </div>
                    </div>              
                </div>
            </div>
        </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js" ></script>
    </body>
  </html>