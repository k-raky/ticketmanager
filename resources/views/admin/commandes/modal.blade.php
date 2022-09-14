
<!-- First modal for the downloading options -->
<div class="modal fade" id="modelTelecharger" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title text-center">Telecharger les étiquettes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body d-flex flex-direction-row align-items-center justify-content-evenly">
                <div>
                    <x-modal_download_options :titre="'1. Téléchargement des 10 étiquettes'" :toggle="'modal'" :target="'#modelVariants'" :dismiss="'modal'" />
                    <x-modal_download_options :titre="'2. Téléchargement des enveloppes C6'" :toggle="''" :target="''" :dismiss="''"/>
                    <x-modal_download_options :titre="'3. Téléchargement des enveloppes DL'" :toggle="''" :target="''" :dismiss="''"/>
                    <x-modal_download_options :titre="'4. Téléchargement du bon de commande'" :toggle="''" :target="''" :dismiss="''"/>
                </div>
                <button type="button" class="btn btn-outline-danger h-50">Tout Telecharger</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>


<!-- 2nd modal to show the options when downloading the 10 labels -->
<div class="modal fade" id="modelVariants" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choisir le mode de téléchargement des 10 étiquettes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body d-flex justify-content-around">
                <a role="button" class="btn btn-info text-light fs-5 fw-bold" href="/variantA">10 étiquettes en 2 blocs de 5</button>
                <button type="button" class="btn btn-info text-light fs-5 fw-bold">10 étiquettes individuelles</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>