<style>
   body * {
      font-family: 'Roboto', sans-serif;

   }

   h1,
   h2 {
      font-family: 'Sora', sans-serif !important;
      font-weight: 500;

   }
</style>

<body class=" border-top-wide d-flex flex-column">
   <div class="page page-center">
      <div class="container-fluid" style="padding-right: 0; padding-left: 0;">
         <div class="mb-3" style="margin-top: 2rem;">
            <div class="card" style="padding-right: 40px; padding-left: 40px;">

               <div class="mb-3 text-center">
                  <img class=" object-fit-cover rounded-circle image" width="150px" height="150px" src="<?= base_url("./upload/" . $structs["photo_logo"] . ""); ?>" onerror="this.src='<?= base_url('./static/logos/default.png'); ?>'">
               </div>

               <div class="mb-3 text-center" style="font-weight:900">
                  <h2> <?php echo $structs["nom_social"] ?></h2>
               </div>
               <div class="mb-3" style="font-weight:900">
                  <?php
                  if (!empty($structs["desc_mission"])) { ?>
                     <span><?php echo $structs["desc_mission"] ?></span>
                  <?php } else { ?>

                  <?php  }  ?>

               </div>
               <div class="mb-3" style="margin-top: 40px;font-weight:900">
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
               </div>
               <div class="mb-3" style="font-weight:900">
                  <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <circle cx="12" cy="11" r="3" />
                     <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                  </svg>

                  <?php
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
               <div class="mb-3">
                  <h4 style="font-weight:900">Champs d'action</h4>
                  <?php foreach ($champ_actions as $champ_action) { ?>
                     <label><?php echo $champ_action["nom"] ?>&#44;</label>
                  <?php } ?>
               </div>
               <div class="mb-3">
                  <h4 style="font-weight:900">Thématique</h4>
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
                  <h4>Territoire d'intervention</h4>
                  <?php foreach ($territoires as $territoire) { ?>
                     <label><?php echo $territoire["nom"] ?>&#44;</label>
                  <?php } ?>
               </div>
               <div class="mb-3">
                  <h4>Modalité d'intervention</h4>
                  <?php foreach ($modalites as $modalite) { ?>
                     <label><?php echo $modalite["nom"] ?>&#44;</label>
                  <?php } ?>

               </div>

               <div class="mb-3">
                  <h4>Horaire d'ouvertures</h4>
                  <?php
                  if (!empty($jour_horaires)) { ?>
                     <?php foreach ($jour_horaires as $jour_horaire) { ?>
                        <div class="form-selectgroup form-selectgroup-pills">
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label">
                                 <?php
                                 if ($jour_horaire["id_rang"] == 1) {
                                    echo "SEMAINE";
                                 }
                                 if ($jour_horaire["id_rang"] == 2) {
                                    echo "WEEKEND";
                                 }
                                 if ($jour_horaire["id_rang"] == 3) {
                                    echo "VACANCES";
                                 }
                                 ?>:

                              </span>
                           </label>&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?php echo $jour_horaire["matin"] ?></span>
                           </label>&nbsp;&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?php echo $jour_horaire["midi"] ?></span>
                           </label>&nbsp;&nbsp;
                           <label class="fform-selectgroup-item">
                              <span class="form-check-label"><?php echo $jour_horaire["soir"] ?></span>
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
               </div>
               

               <div class="mb-3 text-center">
                  <label><a href="<?= base_url("assets/pdf/agora-ce.argenteuil.fr-Formulaire_de_signalement_Juin.23-V.4.pdf"); ?>" target="_blank" style="color: #ff0000; text-decoration: underline;">
                        <svg class="me-2" width="18" height="18" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                           <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                           <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                           <g id="SVGRepo_iconCarrier">
                              <path style="fill:#FFF;" d="M3.43,468.339H508.57L256,42.671L3.43,468.339z"></path>
                              <g>
                                 <path style="fill:#ff0000;" d="M243.2,140.804v204.8c0,7.074,5.726,12.8,12.8,12.8c7.074,0,12.8-5.726,12.8-12.8v-204.8 c0-7.074-5.726-12.8-12.8-12.8C248.926,128.004,243.2,133.73,243.2,140.804z"></path>
                                 <path style="fill:#ff0000;" d="M278.17,43.669c-4.574-7.919-13.022-12.8-22.17-12.8s-17.596,4.881-22.17,12.8L3.43,442.731 c-4.574,7.919-4.574,17.681,0,25.6s13.022,12.8,22.17,12.8h460.8c9.148,0,17.596-4.881,22.17-12.8c4.574-7.919,4.574-17.681,0-25.6 L278.17,43.669z M25.6,455.539L256,56.469l230.4,399.061H25.6V455.539z"></path>
                                 <circle style="fill:#ff0000;" cx="256" cy="409.604" r="25.6"></circle>
                              </g>
                           </g>
                        </svg>Signaler le profil</a></label>
               </div>

            </div>
         </div>

      </div>
   </div>