<style>
  body * {
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
  }

  h1,
  h2 {
    font-family: 'Sora', sans-serif !important;
    font-weight: 500;

  }
</style>

<?php

use Config\App;

$monController = new \App\Controllers\LandingPage();
?>

<div class="mb-3" style="margin-top: 2rem;">
  <div class="card">
    <div class="container">
      <ul class="nav nav-pills mb-3  " id="pills-tab" role="tablist">
        <li class="nav-item w-50" role="presentation">
          <button class="nav-link active btn w-100 " style=" border-radius: 20px 0px 0px 20px ; border: 1px solid #0096ba" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Tout</a>
        </li>
        <li class="nav-item w-50" role="presentation">
          <button class="nav-link btn w-100" style=" border-radius: 0px 20px 20px 0px ;  border: 1px solid #0096ba" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Catégories</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="row">
            <div class="col-6"><a href="#" class="nav-link">
                <?php echo $count_struct ?> r&eacute;sutats</a></div>
            <div class="col-6">
              <div class="dropdown-menu" style="min-width:4rem; width: 40px!important;">
                <a class="dropdown-item" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="4" y1="6" x2="11" y2="6" />
                    <line x1="4" y1="12" x2="11" y2="12" />
                    <line x1="4" y1="18" x2="13" y2="18" />
                    <polyline points="15 9 18 6 21 9" />
                    <line x1="18" y1="6" x2="18" y2="18" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="12 8 12 12 14 14" />
                    <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                  </svg>
                </a>
                <a class="dropdown-item" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="4" y1="6" x2="13" y2="6" />
                    <line x1="4" y1="12" x2="11" y2="12" />
                    <line x1="4" y1="18" x2="11" y2="18" />
                    <polyline points="15 15 18 18 21 15" />
                    <line x1="18" y1="6" x2="18" y2="18" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="12 8 12 12 14 14" />
                    <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                  </svg>
                </a>
                <a class="dropdown-item" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 10v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4" />
                    <path d="M19 21h-4l4 -7h-4" />
                    <path d="M4 15l3 3l3 -3" />
                    <path d="M7 6v12" />
                  </svg>
                </a>
                <a class="dropdown-item" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 21v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4" />
                    <path d="M19 10h-4l4 -7h-4" />
                    <path d="M4 15l3 3l3 -3" />
                    <path d="M7 6v12" />
                  </svg>
                </a>
              </div>
              </a>
            </div>
          </div>

          <?php foreach ($structs as $struct) : ?>
            <div class="card card-structure">
              <div class="card-body">
                <div class="row g-3 align-items-center">
                  <div class="col-auto">
                    <div style="width:7.8rem;height:7rem;">
                      <img class=" object-fit-cover" width="100%" height="100%" src="<?= base_url("./upload/" . $struct["photo_logo"] . ""); ?>" onerror="this.src='<?= base_url('./static/logos/default.png'); ?>'">
                    </div>
                  </div>
                  <div class="col">
                    <h4 class="card-title m-0">
                      <a href="<?= base_url('/landingPage/landingPageDetail/' . $struct['id_utilisateur']) ?>">
                        <?= $struct['nom_social'] ?></a>
                    </h4>
                    <div class="text-muted">
                      <?php
                      foreach ($champ_actions as $champs_action) { ?>
                        <?php if ($struct["id_utilisateur"] == $champs_action["id_utilisateur"]) { ?>
                          <label><?= $champs_action["nom"]; ?> &nbsp;</label>
                        <?php } ?>
                      <?php } ?>

                    </div>
                    <div class="small mt-1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="11" r="3" />
                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                      </svg>

                      <?php
                      $isa = $monController->isaTerritoires($struct["id_utilisateur"]);
                      $territoires = $monController->findTerritoiresById($struct["id_utilisateur"]);
                      $isa_territores = $monController->countTerritoires();
                      if ($isa >= $isa_territores) { ?>
                        <label id="element">
                          Tous les quartiers
                        </label>
                      <?php } else { ?>
                        <?php foreach ($territoires as $territoire) { ?>
                          <label id="element">
                            <?= $territoire["nom"]; ?>
                          </label>
                        <?php } ?>
                      <?php } ?>


                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="dropdown">
                      <a href="#">
                        <img src="<?= base_url($struct['image_cat']); ?>" height="48px;">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php endforeach; ?>
          <div class="accordion" id="accordion-example">
            <div class="accordion-item">
              <div id="collapse-1" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                <div class="">
                  <?php foreach ($structs_plus as $structure) : ?>
                    <div class="card card-structure">
                      <div class="card-body">
                        <div class="row g-3 align-items-center">
                          <div class="col-auto">

                            <div style="width:7.8rem; height:7rem;">
                              <img class=" object-fit-cover" width="100%" height="100%" src="<?= base_url("./upload/" . $structure["photo_logo"] . ""); ?>" onerror="this.src='<?= base_url('./static/logos/default.png'); ?>'">
                            </div>

                          </div>
                          <div class="col">
                            <h4 class="card-title m-0">
                              <a href="<?= base_url('/landingPage/landingPageDetail/' . $structure['id_utilisateur']) ?>">
                                <?= $structure['nom_social'] ?></a>
                            </h4>
                            <div class="text-muted">
                              <?php
                              foreach ($champ_actions as $champs_action) { ?>
                                <?php if ($structure["id_utilisateur"] == $champs_action["id_utilisateur"]) { ?>
                                  <label><?= $champs_action["nom"]; ?> &nbsp;</label>
                                <?php } ?>
                              <?php } ?>

                            </div>
                            <div class="small mt-1">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="11" r="3" />
                                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                              </svg>

                              <?php
                              $isa = $monController->isaTerritoires($structure["id_utilisateur"]);
                              $territoires = $monController->findTerritoiresById($structure["id_utilisateur"]);
                              $isa_territores = $monController->countTerritoires();
                              if ($isa >= $isa_territores) { ?>
                                <label id="element">
                                  Tous les quartiers
                                </label>
                              <?php } else { ?>
                                <?php foreach ($territoires as $territoire) { ?>
                                  <label id="element">
                                    <?= $territoire["nom"]; ?>
                                  </label>
                                <?php } ?>
                              <?php } ?>


                            </div>
                          </div>
                          <div class="col-auto">
                            <div class="dropdown">
                              <a href="#">
                                <img src="<?= base_url($structure['image_cat']); ?>" height="48px;">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3 text-center" style="width:150px; margin: 0 auto;">
            <h2 class="accordion-header" id="heading-1">
              <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false">
                Afficher
              </button>
            </h2>
          </div>
        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="card">
            <div class="card-body">
              <div class="row g-2 align-items-center text-center">
                <?php foreach ($cs_categories as $cs_categorie) : ?>
                  <div class="col-6">
                    <a href="<?= base_url('/landingPage/landindPageResulatCategories/' . $cs_categorie['id']) ?>"><img src="<?= base_url($cs_categorie['image_cat']); ?>" height="128px"></a>
                    <p><?php echo $cs_categorie['nom'];  ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<script>
  var triggerTabList = [].slice.call(document.querySelectorAll('#pills-tab a'))
  triggerTabList.forEach(function(triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function(event) {
      event.preventDefault()
      tabTrigger.show()
    })
  })

  var triggerEl = document.querySelector('#myTab a[href="#profile"]')
  bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
</script>