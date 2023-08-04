<style>
  body {
    overflow-y: hidden !important;
  }
</style>
<div class="page page-center">
  <div class="container-tight py-4">
    <div class="text-center mb-4">
      <h1>Continuons avec votre structure</h1>
    </div>
    <form class="card card-md" id="myForm" action='<?= base_url('/inscription/structure/inscriptionStructureZeroSave') ?>' method="POST">
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label required">D&eacute;nomination sociale</label>
          <input type="text" id="nom_social" class="form-control" name="nom_social" placeholder="Ex: Association A" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Sigle ou d&eacute;nomination publique de votre structure</label>
          <input type="text" id="sigle" class="form-control" name="sigle" placeholder="Ex: ABC">
        </div>
        <div class="mb-3">
          <label class="form-label required">SIREN de votre structure</label>
          <input id="siren" type="text" class="form-control" pattern="[0-9]{9}" name="siren" placeholder="Les neuf (09) chiffres du num&eacute;ro SIREN" minlength="9" maxlength="9" required>
          <small class="form-hint">Vous pouvez trouver votre numéro SIREN sur le site <a href="https://www.societe.com" target="_blank">www.societe.com</a>, sinon merci d'indiquer celui de la ville d'Argenteuil.</small>
        </div>
        <div class="mb-3">
          <label class="form-label required">Adresse du si&egrave;ge social</label>
          <input oninput="fetchAddresses( 'adresse_siege' , 'adresse_siege_option' )" type="text" id="adresse_siege" name="adresse_siege" class="form-control" placeholder="L'adresse de votre si&egrave;ge social" required>
          <ul id="adresse_siege_option" class="suggestions-list" style="display:none;">

          </ul>
        </div>

        <div class=" mb-3 markdown">
          <h4>Comment les publics peuvent vous contacter:</h4>
        </div>
        <div class="mb-3">
          <label class="form-label">Adresse principale (si diff&eacute;rente du si&egrave;ge social)</label>
          <input oninput="fetchAddresses( 'adresse_principal' , 'adresse_principal_option' )" type="text" id="adresse_principal" name="adresse_principal" class="form-control" placeholder="Votre adresse principale">
          <ul id="adresse_principal_option" class="suggestions-list" style="display:none;">

          </ul>
        </div>

        <div class="mb-3">
          <label class="form-label required">Email d'accueil</label>
          <input type="email" id="email_siege" name="email_siege" class="form-control" placeholder="Adresse mail d'accueil de votre antenne" required>
        </div>
        <div class="mb-3">
          <label class="form-label required">T&eacute;l&eacute;phone d'accueil</label>
          <input type="tel" id="phone" name="tel_siege" class="form-control" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" minlength="10" maxlength="10" placeholder="Num&eacute;ro fr t&eacute;l&eacute;phone d'accueil du votre antenne">
        </div>
        <div class=" py-2">
          <label class="form-label required">Horaire d'ouverture</label>
          <small class="form-hint">Jour et horaire d'ouverture de votre accueil physique</small>
          <div class="form-selectgroup" style="margin-top: 1rem;">
            <label class="form-check">
              <input class="form-check-input" id="semaine" type="checkbox" name="semaine" value="1">
              <span class="form-check-label">SEMAINE</span>
            </label>
          </div>
          <div class="form-selectgroup form-selectgroup-pills" style="float:right;">
            <label class="form-selectgroup-item">
              <input type="checkbox" name="matin_semaine" value="matin" class="form-selectgroup-input semaine" disabled>
              <span class="form-selectgroup-label">Matin</span>
            </label>
            <label class="form-selectgroup-item">
              <input type="checkbox" name="midi_semaine" value="midi" class="form-selectgroup-input semaine" disabled>
              <span class="form-selectgroup-label">Apr&egrave;s-midi</span>
            </label>
            <label class="form-selectgroup-item">
              <input type="checkbox" name="soir_semaine" value="soir" class="form-selectgroup-input semaine" disabled>
              <span class="form-selectgroup-label">Soir</span>
            </label>
          </div>
        </div>
        <div class="py-2">
          <div class="form-selectgroup" style="margin-top: 1rem;">
            <label class="form-check">
              <input class="form-check-input" id="weekend" type="checkbox" name="weekend" value="2">
              <span class="form-check-label">WEEKEND</span>
            </label>
          </div>
          <div class="form-selectgroup form-selectgroup-pills" style="float:right;">
            <label class="form-selectgroup-item">
              <input type="checkbox" name="matin_weekend" value="matin" class="form-selectgroup-input weekend" disabled>
              <span class="form-selectgroup-label">Matin</span>
            </label>
            <label class="form-selectgroup-item">
              <input type="checkbox" name="midi_weekend" value="midi" class="form-selectgroup-input weekend" disabled>
              <span class="form-selectgroup-label">Apr&egrave;s-midi</span>
            </label>
            <label class="form-selectgroup-item">
              <input type="checkbox" name="soir_weekend" value="soir" class="form-selectgroup-input weekend" disabled>
              <span class="form-selectgroup-label">Soir</span>
            </label>
          </div>
        </div>
        <div class="py-3">
          <div class="form-selectgroup" style="margin-top: 1rem;">
            <label class="form-check">
              <input class="form-check-input" id="vacance" type="checkbox" name="vacance" value="3">
              <span class="form-check-label">VACANCES <br>SCOLAIRES</span>
            </label>
          </div>
          <div class="form-selectgroup form-selectgroup-pills" style="float:right;">
            <label class="form-selectgroup-item">
              <input type="checkbox" name="matin_vacance" value="matin" class="form-selectgroup-input vacance" disabled>
              <span class="form-selectgroup-label">Matin</span>
            </label>
            <label class="form-selectgroup-item">
              <input type="checkbox" name="midi_vacance" value="midi" class="form-selectgroup-input vacance" disabled>
              <span class="form-selectgroup-label">Apr&egrave;s-midi</span>
            </label>
            <label class="form-selectgroup-item">
              <input type="checkbox" name="soir_vacance" value="soir" class="form-selectgroup-input vacance" disabled>
              <span class="form-selectgroup-label">Soir</span>
            </label>
          </div>
        </div>
        <?php if (session()->has("error_empty_rang")) { ?>
          <span class="text-danger"><?= session("error_empty_rang") ?></span>
        <?php } ?>
        <div class="mb-3">
          <label class="form-label">Une pr&eacute;cision sur vos horaires d'ouverture?</label>
          <textarea class="form-control" id="desc_horaire_ouverture" name="desc_horaire_ouverture" maxlength="150" rows="6" placeholder="150 caract&egrave;res max."></textarea>
        </div>


        <div class="row mb-3">
          <div class="col-auto">
            <a href="<?= base_url("/inscription/utilisateur") ?>" class="text-secondary text-decoration-none ">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left mt-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
              </svg> Retour en arrière</a>
          </div>
          <div class="col d-flex justify-content-end">
            <button type="submit" class="btn py-2 " style="background-color:#009CBB; color: white" ;>Suivant
              <svg viewBox="0 0 1024 1024" height="14" class="icon mx-1" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#FFFF">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path d="M364.8 106.666667L298.666667 172.8 637.866667 512 298.666667 851.2l66.133333 66.133333L768 512z" fill="#FFFF"></path>
                </g>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<style>
  /* Votre CSS pour la liste de suggestions avec cadre */
  .suggestions-list {
    list-style: none;
    padding: 0;
    margin: 0;
    border: 1px solid #ccc;
    /* Ajouter un cadre autour de la liste de suggestions */
    border-radius: 5px;
    /* Arrondir les coins du cadre */
    max-height: 150px;
    /* Limiter la hauteur de la liste pour la faire défiler si nécessaire */
    overflow-y: auto;
    /* Ajouter une barre de défilement si la liste dépasse la hauteur définie */
  }

  .suggestions-list li {
    padding: 10px;
    border-bottom: 1px solid #ccc;
  }

  .suggestions-list li:last-child {
    border-bottom: none;
    /* Ne pas ajouter de bordure en bas pour le dernier élément */
  }
