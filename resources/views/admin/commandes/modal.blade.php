
<!-- Modal -->
<div class="modal fade" id="modelTelecharger" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title">Telecharger les étiquettes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body d-flex flex-direction-row align-items-center justify-content-center">
                <div style="width: 60%">
                    <x-modal_download_options :titre="'1. Téléchargement des 10 étiquettes'"/>
                    <x-modal_download_options :titre="'1. Téléchargement des enveloppes C6'"/>
                    <x-modal_download_options :titre="'1. Téléchargement des enveloppes DL'"/>
                    <x-modal_download_options :titre="'1. Téléchargement du bon de commande'"/>
                </div>
                <button type="button" class="btn btn-outline-danger h-50">Tout Telecharger</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </div>
</div>