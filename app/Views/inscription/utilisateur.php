<div class="page page-center">
  <div class="container-tight py-4">
    <div class="text-center mb-4">
      <h1>Commen&ccedil;ons par le début, créez votre compte.</h1>
      <?php
      // if (session()->has('user')) {
      //     echo session('user')['email'];
      //     echo session('user')['mdp_1'];
      //     //echo session('id');
      // } else {
      //     echo 'no data';
      // }
      ?>
    </div>
    <form class="card card-md" id="myForm" action="<?= base_url("/inscription/utilisateur/saveUtilisateur"); ?>" method="POST">
      <div class="card-body">
        <div class="form-group mb-3 ">
          <label class="form-label required">Email</label>
          <div>
            <input type="email" id="email_user" name="email" class="form-control" aria-describedby="emailHelp" placeholder="" required>
            <?php if (session()->has("error_mail")) { ?>
              <span class="text-danger"><?= session("error_mail") ?></span>
            <?php } ?>
            <small class="form-hint">Adresse mail g&eacute;n&eacute;rique de votre structure.</small>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label required">
            Mot de passe
          </label>
          <div class="input-group input-group-flat">
            <input type="password" id="password" class="form-control" minlength="8" placeholder="Votre mot de passe" name="mdp_1" autocomplete="off" required>
            <span class="input-group-text">
              <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                <svg id="togglePassword" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg>
              </a>
            </span>
          </div>
          <small class="form-hint">Ce mot de passe vous permettra d'actualiser les informations de votre espace « structure » et de saisir le modérateur de la plateforme pour signaler un problème.</small>
        </div>
        <div class="mb-3">
          <label class="form-label required">
            Confirmation du mot de passe
          </label>
          <div class="input-group input-group-flat">
            <input type="password" id="password2" class="form-control" name="mdp_2" minlength="8" placeholder="R&eacute;p&eacute;tez votre mot de passe" autocomplete="off" required>
            <span class="input-group-text">
              <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                <svg id="togglePassword2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg>
              </a>
            </span>
          </div>
        </div>
        <?php if (session()->has("error_password")) { ?>
          <span class="text-danger"><?= session("error_password") ?></span>
        <?php } ?>
        <?php if (session()->has("error_empty")) { ?>
          <span class="text-danger"><?= session("error_empty") ?></span>
        <?php } ?>
        <div class="mb-3">
          <span>En créant votre compte, vous déclarez avoir pris connaissance et accepter :</span>
          <ul style="list-style-type: none;">
            <li style="margin-top: 0.25rem; padding-left: none;"><a target="_blank" href="<?= base_url("assets/pdf/agora-ce.argenteuil.fr _CGU_Juin.23-V.4.pdf"); ?>">Les CGU</a> de « AGORA »</li>
            <li><a href="#">Les Conditions d’inscription</a> de « AGORA »</li>
            <li><a href="#">La politique de protection des données personnelles</a> de « AGORA ».</li>
          </ul>
        </div>

        <div class="row mb-3">
          <div class="col d-flex justify-content-space-between align-items-center">
            <a href="<?= base_url('/inscription/choix') ?>" class="text-muted">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
              </svg> Retour</a>
          </div>
          <div class="col-8">
            <button type="submit" class="btn" style="background-color:#009CBB; color: white" ;>Accepter & <br>continuer l'inscription
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
              </svg> </button>
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


  // if (typeof(typeof(Storage) !== "undefined")) {
  //   //input
  //   var email_user = document.getElementById("email_user");
  //   var password = document.getElementById("password");
    
  //   var store_email_user = localStorage.getItem("email_user");
  //   var store_password = localStorage.getItem("password");

  //   //Input
  //   email_user.value = store_email_user;
  //   password.value = store_password;
    

  // }

  // document.getElementById("myForm").addEventListener("submit", function() {
  //   //input
  //   var email_user = document.getElementById("email_user").value;
  //   var password = document.getElementById("password").value;
    
  //   localStorage.setItem("email_user", email_user);
  //   localStorage.setItem("password", password);
  // });

</script>