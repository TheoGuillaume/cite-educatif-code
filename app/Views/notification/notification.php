<br>
<div class="container">
    <h2>Notifications</h2>
    <?php foreach ($notifications as $notification) { ?>
        <div class="d-flex">
            <div class="mx-2">
                <?php if (!empty($notification['photo_profil'])) { ?>
                    <img src="<?= base_url("upload/" . $notification["photo_profil"] . ""); ?>" style="width:60px" class="rounded-circle image">
                <?php } else { ?>
                    <img src="<?= base_url("static/logos/default.png"); ?>" style="width:60px" class="rounded-circle image">
                <?php } ?>
            </div>
            <div>
                <div class="row">
                    <p><b><?= $notification['nom'] ?>&nbsp;<?= $notification['prenom'] ?></b>&nbsp;souhaite intégrer votre structure.Le connaissez-vous?</p>
                    <?php if ($notification['lu'] == 0) { ?>
                        <div class="col">
                            <a href="<?= base_url('/demandeRefuser/' . $notification['id_demande'] . '/' . $notification['id_notification']) ?>" class="btn">refuser</a>
                        </div>
                        <div class="col">
                            <a href="<?= base_url('/demandeConfirmer/' . $notification['id_demande'] . '/' . $notification['id_notification']) ?>" class=" btn btn-primary">confirmer</a>
                        </div>
                    <?php } else { ?>
                        <?php
                        if ($notification['isConfirme'] == 2) { ?>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg>
                                Confirmé
                            </p>
                        <?php } ?>
                        <?php
                        if ($notification['isConfirme'] == 1) { ?>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                                Réfuser
                            </p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <br>
    <?php } ?>
    <hr>
    <span style="font-weight:bold; font-family: Sora ; font-size: 1.5rem;">Actualités</span>
    <?php foreach ($actus as $actu) : ?>
        <div class="row mt-3">
            <div class="col-3">
                <img class="avatar avatar-xl img-responsive" style="padding-top:0%;max-width: 100%;height: auto;" src="<?= base_url("./upload/" . $actu->img . ""); ?>" />
            </div>
            <div class="col-9">
                <p><?= $actu->description ?>
                </p>
                <?php if ($actu->brochure !== null && $actu->brochure !== '') : ?>
                    <a class="btn btn-primary" href="<?= base_url('uploads/') . $actu->brochure ?>">Télécharger</a>
                <?php endif ?>
            </div>
        </div>
        <hr>
    <?php endforeach ?>

</div>
<hr>
<div class="container">
    <p>
        Si vous avez une question sur la Cité Educative, contactez l'équipe opérationnelle à
        <a href="" class="text-muted">cite.educative@ville-argenteuil.fr</a>
    </p>

</div>
</div>