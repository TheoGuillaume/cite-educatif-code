<?= $this->extend("/static/admin/layout") ?>

<?= $this->section("title") ?>Acteur<?= $this->endsection() ?>

<?= $this->section("content") ?>
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                <h3 class="card-title" style="margin: 0;">Compte acteur non validé</h3>
                <div style="text-align: right;">
                    <a href="<?= site_url('admin/acteur') ?>" class="btn btn-primary" style="float: right;">Retour</a>
                </div>
            </div>

            <div class="table-responsive">
                <?php if (!empty($acteurs)) : ?>
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1"></th>
                                <th>Nom</th>
                                <th>Poste</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($acteurs as $acteur) : ?>
                                <tr>
                                    <td>
                                        <?php if (!empty($acteur->photo_profil)) : ?>
                                            <span class="avatar" style="background-image: url(<?= base_url("./upload/" . $acteur->photo_profil . ""); ?>)"></span>
                                        <?php else : ?>
                                            <span class="avatar avatar-blue"><?= ucfirst($acteur->nom[0]) ?></span>
                                        <?php endif ?>
                                    <td><a href="#" class="text-inherit"><?= $acteur->nom ?> <?= $acteur->prenom ?></a></td>
                                    <td>
                                        <?= $acteur->poste ?>
                                    </td>
                                    <td>
                                        <?= $acteur->date_ins ?>
                                    </td>
                                    <td>
                                        <?php if ($acteur->etat == "1") : ?>
                                            <span class="status-icon bg-success"></span> Actif
                                        <?php else : ?>
                                            <span class="status-icon bg-danger"></span> Non validé
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url("admin/acteur_validation/activateuser/$acteur->id") ?>" class="btn btn-success">Valider</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>

                    </table>
                    <?= $pager->links() ?>
                <?php else : ?>
                    <div class="alert alert-info" role="alert">
                        Aucune compte a valider
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<?= $this->endsection() ?>