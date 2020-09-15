@extends('plantilla')

<link rel="stylesheet" href="/css/register.css">

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cree una contraseña para finalizar su registro ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/complete/' . $id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="contrasena" class="col-md-4 col-form-label text-md-right">{{ __('Crontraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('contrasena') is-invalid @enderror" name="contrasena" required autocomplete="new-password">

                                @error('contrasena')
                                    <span class="invalid-feedback"  role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Constraseña') }}</label>

                            <div class="col-md-6">
                                <input id="contrasena" type="password" class="form-control" name="contrasena_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Finalizar inscripción') }}
                                </button>
                            </button>
                        </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection