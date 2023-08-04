<style>
    input.empty {
        font-family: 'Helvetica', FontAwesome, sans-serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: inherit;
        text-align: left;

    }
</style>

<form action="<?= base_url("/rechercheResultat"); ?>" method="post">
    <div class="mb-3" style="margin-top: 2rem;">
        <div class="card" style="padding-right: 40px; padding-left: 40px;">
            <div class="mb-3">
                <div class="input-group mb-2">
                    <input type="text" name="recherche" class="form-control empty" placeholder="&#xF002; Recherche…" style="padding: 1rem">
                    <button type="submit" class="btn btn-link" style="border: 1px solid #0096ba ; background: #0096ba; border-radius: 0px 5px 5px 0px;">

                        <svg viewBox="0 0 20 20" width="18px" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill="#ffff" fill-rule="evenodd" d="M4 9a5 5 0 1110 0A5 5 0 014 9zm5-7a7 7 0 104.2 12.6.999.999 0 00.093.107l3 3a1 1 0 001.414-1.414l-3-3a.999.999 0 00-.107-.093A7 7 0 009 2z"></path>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Filtres</label>
            </div>

            <div class="mb-3">
                <h1>Champs d'action</h1>
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php
                    foreach ($cs_champ_actions as $cs_champ_action) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_champ_action[]" value="<?= $cs_champ_action['id'] ?>" class="form-selectgroup-input">
                            <span class="form-selectgroup-label"><?php echo $cs_champ_action['nom'];  ?></span>
                        </label>
                    <?php  } ?>
                    <div class="accordion" id="accordion-example">
                        <div class="accordion-item">
                            <div id="collapse-1" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <?php
                                    foreach ($champ_action_plus as $cs_chAction) { ?>
                                        <label class="form-selectgroup-item">
                                            <input type="checkbox" name="id_champ_action[]" value="<?= $cs_chAction['id'] ?>" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label"><?php echo $cs_chAction['nom'];  ?></span>
                                        </label>
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center" style="width:150px; margin: 0 auto;">
                    <h2 class="accordion-header" id="heading-1">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false">
                            Voir plus
                        </button>
                    </h2>
                </div>
            </div>

            <div class="mb-3">
                <h1>Thématiques éducatives</h1>
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php foreach ($cs_thematiques as $cs_thematique) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_thematique[]" value="<?= $cs_thematique['id'] ?>" class="form-selectgroup-input">
                            <span class="form-selectgroup-label"><?php echo $cs_thematique['nom']; ?></span>
                        </label>
                    <?php } ?>
                    <div class="accordion" id="accordion-example">
                        <div class="accordion-item">
                            <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <?php foreach ($thematique_plus as $themat) { ?>
                                        <label class="form-selectgroup-item">
                                            <input type="checkbox" name="id_thematique[]" value="<?= $themat['id'] ?>" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label"><?php echo $themat['nom']; ?></span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center" style="width:150px; margin: 0 auto;">
                    <h2 class="accordion-header" id="heading-2">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false">
                            Voir plus
                        </button>
                    </h2>
                </div>
            </div>

            <div class="mb-3">
                <h1>Les publics</h1>
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php foreach ($cs_publics as $cs_public) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_public[]" value="<?= $cs_public['id'] ?>" class="form-selectgroup-input">
                            <span class="form-selectgroup-label"><?php echo $cs_public['nom']; ?></span>
                        </label>
                    <?php } ?>
                    <div class="accordion" id="accordion-example">
                        <div class="accordion-item">
                            <div id="collapse-3" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <?php foreach ($public_plus as $pub) { ?>
                                        <label class="form-selectgroup-item">
                                            <input type="checkbox" name="id_public[]" value="<?= $pub['id'] ?>" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label"><?php echo $pub['nom']; ?></span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center" style="width:150px; margin: 0 auto;">
                    <h2 class="accordion-header" id="heading-3">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false">
                            Voir plus
                        </button>
                    </h2>
                </div>
            </div>

            <div class="mb-3">
                <h1>Particularités des actions</h1>
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php foreach ($cs_particularite_actions as $cs_particularite_action) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_particularite_action[]" value="<?= $cs_particularite_action['id'] ?>" class="form-selectgroup-input">
                            <span class="form-selectgroup-label"><?php echo $cs_particularite_action['nom']; ?></span>
                        </label>
                    <?php } ?>
                    <div class="accordion" id="accordion-example">
                        <div class="accordion-item">
                            <div id="collapse-4" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <?php foreach ($particulariter as $particulariters) { ?>
                                        <label class="form-selectgroup-item">
                                            <input type="checkbox" name="id_particularite_action[]" value="<?= $particulariters['id'] ?>" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label"><?php echo $particulariters['nom']; ?></span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center" style="width:150px; margin: 0 auto;">
                    <h2 class="accordion-header" id="heading-4">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false">
                            Voir plus
                        </button>
                    </h2>
                </div>
            </div>

            <div class="mb-3">
                <h1>Territoire d'intervention</h1>
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php foreach ($cs_territoires as $cs_territoire) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_territoire[]" value="<?= $cs_territoire['id'] ?>" class="form-selectgroup-input">
                            <span class="form-selectgroup-label"><?php echo $cs_territoire['nom']; ?></span>
                        </label>
                    <?php } ?>
                    <div class="accordion" id="accordion-example">
                        <div class="accordion-item">
                            <div id="collapse-5" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <?php foreach ($territoire_plus as $zone) { ?>
                                        <label class="form-selectgroup-item">
                                            <input type="checkbox" name="id_territoire[]" value="<?= $zone['id'] ?>" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label"><?php echo $zone['nom']; ?></span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center" style="width:150px; margin: 0 auto;">
                    <h2 class="accordion-header" id="heading-5">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false">
                            Voir plus
                        </button>
                    </h2>
                </div>
            </div>

            <div class="mb-3">
                <h1>Modalité</h1>
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php foreach ($cs_modalites as $cs_modalite) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_modalite[]" value="<?= $cs_modalite['id'] ?>" class="form-selectgroup-input">
                            <span class="form-selectgroup-label"><?php echo $cs_modalite['nom']; ?></span>
                        </label>
                    <?php } ?>
                    <div class="accordion" id="accordion-example">
                        <div class="accordion-item">
                            <div id="collapse-6" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <?php foreach ($modaliter_plus as $modal) { ?>
                                        <label class="form-selectgroup-item">
                                            <input type="checkbox" name="id_modalite[]" value="<?= $modal['id'] ?>" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label"><?php echo $modal['nom']; ?></span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center" style="width:150px; margin: 0 auto;">
                    <h2 class="accordion-header" id="heading-6">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false">
                            Voir plus
                        </button>
                    </h2>
                </div>
            </div>

        </div>
    </div>
</form>