</style>
<script>
  var semaineCheck = document.getElementById('semaine');
  var checkboxeSemaine = document.querySelectorAll('.semaine');

  var weekendCheck = document.getElementById('weekend');
  var checkboxeWeekend = document.querySelectorAll('.weekend');

  var vacanceCheck = document.getElementById('vacance');
  var checkboxeVacance = document.querySelectorAll('.vacance');

  if (semaineCheck.checked == true) {
    checkboxeSemaine.forEach(function(checkbox) {
      checkbox.disabled = false;
    });
  }

  if (weekendCheck.checked == true) {
    checkboxeWeekend.forEach(function(checkbox) {
      checkbox.disabled = false;
    });
  }

  if (vacanceCheck.checked == true) {
    checkboxeVacance.forEach(function(checkbox) {
      checkbox.disabled = false;
    });
  }

  //Semaine addEventListener
  semaineCheck.addEventListener('change', function() {
    if (this.checked) {
      checkboxeSemaine.forEach(function(checkbox) {
        checkbox.disabled = false;
      });
    } else {
      checkboxeSemaine.forEach(function(checkbox) {
        checkbox.disabled = true;
        checkbox.checked = false;
      });
    }
  });

  //Weekend
  weekendCheck.addEventListener('change', function() {
    if (this.checked) {
      checkboxeWeekend.forEach(function(checkbox) {
        checkbox.disabled = false;
      });
    } else {
      checkboxeWeekend.forEach(function(checkbox) {
        checkbox.disabled = true;
        checkbox.checked = false;
      });
    }
  });

  // //Vacance
  vacanceCheck.addEventListener('change', function() {
    if (this.checked) {
      checkboxeVacance.forEach(function(checkbox) {
        checkbox.disabled = false;
      });
    } else {
      checkboxeVacance.forEach(function(checkbox) {
        checkbox.disabled = true;
        checkbox.checked = false;
      });
    }
  });

  // phone number standard

  document.getElementById("phone").addEventListener("input", function(event) {
    var phone = event.target.value;
    phone = phone.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    phone = phone.replace(/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, '$1 $2 $3 $4 $5'); // Add spaces
    event.target.value = phone;
  });
  document.getElementById("siren").addEventListener("input", function(event) {
    var siren = event.target.value;
    siren = siren.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    event.target.value = siren;
  });

  if (typeof(typeof(Storage) !== "undefined")) {
    //input
    var nom_social = document.getElementById("nom_social");
    var sigle = document.getElementById("sigle");
    var siren = document.getElementById("siren");
    var adresse_siege = document.getElementById("adresse_siege");
    var adresse_principal = document.getElementById("adresse_principal");
    var email_siege = document.getElementById("email_siege");
    var tel_siege = document.getElementById("phone");
    var desc_horaire_ouverture = document.getElementById("desc_horaire_ouverture");

    var store_nom_social = localStorage.getItem("nom_social");
    var store_sigle = localStorage.getItem("sigle");
    var store_siren = localStorage.getItem("siren");
    var store_adresse_siege = localStorage.getItem("adresse_siege");
    var store_adresse_principal = localStorage.getItem("adresse_principal");
    var store_email_siege = localStorage.getItem("email_siege");
    var store_tel_siege = localStorage.getItem("phone");
    var store_desc_horaire_ouverture = localStorage.getItem("desc_horaire_ouverture");

    //Input
    nom_social.value = store_nom_social;
    sigle.value = store_sigle;
    siren.value = store_siren;
    adresse_siege.value = store_adresse_siege;
    adresse_principal.value = store_adresse_principal;
    email_siege.value = store_email_siege;
    tel_siege.value = store_tel_siege;
    desc_horaire_ouverture.value = store_desc_horaire_ouverture;

  }


  document.getElementById("myForm").addEventListener("submit", function() {
    //input
    var nom_social = document.getElementById("nom_social").value;
    var sigle = document.getElementById("sigle").value;
    var siren = document.getElementById("siren").value;
    var adresse_siege = document.getElementById("adresse_siege").value;
    var adresse_principal = document.getElementById("adresse_principal").value;
    var email_siege = document.getElementById("email_siege").value;
    var tel_siege = document.getElementById("phone").value;
    var desc_horaire_ouverture = document.getElementById("desc_horaire_ouverture").value;

    localStorage.setItem("nom_social", nom_social);
    localStorage.setItem("sigle", sigle);
    localStorage.setItem("siren", siren);
    localStorage.setItem("adresse_siege", adresse_siege);
    localStorage.setItem("adresse_principal", adresse_principal);
    localStorage.setItem("email_siege", email_siege);
    localStorage.setItem("phone", tel_siege);
    localStorage.setItem("desc_horaire_ouverture", desc_horaire_ouverture);
    //input

    //chekbox

    //chekbox

  });
</script>