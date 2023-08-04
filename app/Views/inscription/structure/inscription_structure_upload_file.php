<style>
    #display_image {
        width: 100%;
        max-width: 500px;
        background: #f5f4f4;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        border-radius: 15px;
        margin-top: 0.8rem;

    }

    #doc {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
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
        font-size: 13px;
        font-weight: 600;
    }

    .uploadlabel-photo {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        border-radius: 15px;
        padding: 25px;
        margin-top: 0.8rem;
    }
    .uploadlabel-photo span{
        font-size: 30px;
        color: #2d3ec5;
        margin-bottom: 1rem;
    }
    .uploadlabel-photo p {
        font-size: 16px;
        color: #5d5b5b;
        font-weight: 800;
        font-family: cursive;
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
        font-size: 30px;
        color: #2d3ec5;
        margin-bottom: 1rem;
    }

    .uploadlabel p {
        font-size: 20px;
        color: #5d5b5b;
        font-weight: 800;
        font-family: cursive;
    }

    .images_acteurs {
        border-radius: 15px;
        width: 200px;
        background-color: #f4f4f4;
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

    input[type="file"] {
        display: none;
    }
</style>

<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <h1>Pour terminer...</h1>
        </div>
        <form class="card card-md" enctype="multipart/form-data" action="<?= base_url("/inscription/structure/inscriptionStructureUploadFileSave"); ?>" method="POST">
            <div class="mb-3">
                <label class="form-label" required>Votre site web</label>
                <input type="text" class="form-control" name="site_web" placeholder="Ex: www.ma-structure.com">
            </div>

            <div class="mb-3">
                <label class="form-label required">Votre logo</label>
                <strong>Il permettra de vous identifier facilement dans les r&eacute;sultats de recherche.</strong>
            </div>
            <div class="mb-3">
                <p class="upload-area-title">(Format : JPG ou PNG, taille max 20mo)</p>
                    <div class=" images_acteurs" id="display_image">
                        <div class="input-bx "  style="font-family: 'Roboto', sans-serif;text-align: center;">
                            <input type="file" name="logo_structure" id="formFile" accept="image/png, image/jpg">
                            <label for="formFile" class="uploadlabel-photo">
                                <span><i class="fas fa-camera"></i></span>
                                <p style="font-family: 'Roboto', sans-serif; font-size:15px;">Appuyez ici pour télécharger</p>
                            </label>
                        </div>
                    </div>
            </div>
            <?php if (session()->has("erreur_extension")) { ?>
                <span class="text-danger text-center"><?= session("erreur_extension") ?></span>
            <?php } ?>
            <?php if (session()->has("erreur_size_file")) { ?>
                <span class="text-danger text-center"><?= session("erreur_size_file") ?></span>
            <?php } ?>
            <div class="mb-3">
                <label class="form-label required">Vos brochures ou autres documents :</label>
                <strong>Partagez des documents de pr&eacute;sentation (03 max) qui pourront &ecirc;tre consult&eacute;s par les utilisateurs de la plateforme. <br>
                </strong>
            </div>
            <?php if (session()->has("erreur_filles")) { ?>
                <span class="text-danger text-center"><?= session("erreur_filles") ?></span>
            <?php } ?>
            <div id="doc">
                <div class="wrapper">
                    <div class="box">
                        <div class="input-bx" style="font-family: 'Roboto', sans-serif;text-align: center;">
                            <span class="upload-area-title">(Format: PDF, taille max:20mo)</span>
                            <input type="file" name="fichier[]" id="upload" accept=".pdf" hidden multiple>
                            <label for="upload" class="uploadlabel">
                                <span><i class="fas fa-upload"></i></span>
                                <p style="font-family: 'Roboto', sans-serif; font-size:15px;">Appuyez ici pour télécharger</p>
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
            <div class="row align-items-center mt-3">
                <div class="col-auto">
                    <a href="<?= base_url("/inscription/structure/inscriptionStructureModalitePublic") ?>" class="text-decoration-none text-secondary ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left mt-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        </svg> Retour en arrière</a>
                </div>
                <div class="col">
                    <div class="btn-list justify-content-end">
                        <button type="submit" class="btn" style="background-color:#009CBB; color: white">
                            Terminer
                        </button>
                    </div>
                </div>
            </div>
        </form>




    </div>
</div>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    //Photo
    const image_input = document.querySelector("#formFile");
    var uplaod_image = "";

    image_input.addEventListener("change", function() {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            uplaod_image = reader.result;
            document.querySelector("#display_image").style.backgroundImage = `url(${uplaod_image})`;
        });
        reader.readAsDataURL(this.files[0]);
    });

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