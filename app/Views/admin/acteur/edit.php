<?= $this->extend("static/admin/layout") ?>

<?= $this->section("title") ?>Acteur<?= $this->endsection() ?>

<?= $this->section("content") ?>

<div class="row">
    <div class="col-12">
        <?= form_open_multipart("/admin/acteur/update/" . $acteur["id"]) ?>
        <div class="card-header">
            <h3 class="card-title">Acteur</h3>
        </div>

        <?php if (session()->has('errors')) : ?>
            <div class='alert alert-danger' role='alert'>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                <?php endforeach; ?>
            </div>
        <?php endif ?>


        <?= $this->include('admin/acteur/form'); ?>

        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="<?= site_url('admin/acteur') ?>" class="btn btn-link">Retour</a>
                <button type="submit" class="btn btn-primary ml-auto">
                    Modifier
                </button>
            </div>
        </div>
        </form>
    </div>
</div>

<?= $this->endsection() ?>