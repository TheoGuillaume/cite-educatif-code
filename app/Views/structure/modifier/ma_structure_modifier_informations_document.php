<style>
    #doc {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    .wrapper {
        display: flex;
        /* padding: 5px; */
        width: 100%;
        min-height: auto;
        /*background: #5691d5;*/
    }

    .box {
        max-width: 500px;
        background: #fff;
        width: 100%;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radiys: 5px;
        -ms-border-radiys: 5px;
        -o-border-radiys: 5px;
    }

    .upload-area-title {
        text-align: center;
        color: #5d5b5b;
        margin-bottom: 20px;
        font-size: 15px;
        font-weight: 600;
    }

    .uploadlabel {
        width: 100%;
        min-height: 100px;
        background: #f5f4f4;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        border-radius: 15px;
        padding: 30px;
        margin-top: 0.8rem;

    }

    .uploadlabel span {
        font-size: 40px;
        color: #2d3ec5;
        margin-bottom: 1rem;
    }

    .uploadlabel p {
        font-size: 20px;
        color: #5d5b5b;
        font-weight: 800;
        font-family: cursive;
    }

    .uploaded {
        margin: 30px 0;
        font-size: 16px;
        font-weight: 700;
        color: #a5a5a5;
    }

    .showfilebox {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 10px 0;
        padding: 10px 15px;
        box-shadow: #0000000d 0px 0px 0px 1px,
            #d1d5db3d 0px 0px 0px 1px inset;
    }

    .showfilebox .left {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .left h3 {
        font-weight: 600;
        font-size: 18px;
        color: #292F42;
        margin: 0;
    }

    .right span {
        background: #18a7ff;
        color: #fff;
        width: 25px;
        height: 25px;
        font-size: 25px;
        line-height: 25px;
        display: inline-block;
        text-align: center;
        font-weight: 700;
        cursor: pointer;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radiys: 50%;
        -ms-border-radiys: 50%;
        -o-border-radiys: 50%;
    }
</style>
<div id="page page-center">
    <div class="container-tight py-4">
        <div class="mb-3">
            <label class="form-label required">Vos brochures ou autres documents :</label>
            <strong>Partagez des documents de pr&eacute;sentation (03 max) qui pourront &ecirc;tre consult&eacute;s par
                les utilisateurs de la plateforme. <br>
            </strong>
        </div>
        <?php if (session()->has("erreur_filles")) { ?>
            <span class="text-danger text-center">
                <?= session("erreur_filles") ?>
            </span>
        <?php } ?>
        <?php
        if (!empty($files)) { ?>
            <?php
            foreach ($files as $file) { ?>
                <?php $path = base_url("uploads/" . $file["nom_file"] . ""); ?>
                <div class="btn-group wrapper">
                    <a target='_blank' href="<?= $path ?>" class="btn btn-ligth active" aria-current="page"><?= $file['name_file'] ?></a>
                    <a href="<?= base_url('/structure/modifier/deleteDocument/delete/'.$file["id"]) ?>" class="btn btn-ligth">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                            viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg>
                    </a>
                </div><br>
            <?php } ?>
        <?php } else { ?>
            <form action="<?= base_url("/updateDocument"); ?>" enctype="multipart/form-data" method="post">
                <div id="doc">
                    <div class="wrapper">
                        <div class="box">
                            <div class="input-bx" style="font-family: 'Roboto', sans-serif; text-align: center;">
                                <span class="upload-area-title my-3">(Format: PDF, taille max:20mo)</span>
                                <input type="file" name="fichier[]" id="upload" accept=".pdf" hidden multiple>
                                <label for="upload" class="uploadlabel">
                                    <span><i class="fas fa-upload"></i></span>
                                    <p style="font-family: 'Roboto', sans-serif; font-size:15px;">Appuyez ici pour
                                        télécharger</p>
                                </label>
                            </div>
                            <div id="filewrapper">
                                <h3 class="uploaded">Documents</h3>
                                <!-- <div class="showfilebox">
                            <div class="left">
                                
                            </div>
                            <div class="right">
                                
                            </div>
                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
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
        </div>
        </form>
    <?php } ?>

</div>

<script>
    //Pdf
    window.addEventListener("load", () => {
        const input = document.getElementById("upload");
        const filewrapper = document.getElementById("filewrapper");

        input.addEventListener("change", (e) => {
            // console.log(e.target.files.length);
            for (let i = 0; i < e.target.files.length; i++) {
                let fileName = e.target.files[i].name;
                fileshow(fileName);
                //console.log(fileName) 
            }
            // let fileName = e.target.files[0].name; 
            // let filetype = e.target.value.split(".").pop();
            // fileshow(fileName, filetype);
        })

        const fileshow = (fileName) => {
            const showfileboxElem = document.createElement("div");
            showfileboxElem.classList.add("showfilebox");
            const leftElem = document.createElement("div");
            leftElem.classList.add("left");
            const filetitleElem = document.createElement("h3");
            filetitleElem.innerHTML = fileName;
            leftElem.append(filetitleElem);
            showfileboxElem.append(leftElem);
            const rightElem = document.createElement("div");
            rightElem.classList.add("right");
            showfileboxElem.append(rightElem);
            const crossElement = document.createElement("span");
            crossElement.innerHTML = "&#215;";
            //rightElem.append(crossElement);
            filewrapper.append(showfileboxElem);

            crossElement.addEventListener("click", () => {
                filewrapper.removeChild(showfileboxElem);
            })
        }
    })
</script>