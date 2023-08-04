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
    <div class="nav nav-fill" data-bs-toggle="tabs" style="margin-right: 20px; margin-left: 20px;">
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active show" id="tabs-home-14">
          <div class="row">
            <div class="col-6"><a href="#" class="nav-link">
                <?php echo count($result_structs) ?> r&eacute;sutats</a></div>
            <div class="col-6"><!--a href="#" class="nav-link" style="float: right;" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tri par <span style="padding-left: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                  </svg></span-->
              <div class="dropdown-menu" style="min-width:4rem; width: 40px!important;">
                <a class="dropdown-item" href="#">
                  <!-- Download SVG icon from http://tabler-icons.io/i/sort-ascending -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="4" y1="6" x2="11" y2="6" />
                    <line x1="4" y1="12" x2="11" y2="12" />
                    <line x1="4" y1="18" x2="13" y2="18" />
                    <polyline points="15 9 18 6 21 9" />
                    <line x1="18" y1="6" x2="18" y2="18" />
                  </svg> <!-- Download SVG icon from http://tabler-icons.io/i/history -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="12 8 12 12 14 14" />
                    <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                  </svg>
                </a>
                <a class="dropdown-item" href="#">
                  <!-- Download SVG icon from http://tabler-icons.io/i/sort-descending -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="4" y1="6" x2="13" y2="6" />
                    <line x1="4" y1="12" x2="11" y2="12" />
                    <line x1="4" y1="18" x2="11" y2="18" />
                    <polyline points="15 15 18 18 21 15" />
                    <line x1="18" y1="6" x2="18" y2="18" />
                  </svg> <!-- Download SVG icon from http://tabler-icons.io/i/history -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="12 8 12 12 14 14" />
                    <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                  </svg>
                </a>
                <a class="dropdown-item" href="#">
                  <!-- Download SVG icon from http://tabler-icons.io/i/sort-ascending-letters -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 10v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4" />
                    <path d="M19 21h-4l4 -7h-4" />
                    <path d="M4 15l3 3l3 -3" />
                    <path d="M7 6v12" />
                  </svg>
                </a>
                <a class="dropdown-item" href="#">
                  <!-- Download SVG icon from http://tabler-icons.io/i/sort-descending-letters -->
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

          <?php foreach ($result_structs as $struct) { ?>
            <div class="card card-structure">
              <div class="card-body">
                <div class="row g-2 align-items-center">
                  <div class="col-auto">
                    <?php
                    if (!empty($struct["photo_logo"])) { ?>
                      <span class="avatar avatar-lg" style="background-image: url(<?= base_url("./upload/" . $struct["photo_logo"] . ""); ?>)"></span>
                    <?php } else { ?>
                      <span class="avatar avatar-lg" style="background-image: url(<?= base_url("./static/logos/default.png"); ?>)"></span>
                    <?php } ?>
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
                      <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
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
          <?php } ?>


        </div><!-- Catégorie -->

      </div>
    </div>
  </div>
</div>