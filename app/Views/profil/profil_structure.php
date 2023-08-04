<style>
   body * {
      font-family: 'Roboto', sans-serif;
   }

   h1,
   h2 {
      font-family: 'Sora', sans-serif !important;
      font-weight: 500;

   }

   input[type="file"] {
      display: none;
   }

   .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      background-color: blue;
      color: white;
      padding: 6px 12px;
      cursor: pointer;
      border-radius: 50%;
      height: 40px;
      width: 40px;
   }
</style>

<body class=" border-top-wide d-flex flex-column">
   <div class="page page-center">
      <div class="container-fluid" style="padding-right: 0; padding-left: 0;">
         <div class="mb-3" style="margin-top: 2rem;">
            <div class="card" style="padding-right: 40px; padding-left: 40px;">
               <div class="mb-3 text-center">
                  <div style="top: 50px; left: 3rem; position: relative;">
                     <form action="<?= base_url("/modifiePhotoProfil"); ?>" enctype="multipart/form-data" method="post">
                        <label for="file-upload" class="custom-file-upload">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                           </svg>
                        </label>
                        <input id="file-upload" type="file" onchange="this.form.submit()" name="photo_profil" />
                     </form>
                  </div>
                  <?php
                  if (!empty($structs["photo_logo"])) { ?>
                     <img src="<?= base_url("upload/" . $structs["photo_logo"] . ""); ?>" style=" object-fit: cover; height: 160; width: 160; border-radius: 50%;">
                  <?php } else { ?>
                     <img src="<?= base_url("static/logos/default.png"); ?>" style=" object-fit: cover; height: 160; width: 160; border-radius: 50%;">
                  <?php } ?>
               </div>
               <?php if (session()->has("erreur_extension")) { ?>
                  <span class="text-danger text-center"><?= session("erreur_extension") ?></span>
               <?php } ?>
               <?php if (session()->has("erreur_size_file")) { ?>
                  <span class="text-danger text-center"><?= session("erreur_size_file") ?></span>
               <?php } ?>

               <div class="mb-3 text-center">
                  <h1> <?php echo $structs["nom_social"] ?></h1>
               </div>
               <div class="d-block my-3">
                  <a href="<?= base_url("/structure/modifier/structureModifierInformations"); ?>" class="btn w-100 mb-3" style="background-color: #2895ab; display: inherit; color: white;padding-top: 12px; padding-bottom:12px">
                     <svg class="float-start" fill="#fff" width="16" height="16" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                           <path d="M 27.9999 51.9062 C 41.0546 51.9062 51.9063 41.0547 51.9063 28.0000 C 51.9063 14.9219 41.0312 4.0938 27.9765 4.0938 C 14.8983 4.0938 4.0937 14.9219 4.0937 28.0000 C 4.0937 41.0547 14.9218 51.9062 27.9999 51.9062 Z M 36.9765 21.5781 L 34.2812 18.8828 L 35.9452 17.2422 C 36.6952 16.5156 37.5390 16.4453 38.2187 17.125 L 38.7343 17.6406 C 39.4140 18.3203 39.3436 19.1406 38.6171 19.9140 Z M 20.6874 37.7969 L 17.5702 38.9687 C 17.0546 39.1562 16.5155 38.6875 16.7499 38.125 L 18.0390 35.1016 L 32.9218 20.2422 L 35.6171 22.9140 Z"></path>
                        </g>
                     </svg>&nbsp;Modifier mes informations
                  </a>
               </div>
               <div class="mb-3">
                  <?php
                  if (!empty($structs["desc_mission"])) { ?>
                     <span><?php echo $structs["desc_mission"] ?></span>
                  <?php } else { ?>

                  <?php  }  ?>
               </div>



               <div class="mb-3 " style="margin-top: 40px;">
                  <p style="font-weight:900">
                     <!-- Download SVG icon from http://tabler-icons.io/i/building -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="3" y1="21" x2="21" y2="21" />
                        <line x1="9" y1="8" x2="10" y2="8" />
                        <line x1="9" y1="12" x2="10" y2="12" />
                        <line x1="9" y1="16" x2="10" y2="16" />
                        <line x1="14" y1="8" x2="15" y2="8" />
                        <line x1="14" y1="12" x2="15" y2="12" />
                        <line x1="14" y1="16" x2="15" y2="16" />
                        <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
                     </svg> <?php echo $structs["nom"] ?>
                  </p>
               </div>
               <div class="mb-3" style="font-weight:900">
                  <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <circle cx="12" cy="11" r="3" />
                     <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                  </svg> <?php
                           if (!empty($structs["adresse_principale"])) { ?>
                     <?php echo $structs["adresse_principale"] ?>
                  <?php } else { ?>

                  <?php } ?>
               </div>
               <div class="mb-3" style="font-weight:900">
                  <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <rect x="3" y="5" width="18" height="14" rx="2" />
                     <polyline points="3 7 12 13 21 7" />
                  </svg> <?php echo $structs["email_siege"] ?>
               </div>
               <div class="mb-3" style="font-weight:900">
                  <!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                  </svg> <?php echo $structs["tel_siege"] ?>
               </div>
               <div class="mb-3" style="font-weight:900">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                     <path d="M3.6 9h16.8"></path>
                     <path d="M3.6 15h16.8"></path>
                     <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                     <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                  </svg> <a target="_blank" href="https://<?= $structs["site_web"] ?>"><?= $structs["site_web"] ?></a>
               </div>
               <div class="mb-3" style="font-weight:900">
                  <!-- Download SVG icon from http://tabler-icons.io/i/certificate -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <circle cx="15" cy="15" r="3" />
                     <path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5" />
                     <path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73" />
                     <line x1="6" y1="9" x2="18" y2="9" />
                     <line x1="6" y1="12" x2="9" y2="12" />
                     <line x1="6" y1="15" x2="8" y2="15" />
                  </svg> <?php echo $structs["siren"] ?>
               </div>
               <!-- <div class="mb-3 text-center">
                     <img src="./static/illustrations/Map-01.svg">
                  </div> -->
               <div class="mb-3">
                  <h4>Champs d'action</h4>
                  <?php foreach ($champ_actions as $champ_action) { ?>
                     <label><?php echo $champ_action["nom"] ?>&#44;</label>
                  <?php } ?>
               </div>
               <div class="mb-3">
                  <h4>Thématique</h4>
                  <?php foreach ($thematiques as $thematique) { ?>
                     <label><?php echo $thematique["nom"] ?>&#44;</label>
                  <?php } ?>
               </div>
               <div class="mb-3">
                  <h4>Public</h4>
                  <?php foreach ($publics as $public) { ?>
                     <label><?php echo $public["nom"] ?>&#44;</label>
                  <?php } ?>
               </div>
               <div class="mb-3">
                  <h4>Particularité de vos actions</h4>
                  <?php foreach ($particularite_actions as $particularite_action) { ?>
                     <label><?php echo $particularite_action["nom"] ?>&#44;</label>
                  <?php } ?>
               </div>
               <div class="mb-3">
                  <h4>Exemples d'actions</h4>
                  <label><?php echo $structs['exemples_action'] ?></label>
               </div>
               <div class="mb-3">
                  <h4>Horaire d'ouvertures</h4>
                  <?php
                  if (!empty($jour_horaires)) { ?>
                     <?php if (!empty($semaines)) { ?>
                        <div class="form-selectgroup form-selectgroup-pills">
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label">
                                 Semaine :
                              </span>
                           </label>&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?= $semaines['matin']; ?></span>
                           </label>&nbsp;&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?= $semaines['midi']; ?></span>
                           </label>&nbsp;&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?= $semaines['soir']; ?></span>
                           </label>&nbsp;&nbsp;
                        </div>
                     <?php } ?>
                     <br />

                     <?php if (!empty($weekends)) { ?>
                        <div class="form-selectgroup form-selectgroup-pills">
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label">
                                 Weekend :
                              </span>
                           </label>&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?= $weekends['matin'] ?></span>
                           </label>&nbsp;&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?= $weekends['midi'] ?></span>
                           </label>&nbsp;&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?= $weekends['soir'] ?></span>
                           </label>&nbsp;&nbsp;
                        </div>
                     <?php } ?>
                     <br />

                     <?php if (!empty($vacances)) { ?>
                        <div class="form-selectgroup form-selectgroup-pills">
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label">
                                 Vacance :
                              </span>
                           </label>&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?= $vacances['matin'] ?></span>
                           </label>&nbsp;&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?= $vacances['midi'] ?></span>
                           </label>&nbsp;&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?= $vacances['soir'] ?></span>
                           </label>&nbsp;&nbsp;
                        </div>
                     <?php } ?>
                  <?php } else { ?>
                  <?php } ?>

               </div>

               <div class="mb-3">
                  <h4>Documents</h4>
                  <p>
                     
                     <?php if (!empty($files)) { ?>
                        <?php for ($i=0; $i < count($files) ; $i++) { 
                           $path = base_url("uploads/" .$files[$i]["nom_file"]. "");
                           echo "<a target='_blank' href='".$path."' class='btn border-0' style='background-color: #f4f4f8; border-radius: 15px;font-size:0.8rem; padding-top:16px;padding-bottom:16px' type='button'> <strong>".$files[$i]["name_file"]."</strong> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>                               <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z' />                               <path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z' /></svg></a><br> <br>";
                        } ?>
                     <?php } else { ?>

                     <?php  } ?>
                  </p>
                  <div class="d-block my-3">
                     <a href="<?= base_url("/logout"); ?>" class="btn w-100 mb-3" style="background: initial; display: inherit; border:1px solid  red; color: red; padding-top: 14px; padding-bottom:14px">
                        <svg class="float-start" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="float: right;">
                           <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                           <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>&nbsp; Se déconnecter
                     </a>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>