@php
  $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Roles')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
@endsection


@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
        <h5 class="card-title mb-sm-0 me-2">Crear Usuario</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- 1. Delivery Address -->
            <br>
            <h5 class="mb-4"> Información del usuario</h5>
            <form id="formAuthentication" class="mb-3" action="{{ route('user-store') }}" method="POST">
              @csrf
              <div class="row g-3">
                <div class="mb-3 col-md-6">
                  <label for="username" class="form-label">Nombre</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" placeholder="johndoe" autofocus value="{{ old('name') }}" />
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label for="username" class="form-label">Apellido</label>
                  <input type="text" id="apellido" class="form-control" name="apellido" placeholder="mathaus" autofocus/>
                </div>
                <div class="col-md-6">
                  <label for="username" class="form-label">Numero de documento</label>
                  <input type="text" class="form-control"  id="documento" name="documento" placeholder="xxxxxxxxxx" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" />
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label for="roles_id" class="form-label">Rol</label>
                  <select class="form-select" id="roles_id" name="roles_id">
                      <option value="3">Usuario</option>
                      <option value="1">Administrador</option>
                      <option value="2">Socio</option>
                      <option value="4">Trabajador</option>
                      <!-- Agrega más opciones de roles según tus necesidades -->
                  </select>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="flatpickr-date" class="form-label">Fecha Nacimiento</label>
                  <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="fechanacimiento" id="flatpickr-date" required />
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text">CO (+57)</span>
                    <input type="text" id="Telefono" name="telefono" class="form-control" placeholder="202 555 0111" required />
                  </div>
                </div>
                <div class="mb-3 col-md-6 form-password-toggle">
                  <label class="form-label" for="password">Contraseña</label>
                  <div class="input-group input-group-merge @error('password') is-invalid @enderror">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <span class="input-group-text cursor-pointer">
                      <i class="bx bx-hide"></i>
                    </span>
                  </div>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password-confirm">Confirmar Contraseña</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <span class="input-group-text cursor-pointer">
                      <i class="bx bx-hide"></i>
                    </span>
                  </div>
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" />
                    <label class="form-check-label" for="terms">
                      I agree to the
                      <a href="{{ route('terms.show') }}" target="_blank">
                        terms_of_service
                      </a> and
                      <a href="{{ route('policy.show') }}" target="_blank">
                        privacy_policy
                      </a>
                    </label>
                  </div>
                </div>
                @endif
                <div class="d-flex justify-content-end">
                  <a class="btn btn-outline-secondary m-2" style="color:#fff">Cancelar</a>
                  <button type="submit" class="btn btn-primary d-grid m-2">Registrate</button>
                </div>
              </div>
            </form>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

