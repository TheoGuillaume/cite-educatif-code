<style>
  body {
    overflow: hidden !important;
  }
</style>
<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <h1>Inscrivez-vous pour accéder à notre agora digitale.</h1>
            <?php if (session()->has("error_entity_choix")) { ?>
                <?= session("error_entity_choix") ?>
            <?php } ?>
        </div>
        <h2 class="text-center mb-4">Veuillez préciser quel type de compte vous souhaitez ouvrir.</h2>
        <form action="<?= base_url("/inscription/utilisateur"); ?>" method="POST">
            <div class="mb-0">
                <input type="radio" name="id_utilisateur_categorie" value="2" id="btn1" class="btn-check">
                <label for="btn1" class="my-3 d-flex py-2" style=" margin-right:0.25rem;margin-left:0.25rem; border-radius:10px; border: 1px solid #0B1484">
                    <img src="<?= base_url("static/illustrations/Inscription-structures.svg"); ?>" height="100" style="padding:0 0.25rem" />
                    <span style="font-size: 1.2rem; " class="mt-3 mb-3"><b>Inscrire la structure éducative<br /> que je représente</b></span></label>
            </div>
            <div class="mb-3">
                <input type="radio" name="id_utilisateur_categorie" value="3" id="btn2" class="btn-check">
                <label for="btn2" class="my-3 d-flex py-2 " style=" margin-right:0.25rem;margin-left:0.25rem; border-radius:10px; border: 1px solid #0B1484">
                    <img src="<?= base_url("static/illustrations/Inscription-acteurs.svg"); ?>" height="100" style="padding:0 0.25rem" />
                    <span style="font-size: 1.2rem; " class="mt-3 mb-3"><b>M’inscrire individuellement <br />comme acteur éducatif</b></span></label>
            </div>

            <div class="row">
                <div class="mb-3">
                    <button type="submit" class="btn  w-100 mb-4 p-2 py-3" style="background-color: #00819c; color:white">
                        C'est parti !
                    </button>
                </div>
            </div>
        </form>
        <!--div class="mt-2">
          <button class="btn btn-primary w-100">C'est parti !</button>
        </div -->
        <div class="text-center text-muted mt-3">
            Vous avez besoin d'aide ? Consultez notre <a href="#" tabindex="-1">FAQ</a>
        </div>
    </div>
</div>