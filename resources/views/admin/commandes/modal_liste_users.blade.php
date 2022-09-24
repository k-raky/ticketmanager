
<!-- Modal -->
<div class="modal fade" id="modelListeUsers" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choisir un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <div class="row text-center text-info">
                        <div class="col-4 ">Id</div>
                        <div class="col-4 ">Nom</div>
                        <div class="col-4 ">Team Id</div>
                    </div>
                    @foreach ($users as $user)
                        <a data-dismiss="modal" onclick="allocate(this)" class="list_item{{ $user->id}} list-group-item list-group-item-action text-dark">
                            <div class="row text-center">
                                <div class="user_id col-4">{{ $user->id}}</div>
                                <div class="user_name col-4 ">{{ $user->name}}</div>
                                <div class="col-4 ">{{ $user->team_id}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

