@extends('layout')

@section('header') Episódios @endsection

@section('content')
<form action="">
  <ul class="list-group">
    @foreach($episodes as $episode)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Episódio {{ $episode->number }}
        <input type="checkbox" name="" id="">
      </li>
    @endforeach
  </ul>

  <button class="btn btn-primary my-2">Salvar</button>
</form>
@endsection