<div id="row justify-content-center">
    <div class="container mb-5">
        <div class="text-center">
            <h1 style="font-weight: 800; color: #202020; font-size: 30px">Commençons par le début, créez votre compte</h1>
        </div>

    </div>

    <form class="container">
        <!-- Email input -->
        <div class="form-outline mb-2">
            <label class="form-label" for="form2Example1">Email<span class="text-danger">*</span></label>
            <input type="email" id="form2Example1" placeholder="Adresse mail de votre structure" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-2">
            <label class="form-label" for="form2Example2">Mot de passe<span class="text-danger">*</span></label>
            <input type="password" id="form2Example2" placeholder="Mot de passe" class="form-control" />
        </div>

        <!-- Confirm Password input -->
        <div class="form-outline mb-5">
            <label class="form-label" for="form2Example2">Confirmation du mot de passe<span class="text-danger">*</span></label>
            <input type="password" id="form2Example2" placeholder="Répétez votre mot de passe" class="form-control" />
        </div>

        <!-- Register buttons -->
        <div class=" mt-5 mb-2">
            <p class="text-muted">
                <input required class="form-check-input " type="checkbox" value="" id="flexCheckDefault"> J'ai lu et j'accepte les
                <a href="#!" style="color: #009CBB;">conditions d'inscription et politique de protection des donnés</a>
            </p>
            <p class="text-muted">
                <input required class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> J'ai lu et j'accepte les
                <a href="#!" style="color: #009CBB;">conditions générales d'utilisations</a>
            </p>
        </div>

        <footer style="
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;">
            <div class="row mb-3">
                <div class="col">
                    <button type="button" class="btn btn-light ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        </svg> Retour en arrière</button>
                </div>
                <div class="col">
                    <button type="button" class="btn" style="background-color:#009CBB; color: white" ;>Suivant
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg> </button>
                </div>
            </div>

        </footer>

    </form>
</div>