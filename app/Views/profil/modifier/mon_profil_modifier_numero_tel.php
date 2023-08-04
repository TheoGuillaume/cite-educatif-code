<br>
<div class="container ">
    <h3>Numéro de téléphone</h3>
    <p>Renseignez un numéro avec lequel on pourra</p>
    <div class="mt-4">
        <form action="<?= base_url("/updatePhoneNumber"); ?>" method="POST">
            <input type="tel" id="phone" name="tel_acteur" value="<?= $acteurs["tel_acteur"] ?>" class="form-control" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" minlength="10" maxlength="10" placeholder="Numéro actuel">

            <div style="position: fixed;
                    left: 0;
                    bottom: 0;
                    width: 90%;
                    color: white;
                    text-align: center;">
                <button type="submit" class="btn m-3 p-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                    Enregistrer
                </button>

            </div>
        </form>
    </div>
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