@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar Administrador')


@section('content')

<style>
    .card-img-top {
        width: 100%; /* Establece el ancho al 100% del contenedor padre */
        height: auto; /* Establece la altura automática para mantener la proporción */
    }
</style>
<h3>Usuarios</h3>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
        <h5 class="card-title mb-sm-0 me-2">Editar Administrador</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- 1. Delivery Address -->
            <br>
            <h5 class="mb-4"> Información del Administrador</h5>
           
            <form action="{{ route('user.actualizar', $user) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label" for="fullname">Nombre</label>
                  <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" placeholder="Ingresar Nombre" />
                </div>
                <div class="col-md-6">
                  <label for="lastName" class="form-label">Apellido</label>
                  <input class="form-control" type="text" name="apellido" id="apellido" value="{{ $user->apellido }}" placeholder="Ingresar Apellido" required/>
                </div>
                <div class="col-md-6">
                  <label for="lastName" class="form-label">Numero de Documento</label>
                  <input class="form-control" type="text" name="documento" value="{{ $user->numdocumento}}" id="documento" placeholder="CC" required/>
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input class="form-control" type="text" id="email" name="email" value="{{ $user->email}}" placeholder="john.doe@example.com" required />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">CO (+57)</span>
                      <input type="text" id="telefono" name="telefono" value="{{ $user->telefono}}" class="form-control" placeholder="202 555 0111" required />
                    </div>
                </div>
                <div class="col-md-6">
                  <label for="flatpickr-date" class="form-label">Fecha Nacimiento</label>
                    <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="fechanacimiento" value="{{ $user->fechanacimiento}}" id="flatpickr-date" required />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="rol">Rol</label>
                  <select class="form-select" name="roles_id" id="roles_id">
                      @foreach($roles as $rol)
                          <option value="{{ $rol->id }}" {{ $user->hasRole($rol->name) ? 'selected' : '' }}>{{ $rol->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="d-flex justify-content-end">
                  <a href="{{ route('pages-page-2')}}" class="btn btn-outline-secondary m-2">Cancelar</a>
                  <button type="submit" class="btn btn-outline-primary m-2">Actualizar Administrador</button>
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
