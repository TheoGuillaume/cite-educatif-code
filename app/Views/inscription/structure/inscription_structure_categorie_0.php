<style>
  body {
    overflow-y: hidden !important;
  }
</style>
<div class="page page-center">
    <div class="container-tight py-2">
        <div class="text-center mb-4">
            <h1>Continuons avec votre mission &eacute;ducative</h1>
        </div>
        <p class="text-center mb-3"> Afin de pouvoir proposer aux utilisateurs de la plateforme, les utilisateurs qui pourraient le mieux répondre aux besoins de leurs publics, ou à leurs souhaits de projets, vous êtes invités à sélectionner parmi les items ci-dessous celui se rapprochant le plus de votre offre de service.</p>
        <form class="card card-md" id="myForm" action="<?= base_url("/inscription/structure/inscriptionStructureCategorieZeroSave"); ?>" method="POST">
            <?php if (session()->has("error_categorie")) { ?>
                <span class="text-danger text-center"><?= session("error_categorie") ?></span>
            <?php } ?>
            <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                <?php foreach ($cs_categories as $cs_categorie) { ?>
                    <label class="form-selectgroup-item flex-fill">
                        <input type="radio" id="<?= $cs_categorie['id'] ?>" name="id_categorie" value="<?= $cs_categorie['id'] ?>" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3" style="border-radius: 16px !important">
                            <div class="form-selectgroup-label-content d-flex align-items-center">
                                <div>
                                    <div class="font-weight-medium">
                                        <h3><?php echo $cs_categorie['nom']; ?></h3>
                                    </div>
                                    <div><?php echo $cs_categorie['desc_cat']; ?></div>
                                </div>
                            </div>
                        </div>
                    </label>
                <?php } ?>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-auto">
                    <a href="<?= base_url("/inscription/structure/inscriptionStructureReferent"); ?>" class="text-secondary text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left mt-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        </svg> Retour en arrière</a>
                </div>
                <div class="col">
                    <div class="btn-list justify-content-end">
                        <button type="submit" class="btn" style="background-color:#009CBB; color: white; line-height:1.2rem" ;>Suivant
                            <svg viewBox="0 0 1024 1024" height="14" class="icon mx-1" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#FFFF">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M364.8 106.666667L298.666667 172.8 637.866667 512 298.666667 851.2l66.133333 66.133333L768 512z" fill="#FFFF"></path>
                                </g>
                            </svg>
                        </button>
                    </div> 

                </div>
        </form>

    </div>
</div>

<script>
    if (typeof(Storage) !== "undefined") {
        const myIdcategorie = ' <?php foreach ($cs_categories as $cs_categorie) { ?> <?php
                                                                                        echo $cs_categorie['id'];
                                                                                    } ?>'
        var valueRadioselected = localStorage.getItem("id_categorie");
        if (valueRadioselected !== null) {
            var radioselected = document.getElementById(valueRadioselected);
            for (var i = 0; i < myIdcategorie.length; i++) {
                if (document.getElementById(myIdcategorie[i]) == radioselected) {
                    document.getElementById(myIdcategorie[i]).checked = true;
                }
            }
        }

    }


    document.getElementById("myForm").addEventListener("submit", function() {

        var selectedValue = document.querySelector('input[name="id_categorie"]:checked');
        var selectedRadio = selectedValue.id;
        localStorage.setItem("id_categorie", selectedRadio);
    });
</script>