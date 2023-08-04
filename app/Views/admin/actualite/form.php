<div class="card-body">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label class="form-label">Description
                    <textarea class="form-control" name="description" rows="4" placeholder="Description"><?= set_value('description', (old('description') ? old('description') : ($actu->description))) ?></textarea>
                </label>
            </div>
            <div class="form-group">
                <label class="form-label">Image</label>
                <?php if ($actu->img && old('img') === null) : ?>
                    <div>
                        <span class="avatar avatar-xxl" style="background-image: url(<?= base_url("./upload/" . $actu->img); ?>)"></span>
                    </div><br>
                <?php endif; ?>
                <input type="file" name="img" class="form-control-file" value=<?= old('img', $actu->img) ?>>
            </div>
            <div class="form-group">
                <label class="form-label">Brochure (Optionnel)</label>
                <input type="file" name="brochure" class="form-control-file" value=<?= old('brochure', $actu->brochure) ?>>
            </div>
            <div class="form-group">
                <label class="form-label">Etat</label>
                <select class="form-control custom-select" name="status">
                    <option value="1" <?= set_select('status', '1', (old('status') == '1' || esc($actu->status) == '1')) ?>>
                        Actif
                    </option>
                    <option value="0" <?= set_select('status', '0', (old('status') == '0' || esc($actu->status) == '0')) ?>>
                        Inactif
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>