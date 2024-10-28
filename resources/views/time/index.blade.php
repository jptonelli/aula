<!DOCTYPE html>
<html lang="en">

<head>
  <title>Soccer &mdash; Website by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

  <style>
    input {
      color: green;
    }
  </style>
</head>

<body>
  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4" role="banner">
      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html">
              <img src="images/logo.png" alt="Logo">
            </a>
          </div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="/" class="nav-link">Home</a></li>
                <li><a href="categoria" class="nav-link">Categorias</a></li>
                <li class="active"><a href="time" class="nav-link">Times</a></li>
                <li><a href="jogadores" class="nav-link">Jogadores</a></li>
                <li><a href="contact.html" class="nav-link">Inscreva-se</a></li>
              </ul>
            </nav>

            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                class="icon-menu h3 text-white"></span></a>
          </div>
        </div>
      </div>
    </header>

    <main>
      <div>
        <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">

          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-5 ml-auto">
                <h1 class="text-white">Conheça as Equipes Participantes</Em></h1>
                <p>Aproveite e Inscreva sua Equipe para o Maior Campeonato Amador de Bauru.</p>
                <div id="date-countdown"></div>
                <p>
                  <a href="/timeCadastrar" class="btn btn-primary py-3 px-4 mr-3">Inscreva sua Equipe</a>
                  <a href="#" class="more light">Saiba mais</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid px-4">
        <h1 class="mt-4">Times</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Times</li>
        </ol>

        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Times
          </div>
          <div class="card-body">
            <table id="datatablesSimple">
              <thead>
                <th>ID</th>
                <th>EQUIPE</th>
                <th>ESTADO</th>
                <th>OPÇÕES</th>
              </thead>

              <tbody>
                @foreach($times as $linha)
                <tr>
                  <td>{{$linha->id}}</td>
                  <td>{{$linha->time_nome}}</td>
                  <td>{{$linha->time_estado}}</td>
                  <td>
                    <a href='{{ route("time_upd", [ "id" => $linha->id]) }}' class="btn btn-success">
                      <li class="fa fa-pencil"></li>
                    </a> |
                    <a href='{{ route("time_exc", [ "id" => $linha->id]) }}' class="btn btn-danger">
                      <li class="fa fa-trash"></li>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="inscricaoModal" tabindex="-1" role="dialog" aria-labelledby="inscricaoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="inscricaoModalLabel" style="color: black;text-transform:uppercase">Formulário de Inscrição de Time</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/time" method="POST">
              @csrf <!-- TOKEN PARA SEGURANÇA -->
                <div class="form-group">
                  <label for="campeonato">Nome do Campeonato:</label>
                  <input type="text" class="form-control" id="campeonato" name="campeonato" value="Soccer TM" disabled>
                </div>

                <div class="form-group">
                  <label for="data_inscricao">Data da Inscrição:</label>
                  <input type="date" class="form-control" id="data_inscricao" name="data_inscricao" required>
                </div>

                <h5 style="color: black;text-transform:uppercase; text-align:center;">Dados do Time</h5>
                <div class="form-group">
                  <label for="nome_time">Nome do Time:</label>
                  <input type="text" class="form-control" id="nome_time" name="nome_time" required>
                </div>

                <div class="form-group">
                  <label for="cores_uniforme">Cores do Uniforme:</label>
                  <input type="text" class="form-control" id="cores_uniforme" name="cores_uniforme" required>
                </div>

                <div class="form-group">
                  <label for="categoria">Categoria:</label>
                  <select class="form-control" id="categoria" name="categoria" required>
                    <option value="adulto">Adulto</option>
                    <option value="sub20">Sub-20</option>
                    <option value="sub17">Sub-17</option>
                    <option value="outros">Outros</option>
                  </select>
                </div>

                <h5>Dados do Responsável</h5>
                <div class="form-group">
                  <label for="nome_responsavel">Nome Completo:</label>
                  <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" required>
                </div>

                <div class="form-group">
                  <label for="telefone">Telefone:</label>
                  <input type="tel" class="form-control" id="telefone" name="telefone" required>
                </div>

                <div class="form-group">
                  <label for="email">E-mail:</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <h5>Lista de Jogadores</h5>
                <div id="jogadores">
                  <div class="form-group">
                    <label for="jogador1">Nome do Jogador 1:</label>
                    <input type="text" class="form-control" id="jogador1" name="jogador[]" required>
                  </div>
                  <div class="form-group">
                    <label for="jogador2">Nome do Jogador 2:</label>
                    <input type="text" class="form-control" id="jogador2" name="jogador[]" required>
                  </div>
                  <div class="form-group">
                    <label for="jogador3">Nome do Jogador 3:</label>
                    <input type="text" class="form-control" id="jogador3" name="jogador[]" required>
                  </div>
                  <div class="form-group">
                    <label for="jogador4">Nome do Jogador 4:</label>
                    <input type="text" class="form-control" id="jogador4" name="jogador[]" required>
                  </div>
                  <div class="form-group">
                    <label for="jogador5">Nome do Jogador 5:</label>
                    <input type="text" class="form-control" id="jogador5" name="jogador[]" required>
                  </div>
                  <div class="form-group">
                    <label for="jogador6">Nome do Jogador 6:</label>
                    <input type="text" class="form-control" id="jogador6" name="jogador[]" required>
                  </div>
                  <div class="form-group">
                    <label for="jogador7">Nome do Jogador 7:</label>
                    <input type="text" class="form-control" id="jogador7" name="jogador[]" required>
                  </div>
                  <div class="form-group">
                    <label for="jogador8">Nome do Jogador 8:</label>
                    <input type="text" class="form-control" id="jogador8" name="jogador[]" required>
                  </div>
                  <div class="form-group">
                    <label for="jogador9">Nome do Jogador 9:</label>
                    <input type="text" class="form-control" id="jogador9" name="jogador[]" required>
                  </div>
                  <div class="form-group">
                    <label for="jogador10">Nome do Jogador 10:</label>
                    <input type="text" class="form-control" id="jogador10" name="jogador[]" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="declaracao">Declaração:</label>
                  <input type="text" class="form-control" id="declaracao" name="declaracao" required placeholder="Digite seu nome para declarar.">
                </div>

                <button href="timeCadastrar" type="submit" class="btn btn-success btn-block">Enviar Inscrição</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>News</h3>
              <ul class="list-unstyled links">
                <li><a href="#">All</a></li>
                <li><a href="#">Club News</a></li>
                <li><a href="#">Media Center</a></li>
                <li><a href="#">Video</a></li>
                <li><a href="#">RSS</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Tickets</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Online Ticket</a></li>
                <li><a href="#">Payment and Prices</a></li>
                <li><a href="#">Contact &amp; Booking</a></li>
                <li><a href="#">Tickets</a></li>
                <li><a href="#">Coupon</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Matches</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Standings</a></li>
                <li><a href="#">World Cup</a></li>
                <li><a href="#">La Lega</a></li>
                <li><a href="#">Hyper Cup</a></li>
                <li><a href="#">World League</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Social</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Youtube</a></li>
              </ul>
            </div>
          </div>

        </div>

        <div class="row text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart"
                  aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div>
  <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>


  <script src="js/main.js"></script>

</body>

</html>