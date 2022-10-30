@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <h1 class="text-center">Just-Save-It</h1>

                <p class="text-muted text-center">Renseigner le mot de passe de l'application Desktop</p>

                <form method="POST" action="{{ route('verifyPassword') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    @if(session()->has('message'))
                    <p class="text-danger"> {{ session()->get('message') }}</p>
                    @endif

                    <div class="row">
                        <div class="col-4 mx-auto">
                            <button type="submit" class="btn btn-primary px-4">
                                Se connecter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection