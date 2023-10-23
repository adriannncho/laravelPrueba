@php
  $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Roles')

@section('content')

<h4 class="py-3 breadcrumb-wrapper mb-2">Lista de Usuarios</h4>

<p>Un rol proporciona acceso a menús y funciones predefinidas, de modo que dependiendo del rol asignado un administrador puede tener acceso a lo que el usuario necesita.</p>
<!-- Role cards -->
@livewire('user-index')



@endsection

