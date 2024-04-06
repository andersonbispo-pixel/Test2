<!DOCTYPE html>
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="VINYCARDING">
    <title>ATLAS ROYAL</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="fonts.googleapis.com/cssc203.css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  </head>
  <body class="horizontal-layout horizontal-menu navbar-static dark-layout 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">
      
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

<div class="col-md-11 mt-4" style="margin: auto;">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="title"><i class="fa fa-credit-card"></i> Atlas Royal <i class="fa fa-credit-card"></i> </h5><hr>
              
              
              <textarea style="height: 8.06rem;"  class="form-control text-center form-checker mb-2" placeholder=" "></textarea>
              <button class="btn btn-outline-success btn-play" style="width: 49%; float: left;"><i class="fa fa-play"></i> INICIAR</button>
              <button class="btn btn-outline-danger btn-stop text-white" style="width: 49%; float: right;" disabled><i class="fa fa-stop"></i> PARAR</button>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="title"><i class="fa fa-thumbs-up"></i> Aprovadas:<span class="badge badge-success float-right aprovadas">0</span></h5><hr>

              <h5 class="title"><i class="fa fa-thumbs-down"></i> Reprovadas:<span class="badge badge-danger float-right reprovadas">0</span></h5><hr>

              <h5 class="title"><i class="fa fa-sync-alt"></i> Testadas:<span class="badge badge-info float-right testadas">0</span></h5><hr>

              <h5 class="title mb-0"><i class="fa fa-share-square"></i> Carregadas:<span class="badge badge-primary float-right carregadas">0</span></h5>
              </h5>
             
              
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <div class="float-right">
                <button type="show" class="btn btn-primary btn-sm show-lives"><i class="fa fa-eye-slash"></i></button>
                <button class="btn btn-success btn-sm btn-copy"><i class="fa fa-copy"></i></button>
              </div>
              <h4 class="title mb-1"><i class="fa fa-thumbs-up text-success"></i> APROVADAS</h4>
              <div id='lista_aprovadas'></div>
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <div class="float-right">
                <button type='hidden' class="btn btn-primary btn-sm show-dies"><i class="fa fa-eye"></i></button>
                <button class="btn btn-danger btn-sm btn-trash"><i class="fa fa-trash"></i></button>
              </div>
              <h4 class="title mb-1"><i class="fa fa-thumbs-down text-danger"></i> REPROVADAS</h4>
              <div style='display: none;' id='lista_reprovadas'></div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="app-assets/jquery.min.js" type="text/javascript"></script>

<script>

  $(document).ready(function() {

   // getSaldo();

    $('.show-lives').click(function() {
      var type = $('.show-lives').attr('type');
      $('#lista_aprovadas').slideToggle();
      if (type == 'show') {
        $('.show-lives').html('<i class="fa fa-eye"></i>');
        $('.show-lives').attr('type', 'hidden');
      } else {
        $('.show-lives').html('<i class="fa fa-eye-slash"></i>');
        $('.show-lives').attr('type', 'show');
      }});

    $('.show-dies').click(function() {
      var type = $('.show-dies').attr('type');
      $('#lista_reprovadas').slideToggle();
      if (type == 'show') {
        $('.show-dies').html('<i class="fa fa-eye"></i>');
        $('.show-dies').attr('type', 'hidden');
      } else {
        $('.show-dies').html('<i class="fa fa-eye-slash"></i>');
        $('.show-dies').attr('type', 'show');
      }});

    $('.btn-trash').click(function() {
      Swal.fire({
        title: 'Dies Limpas.', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
      });
      $('#lista_reprovadas').text('');
    });

    $('.btn-copy').click(function() {
      Swal.fire({
        title: 'Lives Copiadas!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
      });
      var lista_lives = document.getElementById('lista_aprovadas').innerText;
      var textarea = document.createElement("textarea");
      textarea.value = lista_lives;
      document.body.appendChild(textarea);
      textarea.select();
      document.execCommand('copy'); document.body.removeChild(textarea);
    });


    $('.btn-play').click(function() {

      var lista = $('.form-checker').val().trim();
      var array = lista.split('\n');
      var lives = 0,
      dies = 0,
      testadas = 0,
      txt = '';

      if (!lista) {
        Swal.fire({
          title: 'Erro: Lista Vazia!', icon: 'error', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
        });
        return false;
      }

      Swal.fire({
        title: 'Teste Iniciado!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
      });

      var line = array.filter(function(value) {
        if (value.trim() !== "") {
          txt += value.trim() + '\n';
          return value.trim();
        }
      });


      var total = line.length;


      $('.form-checker').val(txt.trim());
      $('.carregadas').text(total);
      $('.btn-play').attr('disabled', true);
      $('.btn-stop').attr('disabled', false);

      line.forEach(function(data) {
        var callBack = $.ajax({
          url: 'api.php?lista=' + data,
          success: function(retorno) {
            if (retorno.indexOf("Aprovada") >= 0) {
        $('#saldoCount').html($('#saldoCount').html() -1)
              Swal.fire({
                title: '+1 Aprovada!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
              });
              $('#lista_aprovadas').append(retorno);
              removelinha();
              lives = lives +1;
            } else {
              $('#lista_reprovadas').append(retorno);
              removelinha();
              dies = dies +1;
            }
            testadas = lives + dies;
            $('.aprovadas').text(lives);
            $('.reprovadas').text(dies);
            $('.testadas').text(testadas);

            if (testadas == total) {
              Swal.fire({
                title: 'Teste Finalizado!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
              });
              $('.btn-play').attr('disabled', false);
              $('.btn-stop').attr('disabled', true);
            }
          }
        });
        $('.btn-stop').click(function() {
          Swal.fire({
            title: 'Teste Parado!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
          });
          $('.btn-play').attr('disabled', false);
          $('.btn-stop').attr('disabled', true);
          callBack.abort();
          return false;
        });
      });
    });
  });

  function removelinha() {
    var lines = $('.form-checker').val().split('\n');
    lines.splice(0, 1);
    $('.form-checker').val(lines.join("\n"));
  }

</script>
   

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <footer class="footer footer-static footer-dark">
      <p class="clearfix mb-0"><span class="float-left d-inline-block">2023 &copy; Playboss Company</span><span class="float-right d-sm-inline-block d-none">Vindi<i class="bx bxs-heart pink mx-50 font-small-3"></i>by<a class="text-uppercase" href="https://discord.gg/FKnjzSwVb7" target="_blank">Atlas</a></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
      </p>
    </footer>

  </body>
</html>