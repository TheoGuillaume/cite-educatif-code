<style>
  h1.sora {
    font-family: 'Sora';
    font-size: 30pt;
  }
  body::-webkit-scrollbar {
    width: 0.5em !important;
    background-color: #F5F5F5 !important;
  }

  body::-webkit-scrollbar-thumb {
    background-color: #999999 !important;
  }

  body::-webkit-scrollbar-thumb:hover {
    background-color: #777777 !important;
  }

  body {
    overflow: hidden !important;
  }
</style>


<div class="page page-center">
  <div class="container-tight py-4">
    <div class="text-center mb-4">
      <h1 class="sora">Bienvenue sur Agora </h1>
    </div>
    <h2 class="card-title text-center mb-4" style="line-height: 1.6rem !important;">Connectez-vous pour accéder à notre Plateforme digitale!</h2>
    <div class="text-center mb-4">
      <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url("static/illustrations/Connexion-01.svg"); ?>" height="200" alt=""></a>
    </div>
    <?php if (session()->has("info_inscritiption")) { ?>
      <div class="alert alert-primary" role="alert">
        <?= session("info_inscritiption") ?>
      </div>
    <?php } ?>
    
    <form class="card card-md" action="<?= base_url("/login"); ?>" method="POST">
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="Votre adresse email" name="email" required>
          <?php if (session()->has("error_empty")) { ?>
            <span class="text-danger"><?= session("error_empty") ?></span>
          <?php } ?>
        </div>
        <div class="mb-2">
          <label class="form-label">
            Mot de passe
          </label>
          <div class="input-group input-group-flat">
            <input type="password" id="password" class="form-control myInput" placeholder="Votre mot de passe" name="mdp_1" required>
            <span class="input-group-text">
              <a href="#" class="link-secondary" title="Show Password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                <svg id="togglePassword" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg>
              </a>
            </span>

          </div>
          <?php if (session()->has("error_password")) { ?>
            <span class="text-danger"><?= session("error_password") ?></span>
          <?php } ?>
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100" style="font-size: 16pt;">Se connecter</button>
        </div>
      </div>
    </form>
    <div class="text-center text-muted mt-2">
       <b> <a href="<?= base_url('inscription/password') ?>" tabindex="-1">Mot de passe oublié</a></b>
    </div>
    <div class="text-center text-muted mt-3">
      <b>Vous n'avez pas encore de compte ?<br />
        <a href="inscription/choix" tabindex="-1">S'inscrire</a></b>
    </div>
  </div>
</div>
<script>
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector("#password");

  togglePassword.addEventListener("click", function() {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // toggle the icon
    this.classList.add("bi-eye");
  });
</script>