<?= $this->extend("static/admin/layout") ?>

<?= $this->section("title") ?>Structure<?= $this->endsection() ?>

<?= $this->section("content") ?>
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Structure</h3>
                <div class="container" style=" text-align: right; display: flex;justify-content: flex-end;align-items: center;">
                    <a href="<?= site_url('admin/structure_validation') ?>" class="btn btn-success">Validation des comptes</a>
                    <p style="color: transparent;">-</p>
                    <?= form_open('admin/structure', ['method' => 'get', 'class' => 'pagination-form']) ?>
                    <select name="per_page" onchange="this.form.submit()" class="form-control custom-select btn btn-gray-dark btn-sm" style="width: 144px;">
                        <option value="20" <?= $perPage == 20 ? 'selected' : '' ?>>20 lignes par page</option>
                        <option value="30" <?= $perPage == 30 ? 'selected' : '' ?>>30 lignes par page</option>
                        <option value="50" <?= $perPage == 50 ? 'selected' : '' ?>>50 lignes par page</option>
                    </select>
                    <select name="sort" onchange="this.form.submit()" class="form-control custom-select btn btn-azure btn-sm" style="width: 141px;">
                        <option value="" <?= $currentSort == '' ? 'selected' : '' ?>>Sans tri</option>
                        <option value="nom_social" <?= $currentSort == 'nom_social' ? 'selected' : '' ?>>Tri par nom social</option>
                        <option value="id_categorie" <?= $currentSort == 'id_categorie' ? 'selected' : '' ?>>Tri par categorie</option>
                        <option value="siren" <?= $currentSort == 'siren' ? 'selected' : '' ?>>Tri par siren</option>
                        <option value="email_siege" <?= $currentSort == 'email_siege' ? 'selected' : '' ?>>Tri par e-mail</option>
                        <option value="etat" <?= $currentSort == 'etat' ? 'selected' : '' ?>>Tri par statut</option>
                    </select>
                    </form>
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                            <i class="fe fe-download"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= site_url('admin/export/structure') ?>">Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-1"></th>
                            <th>Nom Social</th>
                            <th>Categorie</th>
                            <th>Siren</th>
                            <th>E-mail</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($structures as $structure) : ?>
                            <tr>
                                <td>
                                    <?php if (!empty($structure->photo_logo)) : ?>
                                        <?php
                                        $photoLogo = $structure->photo_logo ? base_url("./upload/" . $structure->photo_logo) : base_url("assets/img/default_logo.png");
                                        ?>
                                        <span class="avatar" style="background-image: url('<?= $photoLogo ?>')"></span>
                                    <?php else : ?>
                                        <span class="avatar avatar-blue"><?= ucfirst($structure->nom_social[0]) ?></span>
                                    <?php endif ?>
                                </td>
                                <td><a href="#" class="text-inherit"><?= $structure->nom_social ?></a></td>
                                <td>
                                    <?php if (!empty($structure->nomcategorie)) : ?>
                                        <?= $structure->nomcategorie ?>
                                    <?php else : ?>
                                        <span class="badge badge-danger">Aucune categorie</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $structure->siren ?>
                                </td>
                                <td>
                                    <?= $structure->email_siege ?>
                                </td>
                                <td>
                                    <?php if ($structure->etat == "1") : ?>
                                        <span class="status-icon bg-success"></span> Actif
                                    <?php else : ?>
                                        <span class="status-icon bg-danger"></span> Inactif
                                    <?php endif ?>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" class="dropdown-item btn-referent" data-toggle="modal" data-target="#referentModal" data-id="<?= $structure->id_utilisateur ?>"><i class="dropdown-icon fe fe-arrow-right-circle "></i> Réferent </a>
                                            <a href="<?= site_url("/admin/structure/edit/" . esc($structure->id)) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-edit"></i> Modifier </a>
                                            <a href="javascript:void(0)" class="dropdown-item btn-delete" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?= $structure->id ?>"><i class="dropdown-icon fe fe-trash"></i> Supprimer</a>
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

<!-- Modal -->
<div class="modal fade" id="referentModal" tabindex="-1" aria-labelledby="referentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="referentModalLabel">Detail Réferent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-secondary btn-loading btn-block" id="loadingIndicator">Chargement en cours...</button>
                <div id="referent-modal">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fermer" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<script>
    const deleteUrl = "<?php echo site_url('/admin/structure/delete'); ?>";

    $(document).ready(function() {
        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            const url = `${deleteUrl}/${id}`;
            $('.btn-confirm-delete').attr('href', url);
        });

        $('.btn-referent').on('click', function(e) {
            e.preventDefault();
            $('#referent-modal').html('');
            const id = $(this).data('id');
            const url_detail_ref = `<?= site_url('detailReferentStructure/') ?>${id}`;
            const loadingIndicator = $('#loadingIndicator');
            loadingIndicator.show();

            $.ajax({
                url: url_detail_ref,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    loadingIndicator.hide();
                    const referentModal = $('#referent-modal');

                    if (response.error) {
                        let noreferentcontent = '<div class="alert alert-icon alert-danger" role="alert">';
                        noreferentcontent += '<i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Cette structure n\'a pas de référent</div>';
                        referentModal.html(noreferentcontent);
                    } else {
                        const referent = response.referent;
                        let referentContent = '<div class="row"><label for="exampleFormControlInput1" class="form-label">Fonction :</label>&ensp;<p>' + referent.fonction + '</p></div>';
                        referentContent += '<div class="row"><label for="exampleFormControlInput1" class="form-label">Nom :</label>&ensp;<p>' + referent.nom + '</p></div>';
                        referentContent += '<div class="row"><label for="exampleFormControlInput1" class="form-label">Prénom :</label>&ensp;<p>' + referent.prenom + '</p></div>';
                        referentContent += '<div class="row"><label for="exampleFormControlInput1" class="form-label">Email :</label>&ensp;<p>' + referent.email + '</p></div>';
                        referentModal.html(referentContent);
                    }
                },
                error: function(xhr, status, error) {
                    loadingIndicator.hide();
                    console.log(error);
                }
            });
        });
    });
</script>

<?= $this->endsection() ?>