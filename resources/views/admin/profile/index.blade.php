@extends('layouts.plantilla')

@section('title')
    <h1>Perfil</h1>
@endsection

@section('content')

        <div class="row justify-content-start">
            <div>
                <div class="card">
                    <div class="card-header">Editar Perfil</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <section class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ $user->name }}" required autofocus>
                            </section>

                            <section class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ $user->email }}" required>
                            </section>

                            <section class="mb-3">
                                <label for="file" class="form-label">Foto de perfil</label>
                                <input id="file" type="file" class="form-control" name="file" accept="image/*">
                            </section>

                            <div class="form-group row mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-sm-start">
            <div >
                <div class="card">
                    <div class="card-header">Cambiar Contraseña</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <section class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </section>

                            <section class="mb-3">
                                <label for="password-confirm" class="form-label">Confirmar contraseña</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </section>

                            <section class="mb-3">
                                <div>
                                    <button type="submit" class="btn btn-primary">Actualizar contraseña</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
