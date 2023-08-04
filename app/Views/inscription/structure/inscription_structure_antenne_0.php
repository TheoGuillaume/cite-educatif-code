<style>
  body{
    overflow-y: hidden !important;
}
</style>
<div class="page page-center">
  <div class="container-tight py-4">
    <div class="text-center mb-4">
      <h1>Ajouter une antenne? (Facultatif).</h1>
    </div>
    <form class="card card-md" id="myForm" action="<?= base_url("/inscription/structure/inscriptionStructureAntenneZeroSave"); ?>" method="POST">
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">Adresse de l'antenne</label>
          <input oninput="fetchAddresses( 'adresse_principale' , 'adresse_principale_option' )" type="text" id="adresse_principale" name="adresse_principale" class="form-control" placeholder="Adresse de l'entrée publique de votre antenne">
          <select class="form-control" id="adresse_principale_option" style="display:none;" onchange="updateInputValue( 'adresse_principale' , 'adresse_principale_option' )">
            <option>Aucune</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label required">Email de l'antenne</label>
          <input type="email" id="email" class="form-control" name="email" placeholder="Adresse mail d'accueil de votreantenne" required>
        </div>
        <div class="mb-3">
          <label class="form-label required">T&eacute;l&eacute;phone de l'antenne</label>
          <input id="phoneOne" type="tel" class="form-control" name="tel" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" minlength="10" maxlength="10" placeholder="T&eacute;l&eacute;phone d'accueil de votre antenne" required>
        </div>
        <div class="py-2">
          <label class="form-label required">Horaire d'ouverture</label>
          <small class="form-hint">Jour et horaire d'ouverture de votre accueil physique</small>
          <div class="form-selectgroup" style="margin-top: 1rem;">
            <label class="form-check">
              <input class="form-check-input" id="semaine" type="checkbox" name="semaine" value="1">
              <span class="form-check-label">SEMAINE</span>
            </label>
          </div>
          <div class="form-selectgroup form-selectgroup-pills">
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
          <div class="form-selectgroup">
            <label class="form-check">
              <input class="form-check-input" id="weekend" type="checkbox" name="weekend" value="2">
              <span class="form-check-label">WEEKEND</span>
            </label>
          </div>
          <div class="form-selectgroup form-selectgroup-pills">
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
        <div class="py-2">
          <div class="form-selectgroup">
            <label class="form-check">
              <input class="form-check-input" id="vacance" type="checkbox" name="vacance" value="3">
              <span class="form-check-label">VACANCES <br>SCOLAIRES</span>
            </label>
          </div>
          <div class="form-selectgroup form-selectgroup-pills">
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
          <textarea class="form-control" id="desc_horraire_antenne" name="desc_horraire_antenne" maxlength="150" rows="6" placeholder="150 caract&egrave;res max."></textarea>
        </div>

       
          <div class="row mb-3">
            <div class="col-auto">
              <a href="<?= base_url("/inscription/structure/inscriptionStructureAntenneUn"); ?>" class="text-secondary text-decoration-none" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left mt-1" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                </svg> Retour en arrière</a href="">
            </div>
            <div class="col d-flex justify-content-end">
              <button type="submit" class="btn" style="background-color:#009CBB; color: white" ;>Suivant
              <svg viewBox="0 0 1024 1024" height="14" class="icon mx-1" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#FFFF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M364.8 106.666667L298.666667 172.8 637.866667 512 298.666667 851.2l66.133333 66.133333L768 512z" fill="#FFFF"></path></g></svg></button>
            </div>
          </div>

      </div>
    </form>
  </div>
</div>
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

  document.getElementById("phoneOne").addEventListener("input", function(event) {
    var phoneOne = event.target.value;
    phoneOne = phoneOne.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    phoneOne = phoneOne.replace(/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, '$1 $2 $3 $4 $5'); // Add spaces
    event.target.value = phoneOne;
  });

  if (typeof(typeof(Storage) !== "undefined")) {
    //input
    var adresse_principale = document.getElementById("adresse_principale");
    var email = document.getElementById("email");
    var phoneOne = document.getElementById("phoneOne");
    var desc_horraire_antenne = document.getElementById("desc_horraire_antenne");

    var store_adresse_principale = localStorage.getItem("adresse_principale");
    var store_email = localStorage.getItem("email");
    var store_phoneOne = localStorage.getItem("phoneOne");
    var store_desc_horraire_antenne = localStorage.getItem("desc_horraire_antenne");

    //Input
    adresse_principale.value = store_adresse_principale;
    email.value = store_email;
    phoneOne.value = store_phoneOne;
    desc_horraire_antenne.value = store_desc_horraire_antenne;


  }

  document.getElementById("myForm").addEventListener("submit", function() {
    //input
    var adresse_principale = document.getElementById("adresse_principale").value;
    var email = document.getElementById("email").value;
    var phoneOne = document.getElementById("phoneOne").value;
    var desc_horraire_antenne = document.getElementById("desc_horraire_antenne").value;

    localStorage.setItem("adresse_principale", adresse_principale);
    localStorage.setItem("email", email);
    localStorage.setItem("phoneOne", phoneOne);
    localStorage.setItem("desc_horraire_antenne", desc_horraire_antenne);
  });
</script>