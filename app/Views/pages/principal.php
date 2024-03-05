<section class="min-vw-100 min-vh-100 d-flex align-items-center justify-content-center">
  <h2>Bem vindo ao sistema, <?= getUser(session()->get('user_id'))['nome'] ?>!</h2>
</section>