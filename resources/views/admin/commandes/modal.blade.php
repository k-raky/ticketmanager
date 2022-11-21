
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
                    {{-- if its the same color we propose variant A and B --}}
                    {{-- if its not the same color we download only variant B --}}
                        @php
                            $colors = array("Orange", "Rosa", "Grün", "Gelb");
                            $count = 0;
                            $values = $commande->line_items[0]->meta_data[0]->value;
                        @endphp  
                       
                        @for ($i = 0; $i < count($colors); $i++)
                        {{-- We check the occurences of the colors in the commandes json--}}
                            @if (collect($values)->where('value',$colors[$i])->count()>0)
                                @php
                                    $count++;
                                @endphp
                            @endif
                        @endfor

                        @if ($count > 1)
                            {{-- if there are more then 1 color in the array it means that he choose different colors for the labels --}}
                            {{-- so we only propose variant B --}}
                            <x-modal_download_options :titre="'1. Téléchargement des 10 étiquettes'" :href="route('download.variantB', ['commande_id'=>$commande->id])" />
                        @else
                        {{-- if there are less or only 1 color in the array it means that he choose the same color for the labels --}}
                            {{-- so we propose variant A and B --}}
                            <x-modal_download_options :titre="'1. Téléchargement des 10 étiquettes'" :toggle="'modal'" :target="'#modelVariants_10_'.$commande->id" :dismiss="'modal'" />
                        @endif
                    
                    {{--<x-modal_download_options :titre="'2. Téléchargement des enveloppes C7'" :href="route('download.enveloppeC7', ['commande_id'=>$commande->id])" />--}}
                    <x-modal_download_options :titre="'3. Téléchargement des enveloppes DL'"  :href="route('download.enveloppeDL', ['commande_id'=>$commande->id])" />
                    <x-modal_download_options :titre="'4. Téléchargement du bon de commande'" :href="route('download.bonCommande', ['commande_id'=>$commande->id])" />
                </div>

                @if ($count > 1)
                    {{-- If he chose different colors for the labels, we download all with variant B --}}
                    <a role="button" class="btn btn-outline-danger h-50" href="{{route('download.all', ['commande_id'=>$commande->id, 'variant'=>'B'])}}" >Tout Telecharger</a>
                @else
                    {{-- If he chose the same color for the labels, we download all and he chooses between variant A and B --}}
                    <a role="button" class="btn btn-outline-danger h-50" data-dismiss="modal" data-toggle="modal" data-target="#modelVariants_All_{{ $commande->id}}">Tout Telecharger</a>
                @endif

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

