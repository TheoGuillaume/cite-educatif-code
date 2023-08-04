<?= $this->extend("static/admin/layout") ?>

<?= $this->section("title") ?>Acteur<?= $this->endsection() ?>

<?= $this->section("content") ?>

<div class="row">
    <div class="col-12">
        <?= form_open_multipart("/admin/structure/update/" . $structure["id"]) ?>
        <div class="card-header">
            <h3 class="card-title">Structure</h3>
        </div>

        <?php if (session()->has('errors')) : ?>
            <div class='alert alert-danger' role='alert'>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                <?php endforeach; ?>
            </div>
        <?php endif ?>


        <?= $this->include('admin/structure/form'); ?>

        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="<?= site_url('admin/structure') ?>" class="btn btn-link">Retour</a>
                <button type="submit" class="btn btn-primary ml-auto">
                    Modifier
                </button>
            </div>
        </div>
        </form>
    </div>
</div>

<?= $this->endsection() ?>