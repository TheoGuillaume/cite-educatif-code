<br>
<div class="container">
    <h2>Notifications</h2>
    <?php foreach ($notifications as $notification) { ?>
        <div class="d-flex">
            <div class="mx-2">
                <?php if (!empty($notification['photo_logo'])) { ?>
                    <img src="<?= base_url("upload/" . $notification["photo_logo"] . ""); ?>" style="width: 20px" class="rounded-circle image">
                <?php } else { ?>
                    <img src="<?= base_url("static/logos/default.png"); ?>" style="width: 20px" class="rounded-circle image">
                <?php } ?>
            </div>
            <div>
                <div class="row">
                    <p><b><?= $notification['nom_social']; ?></b>&nbsp; a accepté votre demande.</p>
                </div>
                <a href="<?= base_url('/demandeRecu/' . $notification['id_notification']) ?>" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                    reçu
                </a>
            </div>
        </div>
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