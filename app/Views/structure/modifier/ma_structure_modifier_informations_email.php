
<div id="row justify-content-center">
    <br>

    <div class="container">
        <h2>Email</h2>
    </div>

    <div class="container">
        <p class="text-muted">Renseigner une adresse mail sur laquelle on pourra vous contacter.
        </p>
    </div>

    <form class="container" action="<?= base_url("/updateEmail") ?>" method="post">
        <div class="row">
            <div class=" mb-4 mt-2">
                <input type="email" name="email_siege" class="form-control" value="<?= $structs["email_siege"] ?>" placeholder="Email actuell" required>
            </div>
        </div>
        <div class="row">
            <div style="position: fixed;
                left: 0;
                bottom: 0;
                width: 90%;
                color: white;
                text-align: center;">
                <button class="btn m-3 p-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                    Enregistrer
                </button>

            </div>
        </div>
    </form>
</div>