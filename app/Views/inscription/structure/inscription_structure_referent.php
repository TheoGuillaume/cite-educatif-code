<style>
  body{
    overflow-y: hidden !important;
}
</style>
<div class="page page-center">
      <div class="container-tight py-2"> 
        <div class="text-center mb-4">
          <h1>Contact pour la gestion de votre compte</h1>
        </div>
        <p class="text-center mb-3">Afin d'assurer la r&eacute;ussite de cette plateforme et une actualisation des informations fournies, un membre de votre &eacute;quipe doit &ecirc;tre notre contact privil&eacute;gi&eacute;.</p>
        <form class="card card-md" id="myForm" action="<?= base_url("/inscription/structure/inscriptionStructureReferentSave"); ?>" method="POST">
          
            <div class="mb-3">
                <label class="form-label required">Fonction du r&eacute;f&eacute;rent</label>
                <input type="text" id="fonction" class="form-control" name="fonction" placeholder="Fonction du r&eacute;f&eacute;rent de votre structure" required>
            </div>
            <div class="mb-3">
                <label class="form-label required">Nom du r&eacute;f&eacute;rent</label>
                <input type="text" id="nom_referent" class="form-control" name="nom" placeholder="Nom du r&eacute;f&eacute;rent de votre structure" required>
            </div>
            <div class="mb-3">
                <label class="form-label required">Pr&eacute;nom du r&eacute;f&eacute;rent</label>
                <input type="text" id="prenom_referent" class="form-control" name="prenom" placeholder="Pr&eacute;nom du r&eacute;f&eacute;rent de votre structure" required>
            </div>
            <div class="mb-3">
                <label class="form-label required">Email du r&eacute;f&eacute;rent</label>
                <input type="email" id="email_referent" class="form-control" name="email" placeholder="Email du r&eacute;f&eacute;rent de votre structure" required>
            </div>
          
              <div class="row mt-5 mb-3">
                <div class="col">
                  <a href="<?= base_url("/inscription/structure/inscriptionStructureAntenneZero"); ?>" class="text-secondary text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left mt-1" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg> Retour en arrière</a>
                </div>
                <div class="col d-flex justify-content-end">
                  <button type="submit" class="btn" style="background-color:#009CBB; color: white" ;>Suivant 
                  <svg viewBox="0 0 1024 1024" height="14" class="icon mx-1" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#FFFF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M364.8 106.666667L298.666667 172.8 637.866667 512 298.666667 851.2l66.133333 66.133333L768 512z" fill="#FFFF"></path></g></svg> </button>
                </div>
              </div>
        </form>
      </div>
</div>
<script>

if(typeof(typeof(Storage) !== "undefined")){
    //input
    var fonction = document.getElementById("fonction");
    var nom_referent = document.getElementById("nom_referent");
    var prenom_referent = document.getElementById("prenom_referent");
    var email_referent = document.getElementById("email_referent");

    var store_fonction = localStorage.getItem("fonction");
    var store_nom_referent = localStorage.getItem("nom_referent");
    var store_prenom_referent = localStorage.getItem("prenom_referent");
    var store_email_referent = localStorage.getItem("email_referent");

    //Input
    fonction.value = store_fonction;
    nom_referent.value = store_nom_referent;
    prenom_referent.value = store_prenom_referent;
    email_referent.value = store_email_referent;
}

document.getElementById("myForm").addEventListener("submit", function() {
        //input
        var fonction = document.getElementById("fonction").value;
        var nom_referent = document.getElementById("nom_referent").value;
        var prenom_referent = document.getElementById("prenom_referent").value;
        var email_referent = document.getElementById("email_referent").value;

        localStorage.setItem("fonction", fonction);
        localStorage.setItem("nom_referent", nom_referent);
        localStorage.setItem("prenom_referent", prenom_referent);
        localStorage.setItem("email_referent", email_referent);
});
</script>