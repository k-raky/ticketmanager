
<!-- 2nd modal to show the options when downloading the 10 labels -->
<div class="modal fade" id={{ $modalid }} tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choisir le mode de téléchargement des 10 étiquettes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body d-flex justify-content-evenly">
                <!--button to download variant A-->
                <a role="button" class="btn btn-info text-light fs-5 fw-bold" href={{ $routea }}>10 étiquettes en 2 blocs de 5</a>
                <!--button to download variant B-->
                <a role="button" class="btn btn-info text-light fs-5 fw-bold" href={{ $routeb }}>10 étiquettes individuelles</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>