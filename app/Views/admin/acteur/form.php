<div class="card-body">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" placeholder="Nom" name="nom" value="<?= old('nom', esc($acteur['nom'])) ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Prenom</label>
                <input type="text" class="form-control" placeholder="Prenom" name="prenom" value="<?= old('prenom', esc($acteur['prenom'])) ?>" />
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label">Poste</label>
                <input type="text" class="form-control" placeholder="Poste" name="poste" value="<?= old('poste', esc($acteur['poste'])) ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Photo de profil</label>
                <input type="file" name="photo_profil" class="form-control-file" size="20" />
            </div>
        </div>
        <div class="col-md-6 col-lg-4">

            <div class="form-group">
                <label class="form-label">Etat</label>
                <select class="form-control custom-select" name="etat">
                    <option value="1" <?= set_select('etat', '1', (old('etat') == '1' || esc($acteur['etat']) == '1')) ?>>
                        Actif
                    </option>
                    <option value="0" <?= set_select('etat', '0', (old('etat') == '0' || esc($acteur['etat']) == '0')) ?>>
                        Inactif
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>