<div class="page page-center">
  <div class="container-tight py-4">
    <div class="text-center mb-4">
      <h1>Changer Votre Mot de Passe</h1>
    </div>
    <form class="card card-md" action="<?= base_url("/inscription/updatePassword"); ?>" method="POST">
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">
            Nouveau Mot de passe
          </label>
          <div class="input-group input-group-flat">
            <input type="password" id="password" class="form-control myInput" placeholder="nouveau mot de passe" name="new_password" required>
            <span class="input-group-text">
              <a href="#" class="link-secondary" title="Show Password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                <svg id="togglePassword" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg>
              </a>
            </span>
          </div>
        </div>
        <div class="mb-4">
          <label class="form-label">
          Confirmer le nouveau mot de passe
          </label>
          <div class="input-group input-group-flat">
            <input type="password" id="password2" class="form-control myInput" placeholder=" Confirmer le nouveau mot de passe" name="confirm_password" required>
            <span class="input-group-text">
              <a href="#" class="link-secondary" title="Show Password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                <svg id="togglePassword2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg>
              </a>
            </span>

          </div>
          <?php if (session()->has("error_update_password")) { ?>
            <span class="text-danger"><?= session("error_update_password") ?></span>
          <?php } ?>
        </div>
        <div class="row mb-3">
          <button type="submit"  class="text-white btn btn-primary">
            Changer votre Mot de passe</button>
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