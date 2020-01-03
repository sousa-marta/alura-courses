@extends('layout')

@section('header') Adicionar Série @endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="" method="post">
  {{-- Proteção de envio de dados via post  --}}
  @csrf 
  <div class="row">
    <div class="col col-8">
      <label for="name">Nome da Série</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>        
    <div class="col col-2">
      <label for="seasons_number">Nº Temporadas</label>
      <input type="number" class="form-control" name="seasons_number" id="seasons_number">
    </div>        
    <div class="col col-2">
      <label for="episodes_number">Episódios/Temporada</label>
      <input type="number" class="form-control" name="episodes_number" id="episodes_number">
    </div>        

  </div>
  <button class="btn btn-success mt-3">Salvar</button>
</form>
@endsection



