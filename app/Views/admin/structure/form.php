<div class="card-body">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label">Dénomination sociale</label>
                <input type="text" class="form-control" placeholder="Nom" name="nom_social" value="<?= old('nom_social', esc($structure['nom_social'])) ?>" />
            </div>
            <div class=" form-group">
                <label class="form-label">Categorie</label>
                <select class="form-control custom-select" name="id_categorie">
                    <option value="">Aucune catégorie</option> <!-- Option pour "Aucune catégorie" -->
                    <?php foreach ($categories as $categorie) : ?>
                        <?php if ($structure['id_categorie'] === null && $categorie['id'] === null) : ?>
                            <option value="<?= $categorie['id'] ?>" selected>
                                <?= $categorie['nom'] ?>
                            </option>
                        <?php else : ?>
                            <option value="<?= $categorie['id'] ?>" <?= ($categorie['id'] == $structure['id_categorie']) ? 'selected' : '' ?>>
                                <?= $categorie['nom'] ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Sigle</label>
                <input type="text" class="form-control" placeholder="Sigle" name="sigle" value="<?= old('sigle', esc($structure['sigle'])) ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Siren</label>
                <input type="text" class="form-control" placeholder="Siren" name="siren" value="<?= old('siren', esc($structure['siren'])) ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Adresse du siège social</label>
                <input type="text" class="form-control" placeholder="Adresse" name="adresse_siege" value="<?= old('adresse_siege', esc($structure['adresse_siege'])) ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Adresse principale</label>
                <input type="text" class="form-control" placeholder="Adresse" name="adresse_principale" value="<?= old('adresse_principale', esc($structure['adresse_principale'])) ?>" />
            </div>
        </div>
        <div class="col-md-6 col-lg-4">


            <div class="form-group">
                <label class="form-label">Email d'accueil</label>
                <input type="text" class="form-control" placeholder="E-mail" name="email_siege" value="<?= old('email_siege', esc($structure['email_siege'])) ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Téléphone d'accueil</label>
                <input type="text" class="form-control" placeholder="Telephone" name="tel_siege" value="<?= old('tel_siege', esc($structure['tel_siege'])) ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Site web</label>
                <input type="text" class="form-control" placeholder="Site web" name="site_web" value="<?= old('site_web', esc($structure['site_web'])) ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Logo</label>
                <input type="file" name="photo_logo" class="form-control-file" />
            </div>
            <div class="form-group">
                <label class="form-label">Etat</label>
                <select class="form-control custom-select" name="etat">
                    <option value="1" <?= set_select('etat', '1', (old('etat') == '1' || esc($structure['etat']) == '1')) ?>>
                        Actif
                    </option>
                    <option value="0" <?= set_select('etat', '0', (old('etat') == '0' || esc($structure['etat']) == '0')) ?>>
                        Inactif
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label class="form-label">Précision sur l'heure d'ouverture
                    <textarea class="form-control" name="desc_horaire_ouverture" rows="4"><?= set_value('desc_horaire_ouverture', (old('desc_horaire_ouverture') ? old('desc_horaire_ouverture') : ($structure['desc_horaire_ouverture']))) ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Description Mission
                    <textarea class="form-control" name="desc_mission" rows="4"><?= set_value('desc_mission', (old('desc_mission') ? old('desc_mission') : ($structure['desc_mission']))) ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Exemple d'action
                    <textarea class="form-control" name="exemples_action" rows="4"><?= set_value('exemples_action', (old('exemples_action') ? old('exemples_action') : ($structure['exemples_action']))) ?></textarea>
            </div>

        </div>
    </div>
</div>