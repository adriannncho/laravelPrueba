
@extends('layouts/layoutMaster')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')

<h4 class="py-3 breadcrumb-wrapper ms-5">Lista de Roles</h4>

<div class="col-10 container">
  <!-- Role Table -->
    

  <div class="card">

    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre o un correo de un usuario">
    </div>
    

    @if ($roles->count())
    <div class="card-body table-responsive">
        <table class="table border-top">
            <thead>
                <tr>
                  <th data-column-id="id">#</th>
                  <th data-column-id="name">Rol</th>
                  @can('admin.roles.edit')
                  <th data-column-id="actions" class="d-flex justify-content-end">Acciones</th>
                  @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                <tr>
                    <td>{{$rol->id}}</td>
                    <td>{{$rol->name}}</td>
                    <td class="d-flex justify-content-end">
                      @can('admin.roles.edit')
                      <a href="" class="badge bg-label-warning">Editar</a>
                      @endcan
                      @can('admin.roles.destroy')
                      <a href="" class="">
                        <button type="sumbmit" class="badge bg-label-danger ms-2" style="border: transparent" id="confirm-text">
                          Borrar
                        </button>
                      </a>
                      @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>

      @else
          <div class="card-body">
            <strong>No hay roles</strong>
          </div>
    @endif
    
  </div>
  <!--/ Role Table -->
</div>
@endsection
