@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<style>
    .card-img-top {
        width: 100%; /* Establece el ancho al 100% del contenedor padre */
        height: auto; /* Establece la altura automática para mantener la proporción */
    }
</style>
<h3>Proyectos</h3>

<div class="container row">
    <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('pages-projects', ['status' => 'En planeacion']) }}" class="btn btn-outline-info m-3">Planeación</a>
        <a href="{{ route('pages-projects', ['status' => 'En ejecucion']) }}" class="btn btn-outline-info m-3">Ejecución</a>
        <a href="{{ route('pages-projects', ['status' => 'Finalizado']) }}" class="btn btn-outline-info m-3">Finalizados</a>
        <a href="{{ route('pages-createproyecto')}}" class="btn btn-outline-primary m-3">Crear Proyecto</a>
    </div>
    
</div>

<div class="row">
    @forelse ($proyectos as $fila)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            @if ($fila->Imagen)
                <img class="card-img-top" style="height: 270px" src="{{ asset('storage/imagen/' . $fila->Imagen) }}" alt="Card image cap" />
            @else
                Sin imagen
            @endif
            <div class="card-body">
                <h5 class="card-title"> {{ $fila->Nombre }}</h5>
                <p class="card-text">
                    {{ $fila->Estado }}
                </p>
                <a href="{{route('pages-editarproyecto', ['id' => $fila->IdProyecto])}}" class="btn btn-outline-primary" style="margin-right: 30px">Editar</a>
                <a href="javascript:void(0)" class="btn btn-outline-primary">Ver más</a>
            </div>
        </div>
    </div>

    <!-- Cerrar la fila y abrir una nueva cada tres tarjetas -->
    @if ($loop->iteration % 3 === 0)
</div>
<div class="row">
    @endif

    @empty
    <!-- Puedes mostrar un mensaje aquí si no hay proyectos -->
    <div class="col-md-12">
        No se encontraron proyectos.
    </div>
    @endforelse
</div>




@endsection
