<style>
.empty{
  display: flex;
  justify-content: center;
  text-align: center;
  height: 40%;
}
</style>

<div class="page page-center">
  <div class="container-tight">
    <div class="text-center mb-4">
      <h1>F&eacute;licitations !</h1>
    </div>
    <h2 class="text-center">Votre demande de cr&eacute;ation du compte de votre structure est bien enregistrée.</h2>
    <div class="empty mb-3">
      <img src="<?= base_url("static/illustrations/Felicitations.svg"); ?>" height="250" alt="">
    </div>
    <h2 class="text-center">Vous recevrez tr&egrave;s prochainement un message de confirmation &agrave; l'adresse mail que vous nous avez fournie.</h2>
    <form id="myForm" action="<?= base_url("/sessionLogin"); ?>" method="get">
      <div class="card-footer text-end">
        <div class="d-flex">
          <button type="submit" class="btn btn-primary w-100">Continuer
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <polyline points="9 6 15 12 9 18" />
            </svg>
          </button>
        </div>
      </div>
    </form>

  </div>
</div>

<script>
  document.getElementById("myForm").addEventListener("submit", function() {
    //structure 0
    localStorage.removeItem('nom_social');
    localStorage.removeItem('sigle');
    localStorage.removeItem('siren');
    localStorage.removeItem('adresse_siege');
    localStorage.removeItem('adresse_principal');
    localStorage.removeItem('email_siege');
    localStorage.removeItem('phone');
    localStorage.removeItem('desc_horaire_ouverture');

    //antenne
    localStorage.removeItem('adresse_principale');
    localStorage.removeItem('email');
    localStorage.removeItem('phoneOne');
    localStorage.removeItem('desc_horraire_antenne');

    //referent
    localStorage.removeItem('fonction');
    localStorage.removeItem('nom_referent');
    localStorage.removeItem('prenom_referent');
    localStorage.removeItem('email_referent');

    //categorie
    localStorage.removeItem('id_categorie');

    //champs action
    localStorage.removeItem('champAction');
    localStorage.removeItem('desc_mission_structure');

    //thematique
    localStorage.removeItem('thematique');

    //public
    localStorage.removeItem('public');

    //particularite_action
    localStorage.removeItem('particularite_action');
    localStorage.removeItem('exemples_action');

    //territoire
    localStorage.removeItem('territoire');

    //modalite
    localStorage.removeItem('modalite');
  });
</script>