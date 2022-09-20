
<!-- First modal for the downloading options -->
<div class="modal fade" id="modelTelecharger{{$commande->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Telecharger les étiquettes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body d-flex flex-direction-row align-items-center justify-content-evenly">
                <div class="w-75">
                    <x-modal_download_options :titre="'1. Téléchargement des 10 étiquettes'" :toggle="'modal'" :target="'#modelVariants_10_'.$commande->id" :dismiss="'modal'" />
                    <x-modal_download_options :titre="'2. Téléchargement des enveloppes C6'" :href="route('download.enveloppeC6', ['commande_id'=>$commande->id])" />
                    <x-modal_download_options :titre="'3. Téléchargement des enveloppes DL'"  :href="route('download.enveloppeDL', ['commande_id'=>$commande->id])" />
                    <x-modal_download_options :titre="'4. Téléchargement du bon de commande'" :href="route('download.bonCommande', ['commande_id'=>$commande->id])" />
                </div>
                <a role="button" class="btn btn-outline-danger h-50" data-dismiss="modal" data-toggle="modal" data-target="#modelVariants_All_{{ $commande->id}}">Tout Telecharger</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

    {{-- modal to choose variant A or B when downloading 10  etiquettes --}}
    <x-modal_choix_variant :modalid="'modelVariants_10_'.$commande->id" :routea="route('download.variantA', ['commande_id'=>$commande->id])" :routeb="route('download.variantB', ['commande_id'=>$commande->id])" />

    {{-- modal to choose variant A or B when downloading all --}}
    <x-modal_choix_variant :modalid="'modelVariants_All_'.$commande->id" :routea="route('download.all', ['commande_id'=>$commande->id, 'variant'=>'A'])" :routeb="route('download.all', ['commande_id'=>$commande->id, 'variant'=>'B'])" />

