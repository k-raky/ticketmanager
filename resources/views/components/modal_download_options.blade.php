<div>
    <div class="row m-3 w-100 border-bottom">
        <div class="col">
            <p class="fs-5">{{ $titre}}</p>
        </div>
        <div class="col">
            <a type="button" class="btn btn-info text-light fs-5 fw-bold" href={{ $href ?? '' }} data-dismiss={{ $dismiss}} data-toggle={{ $toggle ?? ''}} data-target={{ $target ?? ''}}>Telecharger</a>
        </div>
    </div>
</div>