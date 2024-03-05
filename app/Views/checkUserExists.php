<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Confirmation</title>
</head>

<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<body>

  <form method="post" action="<?= base_url('check_email/' . basename($path)) ?>"
    style="text-align: center; margin-top: 50px;">
    <h2>Confirme aqui o seu email para logar na plataforma</h2>
    <button id="send_check" class="btn btn-primary">Confirmar Email</button>
  </form>
</body>

</html>


<script src="<?= base_url('public/tema/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>