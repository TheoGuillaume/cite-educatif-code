<div id="row justify-content-center">
    <br>

    <div class="container">
        <h3>Exemples actions</h3>
    </div>
    <form action="<?= base_url('/updateExemplesAction'); ?>" method="post">
        <div class="container">
        <textarea class="form-control" name="exemples_action"  maxlength="450" id="exampleFormControlTextarea1" rows="3">
            <?= $structs["exemples_action"] ?>
        </textarea>
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
        </div>
    </form>
    
</div>