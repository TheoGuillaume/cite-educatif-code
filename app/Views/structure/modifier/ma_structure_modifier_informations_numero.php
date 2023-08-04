<div id="row justify-content-center">
    <br>

    <div class="container">
        <h3>Numéro de téléphone</h3>
    </div>

    <div class="container">
        <p class="text-muted">Renseigner un numéro de téléphone sur laquelle on pourra vous joindre.
        </p>
    </div>

    <form class="container" action="<?= base_url("/updateNumeroTel") ?>" method="post">
        <div class="row">
            <div class="mb-4 mt-2">
                <label class="form-label required">T&eacute;l&eacute;phone d'accueil</label>
                <input type="tel" id="phone" name="tel_siege" value="<?= $structs["tel_siege"] ?>" class="form-control" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" minlength="10" maxlength="10" placeholder="Num&eacute;ro fr t&eacute;l&eacute;phone d'accueil du votre antenne">
            </div>
        </div>
        <div style="display:flex;   justify-content: center!important;">
            <button type="submit" class="btn py-2   my-4" style=" position: fixed;
                bottom: 0;
                width:90%;
                color: white;
                text-align: center; color: white; background-color:#2895ab ;">
                Enregistrer
            </button>
        </div>
    </form>
</div>
<script>
    // phone number standard

    document.getElementById("phone").addEventListener("input", function(event) {
        var phone = event.target.value;
        phone = phone.replace(/[^0-9]/g, ''); // Remove non-numeric characters
        phone = phone.replace(/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, '$1 $2 $3 $4 $5'); // Add spaces
        event.target.value = phone;
    });
</script>