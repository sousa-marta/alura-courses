@extends('layout')

@section('header') Series @endsection

@section('content')
<a href="/series/criar" class="btn btn-dark mb-3">Adicionar Série</a>
<ul class="list-group">
  @foreach ($series as $serie)
    <li class="list-group-item">{{ $serie }}</li>
  @endforeach
</ul> 
@endsection

    