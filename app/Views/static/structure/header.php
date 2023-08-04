<style>
   .topnav-link.active {
      background-color: #333;
      color: #fff;
   }
</style>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
   <meta http-equiv="X-UA-Compatible" content="ie=edge" />
   <title>Bienvenue - Cit&eacute; &eacute;ducative.</title>
   <link rel="icon" type="image/x-icon" href="<?= base_url("static/logo_angora/Logo Agora blanc.png") ?> " sizes="256x256">
   <!-- CSS files -->
   <link href="<?= base_url("dist/css/tabler.css"); ?>" rel="stylesheet" />
   <link href="<?= base_url("dist/css/tabler-flags.min.css"); ?>" rel="stylesheet" />
   <link href="<?= base_url("dist/css/tabler-payments.min.css"); ?>" rel="stylesheet" />
   <link href="<?= base_url("dist/css/tabler-vendors.min.css"); ?>" rel="stylesheet" />
   <link href="<?= base_url("dist/css/demo.min.css"); ?>" rel="stylesheet" />
   <link href="<?= base_url("assets/fontawesome/css/all.min.css"); ?>" rel="stylesheet" />
   <link href="<?= base_url("assets/css/myStyle.css"); ?>" rel="stylesheet" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&family=Sora:wght@500&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>

<body class=" border-top-wide d-flex flex-column">
   <header class="navbar navbar-expand-md d-print-none" style="background-color: #0B1484; color: white">
      <div class="container d-flex">
         <a href="<?= base_url("/structure/modifier/structureModifierInformations"); ?>" style="color: white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
            </svg>Retour
         </a>
         <a style="font-weight:bolder; margin-right:5rem">
            Mes informations
         </a>
      </div>
   </header>
   <script>
      function activateLink(link) {
         const topnavLinks = document.querySelectorAll(".topnav-link");
         topnavLinks.forEach((link) => {
            link.classList.remove("active");
         });

         link.classList.add("active");
      }
   </script>