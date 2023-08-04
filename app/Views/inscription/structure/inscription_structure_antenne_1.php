<style>
  h1.sora {
    font-family: 'Sora';
    font-size: 30pt;
  }

  body {
    overflow: hidden;
  }

  .container-tight {
    overflow: hidden;
  }
</style>
<div class="page page-center">
  <div class="container-tight py-4">
    <div class="text-center mb-4">
      <h1>Ajouter une antenne? (Facultatif)</h1>
    </div>
    <div class="empty">
      <p class="empty-subtitle text-muted">
        L'antenne est une de vos adresses physiques pour accueillir les publics
      </p>
      <div class="empty-action">
        <a href="<?= base_url("/inscription/structure/inscriptionStructureAntenneZero"); ?>" class="btn btn-outline-primary">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
          </svg>
          Ajouter une antenne
        </a>
      </div>
    </div>

    <div class="col-8 mx-auto" style="position: fixed;left: 0;bottom: 0;width: 100%;text-align: center;">
      <div class="row mb-3">
        <div class="col">
          <a href="<?= base_url("/inscription/structure/inscriptionStructureZero"); ?>" class="text-secondary text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left mt-1" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
            </svg> Retour en arrière
          </a>
        </div>
        <div class="col">
          <a href="<?= base_url("inscription/structure/inscriptionStructureReferent"); ?>" class="btn btn-primary" style="padding-right: 5px;">
            Passer
            <span style="margin-right: 0; margin-left: 0;"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-right --><svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <polyline points="9 6 15 12 9 18" />
              </svg></span>
          </a>
        </div>
      </div>
    </div>

  </div>
</div>