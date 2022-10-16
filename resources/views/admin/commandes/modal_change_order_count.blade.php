
<!-- Modal -->
<div class="modal fade" id="modelChangeOrderCount" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Definir le compteur des commandes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ url('/admin/updateCounter') }}" method="post">
                @csrf
            <div class="modal-body d-flex justify-content-center">
                    <input class="text-right" type="number" name="count_index" id="count_index" value="{{ $counter->value}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>