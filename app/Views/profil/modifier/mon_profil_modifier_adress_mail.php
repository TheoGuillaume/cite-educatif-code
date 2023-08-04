<br>
<div class="container ">
    <h3>Email</h3>
    <p>Renseignez une adresse mail sur laquelle on</p>
    <form method="POST" action="<?= base_url("/updateEmailActeur"); ?>">
        <?php if (session()->has("error_mail")) { ?>
            <span class="text-danger"><?= session("error_mail") ?></span>
        <?php } ?>
        <input type="email" name="email" value="<?= $acteurs["email"] ?>" class="form-control" placeholder="Email actuel">

        <div style="position: fixed;
            left: 0;
            bottom: 0;
            width: 90%;
            color: white;
            text-align: center;">
            <button type="submit" class="btn m-3 p-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>