<?= $this->extend("/static/admin/layout") ?>

<?= $this->section("title") ?>Structure<?= $this->endsection() ?>

<?= $this->section("content") ?>
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                <h3 class="card-title">Compte Structure non validé</h3>
                <div style=" text-align: right;">
                    <a href="<?= site_url('admin/structure') ?>" class="btn btn-primary" style="float: right;">Retour</a>
                </div>
            </div>
            <?php if (!empty($structures)) : ?>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1"></th>
                                <th colspan="1">Nom Social</th>
                                <th>Categorie</th>
                                <th>Siren</th>
                                <th>E-mail</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($structures as $structure) : ?>
                                <tr>
                                    <td>
                                        <?php if (!empty($structure->photo_logo)) : ?>
                                            <span class="avatar" style="background-image: url(<?= base_url("./upload/" . $structure->photo_logo . ""); ?>)"></span>
                                        <?php else : ?>
                                            <span class="avatar avatar-blue"><?= ucfirst($structure->nom_social[0]) ?></span>
                                        <?php endif ?>
                                    </td>
                                    <td><a href="#" class="text-inherit"><?= $structure->nom_social ?></a></td>
                                    <td>
                                        <?= $structure->nomcategorie ?>
                                    </td>
                                    <td>
                                        <?= $structure->siren ?>
                                    </td>
                                    <td>
                                        <?= $structure->email_siege ?>
                                    </td>
                                    <td>
                                        <?= $structure->date_ins ?>
                                    </td>
                                    <td>
                                        <?php if ($structure->etat == "1") : ?>
                                            <span class="status-icon bg-success"></span> Actif
                                        <?php else : ?>
                                            <span class="status-icon bg-danger"></span> Non validé
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url("admin/structure_validation/activateuser/$structure->id") ?>" class="btn btn-success">Valider</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?= $pager->links() ?>
                </div>
            <?php else : ?>
                <div class="alert alert-info" role="alert">
                    Aucune compte a valider
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endsection() ?>