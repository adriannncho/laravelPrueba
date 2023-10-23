
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
<div class="row">
  <!-- Marketing Campaigns -->
  <div class="col-xl-12 mb-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Pedidos</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="marketingOptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="marketingOptions">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
          <div class="d-flex justify-content-between align-content-center flex-wrap gap-4">
            <div class="d-flex align-items-center gap-2">
              <div id="marketingCampaignChart1"></div>
              <div>
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-2">25,768</h6>
                  <span class="text-success">(+16.2%)</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="badge badge-dot bg-success me-2"></span> Jan 12,2022
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center gap-2">
              <div id="marketingCampaignChart2"></div>
              <div>
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-2">5,352</h6>
                  <span class="text-danger">(-4.9%)</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="badge badge-dot bg-danger me-2"></span> Jan 12,2022
                </div>
              </div>
            </div>
          </div>
          <a href="{{ route('create-pedidos', ['id' => $proyecto->IdProyecto])}}" class="btn btn-sm btn-primary" type="button">Crear pedido</a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table border-top">
          <thead>
            <tr>
              <th>Descripcion</th>
              <th>Fecha</th>
              <th>Valor</th>
              <th>Factura Pedido</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse ($pedidos as $fila)
            <tr>
              <td class="text-nowrap">{{ $fila->Descripcion }}</td>
              <td class="text-nowrap">{{ $fila->FechaHora }}</td>
              <td>{{ $fila->ValorTotal }}</td>
              <td>
                @if ($fila->Evidencia)
                <a href="{{ asset('storage/imagen/' . $fila->Evidencia) }}" target="_blank" class="btn btn-pdf">Ver pdf</a>
                @else
                    <span>Sin factura pedido</span>
                @endif
              </td>
            </tr>
            @empty
            <tr>
                <td class="text-nowrap">No hay pedidos disponibles.</td>
            </tr>
        @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
