<section class="d-flex align-items-center justify-content-center">
  <h4>Bem vindo ao sistema, <?= getUser(session()->get('user_id'))['nome'] ?>!</h4>
</section>