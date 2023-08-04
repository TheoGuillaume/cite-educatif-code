<div class="page page-center">
  <div class="container-tight py-4">
    <div class="text-center mb-4">
      <h1>Veuillez saisir votre adresse mail </h1>
    </div>
    <form class="card card-md" action="<?= base_url('/verification_mail') ?>" method="POST">
      <div class="card-body">
        <div class="form-group mb-3 ">
          <label class="form-label required">Email</label>
          <div>
            <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="" required>
            <?php if (session()->has("error_empty_email")) { ?>
              <span class="text-danger"><?= session("error_empty_email") ?></span>
            <?php } ?>
          </div>
        </div>
        <div class="row mb-3  d-flex flex-wrap">
          <div class="col-3 ">
            <a href="<?= base_url("/connexion") ?>" class="text-muted">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
              </svg> Retour</a>
          </div>
          <div class="col mr-4">
            <button type='submit' class="btn px-3" style="background-color:#009CBB; color: white" ;>Réinitialiser le mot de passe
            <svg viewBox="0 0 1024 1024" height="14" class="icon mx-1" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#FFFF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M364.8 106.666667L298.666667 172.8 637.866667 512 298.666667 851.2l66.133333 66.133333L768 512z" fill="#FFFF"></path></g></svg> </button>
          </div>

        </div>


        </div>
    </form>
  </div>
</div>

<script>
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector("#password");

  const togglePassword2 = document.querySelector("#togglePassword2");
  const password2 = document.querySelector("#password2");

  togglePassword.addEventListener("click", function() {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");
  });

  togglePassword2.addEventListener("click", function() {
    // toggle the type attribute
    const type = password2.getAttribute("type") === "password" ? "text" : "password";
    password2.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");
  });
</script>