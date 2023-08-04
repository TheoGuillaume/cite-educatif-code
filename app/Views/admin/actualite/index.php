<?= $this->extend("static/admin/layout") ?>

<?= $this->section("title") ?>Actualite<?= $this->endsection() ?>

<?= $this->section("content") ?>
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Actualite</h3>
                <div class="container" style=" text-align: right;">
                    <a href="<?= site_url('admin/actualite/new') ?>" class="btn btn-success" style="float: right;">Ajouter</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-1"></th>
                            <th>Description</th>
                            <th>Brochure</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($actus as $actu) : ?>
                            <tr>
                                <td>
                                    <span class="avatar" style="background-image: url(<?= base_url("./upload/" . $actu->img . ""); ?>)"></span>
                                <td><?= $actu->description ?></td>
                                <td>
                                    <?php if (!empty($actu->brochure)) : ?>
                                        <a href="<?= base_url('uploads/' . $actu->brochure) ?>" download>
                                            <?= $actu->brochure ?>
                                        </a>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($actu->status == "1") : ?>
                                        <span class="status-icon bg-success"></span> Actif
                                    <?php else : ?>
                                        <span class="status-icon bg-danger"></span> Inactif
                                    <?php endif ?>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a href="<?= site_url("/admin/actualite/edit/" . esc($actu->id)) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-edit"></i> Modifier </a>
                                            <a href="javascript:void(0)" class="dropdown-item btn-delete" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?= $actu->id ?>"><i class="dropdown-icon fe fe-trash"></i> Supprimer</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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
    var deleteUrl = "<?php echo site_url('/admin/actualite/delete'); ?>";
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