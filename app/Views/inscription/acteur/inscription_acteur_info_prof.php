<style>
  #display_image {
    width: 160px;
    height: 160px;
    border: 1px solid white;
    background-position: center;
    background-size: cover;
    display: flex;
    margin: auto;
    justify-content: center;
    align-items: center;

  }

  #doc {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
  }

  .wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    /* padding: 5px; */
    width: 100%;
    min-height: 100vh;
    /*background: #5691d5;*/
  }

  .box {
    max-width: 500px;
    background: #fff;
    width: 100%;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radiys: 5px;
    -ms-border-radiys: 5px;
    -o-border-radiys: 5px;
  }

  .upload-area-title {
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: 600;
  }

  .uploadlabel {
    width: 100%;
    min-height: 100px;
    background: #f5f4f4;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border-radius: 15px;
    padding: 30px;

  }

  .uploadlabel span {
    font-size: 40px;
    color: #2d3ec5;
    margin-bottom: 1rem;
  }

  .uploadlabel p {
    font-size: 20px;
    color: #5d5b5b;
    ;
    font-weight: 800;
    font-family: cursive;
  }

  .images_acteurs {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    background-color: #f4f4f4;
  }

  .uploaded {
    margin: 30px 0;
    font-size: 16px;
    font-weight: 700;
    color: #a5a5a5;
  }

  .showfilebox {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 10px 0;
    padding: 10px 15px;
    box-shadow: #0000000d 0px 0px 0px 1px,
      #d1d5db3d 0px 0px 0px 1px inset;
  }

  .showfilebox .left {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
  }

  .left h3 {
    font-weight: 600;
    font-size: 18px;
    color: #292F42;
    margin: 0;
  }

  .right span {
    background: #18a7ff;
    color: #fff;
    width: 25px;
    height: 25px;
    font-size: 25px;
    line-height: 25px;
    display: inline-block;
    text-align: center;
    font-weight: 700;
    cursor: pointer;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radiys: 50%;
    -ms-border-radiys: 50%;
    -o-border-radiys: 50%;
  }

  input[type="file"] {
    display: none;
  }

  .custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    background-color: blue;
    color: white;
    padding: 6px;
    cursor: pointer;
    border-radius: 50%;
    height: 40px;
    width: 40px;
  }
</style>

<div class="page page-center">
  <div class="container-tight py-4">
    <div class="text-center mb-4">
      <h1>Vos informations personnelles.</h1>
    </div>

    <form class="card card-md" enctype="multipart/form-data" action="<?= base_url("/inscription/acteur/inscriptionStructureActeurInfoProf"); ?>" method="post" autocomplete="off">
      <div class="text-center">
        <div>
          <?php
          $image_path = 'upload/';
          if (file_exists($image_path)) { ?>
            <div class="rounded-circle images_acteurs " id="display_image" style=" position: relative; ">
            </div>
          <?php } ?>
          <label for="file-upload" class="custom-file-upload position-absolute top-0 translate-middle" style=" margin-top: 2rem;  margin-left: 4rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
            <input id="file-upload" type="file" name="logo_acteurs" class="formFile" accept="image/png, image/jpg" />
          </label>
          <small style="font-size: 20px" class="form-label required text-center ">Choisissez un avatar pour vous repr&eacute;senter (facultatif)</small>
        </div>
      </div>

      <div class="card-body">
        <div class="mb-3">
          <label class="form-label required">Nom</label>
          <div>
            <input type="text" name="nom" class="form-control" aria-describedby="emailHelp" placeholder="Votre nom">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label required">Pr&eacute;nom</label>
          <div>
            <input type="text" name="prenom" class="form-control" aria-describedby="emailHelp" placeholder="Votre pr&eacute;nom">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label required">Poste</label>
          <div>
            <input type="text" name="poste" class="form-control" aria-describedby="emailHelp" placeholder="Votre poste au sein de votre structure">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label required">T&eacute;l&eacute;phone acteur</label>
          <div>
            <input type="tel" id="phone" name="tel_acteur" class="form-control" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" minlength="10" maxlength="10" placeholder="Numero de télèphone acteur">
          </div>
        </div>
        <div class="mb-3">

          <label class="form-label required">Structure &agrave; laquelle vous appartenez</label>
          <div>
            <!-- <input type="email" value='' class="form-control" aria-describedby="emailHelp" placeholder="Saisissez le nom de votre structure"> -->
            <select class="form-control" name="id_structure">
              <?php foreach ($structs as $struct) { ?>
                <option value="<?= $struct['id']  ?>"><?= $struct['id_utilisateur']  ?> <?= $struct['nom_social']  ?> <?= $struct['adresse_siege']  ?></option>
              <?php } ?>
            </select>

          </div>
          <div class="mb-3">
            <small>Si votre structure n'est pas r&eacute;f&eacute;renc&eacute;e, veuillez entrer manuellement le nom. Nous vous invitons à en informer votre responsable afin que votre équipe prenne pleine part à cet outil numérique au service de tous.</small>
          </div>
          <div class="row">
            <div class="col-auto">
              <a href="<?= base_url('/inscription/utilisateur'); ?>" class="text-secondary text-decoration-none"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <polyline points="15 6 9 12 15 18" />
                </svg> Retour en arri&egrave;re</a>
            </div>
            <div class="col d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Terminer</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
  const image_input = document.querySelector(".formFile");
  var uplaod_image = "";

  image_input.addEventListener("change", function() {
    const reader = new FileReader();
    reader.addEventListener("load", () => {
      uplaod_image = reader.result;
      document.querySelector("#display_image").style.backgroundImage = `url(${uplaod_image})`;
    });
    reader.readAsDataURL(this.files[0]);
  });


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
</script>