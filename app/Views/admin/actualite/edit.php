<?= $this->extend("static/admin/layout") ?>

<?= $this->section("title") ?>Actualite<?= $this->endsection() ?>

<?= $this->section("content") ?>

<div class="row">
    <div class="col-12">
        <?= form_open_multipart("/admin/actualite/update/" . $actu->id) ?>
        <div class="card-header">
            <h3 class="card-title">Actualite</h3>
        </div>

        <?php if (session()->has('errors')) : ?>
            <div class='alert alert-danger' role='alert'>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                <?php endforeach; ?>
            </div>
        <?php endif ?>


        <?= $this->include('admin/actualite/form'); ?>

        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="<?= site_url('admin/actualite') ?>" class="btn btn-link">Retour</a>
                <button type="submit" class="btn btn-primary ml-auto">
                    Modifier
                </button>
            </div>
        </div>
        </form>
    </div>
</div>

<?= $this->endsection() ?>