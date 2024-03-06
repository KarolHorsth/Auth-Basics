<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('public/tema/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('public/tema/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('public/tema/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">

  <div class="login-box">
    <!-- /.cadastrado com sucesso -->
    <?php if (isset($_GET['alert']) && $_GET['alert'] == "successCreate") :  ?>
    <div class="alert alert-success" role="alert" id="sucessCreate">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4 class="alert-heading">Cadastrado com sucesso!</h4>
      <p>Um email de verificação foi enviado para o seu endereço de email. Por favor, verifique sua caixa de entrada.
      </p>
    </div>
    <?php endif; ?>
    <?php if (isset($_GET['alert']) && $_GET['alert'] == "sentEmail") :  ?>
    <div class="alert alert-success" role="alert" id="sucessCreate">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4 class="alert-heading">Redefina sua senha!</h4>
      <p>Um link foi enviado para o seu endereço de email. Por favor, verifique sua caixa de entrada.
      </p>
    </div>
    <?php endif; ?>
    <?php if (isset($_GET['alert']) && $_GET['alert'] == "verifyEmail") :  ?>
    <div class="alert alert-danger" role="alert" id="sucessCreate">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4 class="alert-heading">Verifique seu e-mail!</h4>
      <p>É necessário confirmar o e-mail cadastrado. Por favor, verifique sua caixa de entrada.
      </p>
    </div>
    <?php endif; ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1>Acesso</h1>
      </div>
      <div class="card-body">
        <?php if (isset($_GET['alert']) && $_GET['alert'] == "errorLogin") : ?>
        <p class="login-box-msg">Acesso Negado! Informe os dados corretamente.</p>
        <?php else : ?>
        <p class="login-box-msg">Acesse sua conta para continuar</p>
        <?php endif; ?>
        <div class="card-body">
          <?php if (isset($_GET['alert']) && $_GET['alert'] == "errorToken") : ?>
          <p class="login-box-msg">Acesso Negado! Favor fazer login.</p>
          <?php else : ?>

          <?php endif; ?>

          <form action="<?= base_url('/login') ?>" method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Digite seu e-mail" name="email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Digite sua senha" name="senha" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">ACESSE SUA CONTA</button>
                <button type="button" class="btn btn-sm btn-danger btn-block" data-toggle="modal"
                  data-target="#modal-novo-usuario">
                  <i class="fas fa-plus-circle"></i> CRIAR CONTA
                </button>
                <div class="form-check mt-2">
                  <input class="form-check-input" type="checkbox" id="manter_conectado" name="manter_conectado">
                  <label class="form-check-label" for="manter_conectado">
                    Manter-me conectado
                  </label>
                </div>
                <a href="<?= base_url('/forgotPassword') ?>">Esqueci minha senha</a>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-novo-usuario">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="<?= base_url('/cadastrar') ?>" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Novo usuário</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;
                </span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="nome" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" class="form-control" name="senha" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" id="cadastrar" class="btn btn-primary"><i class="fas fa-save"></i>
                Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
    document.getElementById("manter_conectado").addEventListener('change', (e) => {
      document.getElementById("manter_conectado").value = e.target.checked
    })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url('public/tema/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>