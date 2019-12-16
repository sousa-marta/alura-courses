@extends('layout')

@section('header') Adicionar Série @endsection

@section('content')
<form action="" method="post" class="col-6">
  <div class="form-group">
    <label for="name">Nome da Série</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
  </div>        
  <button class="btn btn-success">Salvar</button>
</form>
@endsection



