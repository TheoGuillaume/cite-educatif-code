<?php
// var_dump(session("user"));
$photo_logo = session("photo_logo");
$photo_profil = session("photo_profil");
$val = "";
if (!empty($photo_logo)) {
  $val = $photo_logo;
} else {
  $val = $photo_profil;
}

?>
<style>
  
  .topnav-link:is(:link, :active, :visited).active {
    color: white;
    border-bottom: 3px solid white;

  }
</style>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Bienvenue - Cit&eacute; &eacute;ducative.</title>
  <link rel="icon" type="image/x-icon"  href="<?=base_url("static/logo_angora/Logo Agora blanc.png")?> " sizes="256x256">

  <!-- CSS files -->
  <link href="<?= base_url("dist/css/tabler.css"); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="<?= base_url("dist/css/tabler-flags.min.css"); ?>" rel="stylesheet" />
  <link href="<?= base_url("dist/css/tabler-payments.min.css"); ?>" rel="stylesheet" />
  <link href="<?= base_url("dist/css/tabler-vendors.min.css"); ?>" rel="stylesheet" />
  <link href="<?= base_url("dist/css/demo.min.css"); ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&family=Sora:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>

<body class=" border-top-wide d-flex flex-column">
  <div class="page page-center">
    <div class="container-fluid" style="padding-right: 0; padding-left: 0;">
      <div class="d-flex justify-content-space-between  my-2">
        <div>
          <img src="<?= base_url("static/logo_angora/logo-agora.png"); ?>" alt="" height="80" style="max-width:initial">

        </div>
        <div class="d-flex justify-content-center align-items-center">
          <span style="font-weight:bold; font-family: Sora ; font-size: 1rem">
          La plateforme des acteurs de la Cité éducative d’Argenteuil
          </span>
        </div>
      </div>
      <header class="navbar navbar-expand-md d-print-none" style="background-color: #0B1484;">
        <div class="container-xl">
          <a href="<?= base_url("/landingPage/landingPageTous"); ?>" class="topnav-link" onclick="activateLink(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door my-2" viewBox="0 0 16 16" color="white">
              <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
            </svg>
          </a>
          <a href="<?= base_url("/recherche/rechercheFiltre"); ?>" class="topnav-link" onclick="activateLink(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search my-2" viewBox="0 0 16 16" color="white">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
          </a>
          <a href="<?= base_url("/notification"); ?>" class="topnav-link" onclick="activateLink(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill my-2" viewBox="0 0 16 16" color="white">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
            </svg>
            <?php
            if ($notif['isa'] > 0) { ?>
              <span class="position-absolute  translate-middle badge rounded-pill bg-danger">
                <?php echo $notif['isa']; ?>
                <span class="visually-hidden">unread messages</span>
              </span>
            <?php } ?>
          </a>
          <?php
          if (!empty($val)) { ?>
            <a href="<?= base_url("/profil"); ?>" class="topnav-link" onclick="activateLink(this)">
              <span class="avatar avatar-sm my-2" style="border-radius: 50%;background-image: url(<?= base_url("upload/" . $val . ""); ?>)"></span>
            </a>
          <?php } else { ?>
            <a href="<?= base_url("/profil"); ?>" class="topnav-link" onclick="activateLink(this)">
              <span class="avatar avatar-sm my-2" style="border-radius: 50%;background-image: url(<?= base_url("static/logos/default.png"); ?>)"></span>
            </a>
          <?php } ?>

        </div>
      </header>

      <script>
        const activePage = window.location.pathname;
        const navLinks = document.querySelectorAll('div a').
        forEach(a => {
          if (a.href.includes(`${activePage}`)) {
            a.classList.add('active')
          }
        })
      </script>