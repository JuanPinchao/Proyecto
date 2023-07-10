@extends('layouts.plantilla')

@section('title')
    <h1>Perfil</h1>
@endsection

@section('content')
    <div class="row justify-content-start">
        <div>
            <div class="card">
                <div class="card-header">EDITAR PERFIL</div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('updateProfile.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <section class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $user->name }}" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </section>

                        <section class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </section>

                        <section class="mb-3">
                            <label for="file" class="form-label">Foto de perfil</label>
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" accept="image/*">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </section>

                        <div class="form-group row mb-0">
                            <div>
                                <button type="submit" class="btn btn-success">Actualizar Perfil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-sm-start">
            <div>
                <div class="card">
                    <div class="card-header">CAMBIAR CONTRASEÑA</div>
                    <div class="card-body">
                        @if (session('success2'))
                            <div class="alert alert-success">
                                {{ session('success2') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('updatePassword.update', $user->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <section class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="mb-3">
                                <label for="password-confirm" class="form-label">Confirmar contraseña</label>
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" >
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </section>

                            <section class="mb-3">
                                <div>
                                    <button type="submit" class="btn btn-success">Actualizar contraseña</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-sm-start">
            <div>
                <div class="card">
                    <div class="card-header">BORRAR CUENTA</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('updatePassword.update', $user->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <section class="mb-2">
                                <div>
                                    <button type="submit" class="btn btn-danger" disabled>BORRAR</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
