<div id="row justify-content-center">
    <div class="container py-2">
        <div class=" mb-2">
            <h3>Contact pour la gestion de votre compte</h3>
        </div>
        <p class=" mb-4" style="font-weight:600">Afin d'assurer la r&eacute;ussite de cette plateforme et une actualisation des informations fournies, un membre de votre &eacute;quipe doit &ecirc;tre notre contact privil&eacute;gi&eacute;.</p>
        <form class="card card-md" id="myForm" action="<?= base_url("/updateReferent"); ?>" method="POST">
            
                <div class="mb-3">
                    <label class="form-label required">Fonction du r&eacute;f&eacute;rent</label>
                    <input type="text" id="fonction" class="form-control" name="fonction" value="<?= $referent['fonction'] ?>" placeholder="Fonction du r&eacute;f&eacute;rent de votre structure" required>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Nom du r&eacute;f&eacute;rent</label>
                    <input type="text" id="nom_referent" class="form-control" name="nom" value="<?= $referent['nom'] ?>" placeholder="Nom du r&eacute;f&eacute;rent de votre structure" required>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Pr&eacute;nom du r&eacute;f&eacute;rent</label>
                    <input type="text" id="prenom_referent" class="form-control" name="prenom" value="<?= $referent['prenom'] ?>"  placeholder="Pr&eacute;nom du r&eacute;f&eacute;rent de votre structure" required>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Email du r&eacute;f&eacute;rent</label>
                    <input type="email" id="email_referent" class="form-control" name="email" value="<?= $referent['email'] ?>" placeholder="Email du r&eacute;f&eacute;rent de votre structure" required>
                </div>
     
           
                <div class="mt-5"
               >
                    <button type="submit" class="btn p-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                        Enregistrer
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>