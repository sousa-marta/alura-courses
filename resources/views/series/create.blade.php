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

<form action="" method="post" class="col-6">
  {{-- Proteção de envio de dados via post  --}}
  @csrf 
  <div class="form-group">
    <label for="name">Nome da Série</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
  </div>        
  <button class="btn btn-success">Salvar</button>
</form>
@endsection



