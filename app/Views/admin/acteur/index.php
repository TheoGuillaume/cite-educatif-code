<?= $this->extend("static/admin/layout") ?>

<?= $this->section("title") ?>Acteur<?= $this->endsection() ?>

<?= $this->section("content") ?>
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Acteur</h3>
                <div class="container" style=" text-align: right; display: flex;justify-content: flex-end;align-items: center;">
                    <a href="<?= site_url('admin/acteur_validation') ?>" class="btn btn-success">Validation des comptes</a>
                    <p style="color: transparent;">-</p>
                    <?= form_open('admin/acteur', ['method' => 'get', 'class' => 'pagination-form']) ?>
                    <select name="per_page" onchange="this.form.submit()" class="form-control custom-select btn btn-gray-dark btn-sm" style="width: 144px;">
                        <option value="20" <?= $perPage == 20 ? 'selected' : '' ?>>20 lignes par page</option>
                        <option value="30" <?= $perPage == 30 ? 'selected' : '' ?>>30 lignes par page</option>
                        <option value="50" <?= $perPage == 50 ? 'selected' : '' ?>>50 lignes par page</option>
                    </select>
                    <select name="sort" onchange="this.form.submit()" class="form-control custom-select btn btn-cyan" style="width: 141px;">
                        <option value="" <?= $currentSort == '' ? 'selected' : '' ?>>Sans tri</option>
                        <option value="nom" <?= $currentSort == 'nom' ? 'selected' : '' ?>>Tri par nom</option>
                        <option value="poste" <?= $currentSort == 'poste' ? 'selected' : '' ?>>Tri par poste</option>
                        <option value="nom_social" <?= $currentSort == 'nom_social' ? 'selected' : '' ?>>Tri par structure</option>
                        <option value="sigle" <?= $currentSort == 'sigle' ? 'selected' : '' ?>>Tri par sigle</option>
                        <option value="etat" <?= $currentSort == 'etat' ? 'selected' : '' ?>>Tri par statut</option>
                    </select>
                    </form>
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                            <i class="fe fe-download"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= site_url('admin/export/acteur') ?>">Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-1"></th>
                            <th>Nom</th>
                            <th>Poste</th>
                            <th>Structure</th>
                            <th>Sigle</th>
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
                                    <?php if (!empty($acteur->nom_social)) : ?>
                                        <?= $acteur->nom_social ?>
                                    <?php else : ?>
                                        <span class="badge badge-danger">Aucune structure</span>
                                    <?php endif ?>
                                </td>

                                <td>
                                    <?php if (!empty($acteur->sigle)) : ?>
                                        <?= $acteur->sigle ?>
                                    <?php else : ?>
                                        -
                                    <?php endif ?>

                                </td>

                                <td>
                                    <?php if ($acteur->etat == "1") : ?>
                                        <span class="status-icon bg-success"></span> Actif
                                    <?php else : ?>
                                        <span class="status-icon bg-danger"></span> Inactif
                                    <?php endif ?>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a href="<?= site_url("/admin/acteur/edit/" . esc($acteur->id)) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-edit"></i> Modifier </a>
                                            <a href="javascript:void(0)" class="dropdown-item btn-delete" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?= $acteur->id ?>"><i class="dropdown-icon fe fe-trash"></i> Supprimer</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet élément ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="#" class="btn btn-danger btn-confirm-delete">Supprimer</a>
            </div>
        </div>
    </div>
</div>

<script>
    var deleteUrl = "<?php echo site_url('/admin/acteur/delete'); ?>";
    $(document).ready(function() {
        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = deleteUrl + '/' + id;
            $('.btn-confirm-delete').attr('href', url);
        });
    });
</script>

<?= $this->endsection() ?>