@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar Proyecto')


@section('page-script')
<script src="{{asset('assets/js/ciuadades.js')}}"></script>
@endsection

@section('content')

<style>
    .card-img-top {
        width: 100%; /* Establece el ancho al 100% del contenedor padre */
        height: auto; /* Establece la altura automática para mantener la proporción */
    }
</style>
<h3>Proyectos</h3>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
        <h5 class="card-title mb-sm-0 me-2">Editar Proyecto</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- 1. Delivery Address -->
            <br>
            <h5 class="mb-4"> Información del proyecto</h5>
            <form action="{{ route('pages-actualizar', $proyecto->IdProyecto) }}" method="put" enctype="multipart/form-data">
              @csrf
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label" for="fullname">Nombre del Proyecto</label>
                  <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $proyecto->Nombre }}" placeholder="John Doe" />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="email">Dirección</label>
                  <input type="text" id="dire" name="dire" class="form-control" value="{{ $proyecto->Direccion }}" placeholder="John Doe" />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="state">Departamento</label>
                  <select id="depto" name="depto" class="select2 form-select" data-allow-clear="true">
                      <option value="">Seleccionar departamento</option>
                      @foreach ($departamentos as $departamento)
                          <option value="{{ $departamento->IdDepartamento }}" {{ $proyecto->IdDepartamento == $departamento->IdDepartamento ? 'selected' : '' }}>
                              {{ $departamento->Nombre }}
                          </option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="state">Ciudad</label>
                <select id="ciudad" name="ciudad" class="select2 form-select" data-allow-clear="true">
                    <option value="">Seleccionar Ciudad</option>
                    @foreach ($ciudades as $ciudad)
                        <option value="{{ $ciudad->IdCiudad }}" {{ $proyecto->IdCiudad == $ciudad->IdCiudad ? 'selected' : '' }}>
                            {{ $ciudad->Nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            

                <div class="col-md-6">
                  <label class="form-label" for="state">Estado</label>
                  <select id="estado" name="estado" class="select2 form-select" data-allow-clear="true">
                    <option value="En planeación" {{ $proyecto->Estado == 'En planeación' ? 'selected' : '' }}>En Planeación</option>
                    <option value="En ejecución" {{ $proyecto->Estado == 'En ejecución' ? 'selected' : '' }}>En Ejecución</option>
                    <option value="Finalizado" {{ $proyecto->Estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="landmark">Presupuesto</label>
                  <input type="number" id="presupuesto" name="presupuesto" class="form-control" value="{{ $proyecto->AporteTotal }}" placeholder="$0" />
                </div>
                
                <div class="mb-3">
                  <label for="formFile" class="form-label">Imagen</label>
                  <input class="form-control" type="file" id="formFile">
                </div>
              </div>

              <div class="d-flex justify-content-end">
                <a href="{{ route('pages-home')}}" class="btn btn-outline-secondary m-2">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary m-2">Actualizar Proyecto</button>
            </div>
            </form>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>


@endsection
