@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear Proyecto')


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
        <h5 class="card-title mb-sm-0 me-2">Crear Proyecto</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- 1. Delivery Address -->
            <br>
            <h5 class="mb-4"> Información del proyecto</h5>
            <form action="{{ route('pages-store') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
              @csrf
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label" for="validationCustom01">Nombre del Proyecto</label>
                  <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del proyecto" required/>
                  <div class="invalid-feedback">Este campo es requerido.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="email">Dirección</label>
                  <input type="text" id="dire" name="dire" class="form-control" placeholder="Direccion" required />
                  <div class="invalid-feedback">Este campo es requerido.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="state">Departamento</label>
                  <select id="depto" name="depto" class="select2 form-select" data-allow-clear="true" required>
                    <option value="">Seleccionar departamento</option>
                    @forelse ($departamentos as $departamento)
                      <option value="{{ $departamento->IdDepartamento}}">{{$departamento->Nombre}} </option>
                    @empty
                    
                    @endforelse
                  </select>
                  <div class="invalid-feedback">Este campo es requerido.</div>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="state">Ciudad</label>
                  <select id="ciudad" name="ciudad" class="select2 form-select" data-allow-clear="true" required>
                    <option value="">Seleccionar Ciudad</option>
                  </select>
                  <div class="invalid-feedback">Este campo es requerido.</div>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="state">Estado</label>
                  <select id="estado" name="estado" class="select2 form-select" data-allow-clear="true" required>
                    <option value="En planeación">En Planeación</option>
                    <option value="En ejecución">En Ejecución</option>
                    <option value="finalizado">Finalizado</option>
                  </select>
                  <div class="invalid-feedback">Este campo es requerido.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="landmark">Presupuesto</label>
                  <input type="number" id="presupuesto" name="presupuesto" class="form-control" placeholder="$0" required />
                  <div class="invalid-feedback">Este campo es requerido.</div>
                </div>
                
                <div class="mb-3">
                  <label for="formFile" class="form-label">Imagen</label>
                  <input class="form-control" type="file" name="file" id="file" accept="image" required>
                  <div class="invalid-feedback">Este campo es requerido.</div>
                </div>
                
                <div class="d-flex justify-content-end">
                    <a href="{{ route('pages-home')}}" class="btn btn-outline-secondary m-2">Cancelar</a>
                    <button type="submit" class="btn btn-outline-primary m-2">Crear Proyecto</button>
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

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script>
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
</script>


@endsection
