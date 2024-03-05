<section>
  <div class="container mt-5 pt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 d-flex gap-3 align-items-start">
        <img width="200px" class="img-fluid rounded-circle"
          src="https://t3.ftcdn.net/jpg/05/16/27/58/360_F_516275801_f3Fsp17x6HQK0xQgDQEELoTuERO4SsWV.jpg" alt="">
        <form method="post" action="<?= base_url('update_profile/' . getUser(session()->get('user_id'))['id']) ?>"
          class="w-100">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="<?= getUser(session()->get('user_id'))['nome'] ?>"
              class="w-100 form-control" id="nome">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Endereço de email</label>
            <input type="email" name="email" value="<?= getUser(session()->get('user_id'))['email'] ?>"
              class="w-100 form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">O endereço de e-mail é único.</div>
          </div>
          <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </form>
      </div>
    </div>
  </div>
</section>