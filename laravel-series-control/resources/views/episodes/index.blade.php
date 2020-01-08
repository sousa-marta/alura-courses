@extends('layout')

@section('header') Episódios @endsection

@section('content')

@include('mensagem', ['mensagem' => $mensagem])

<form action="/temporadas/{{ $seasonId }}/episodios/assistir" method="post">
  @csrf
  <ul class="list-group">
    @foreach($episodes as $episode)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Episódio {{ $episode->number }}
        <input type="checkbox" 
               name="episodes[]" 
               value="{{ $episode->id }}" 
               {{ $episode->watched ? 'checked' : ''}}>
               {{-- episodes[] cria um array para ir salvando cada nova informação --}}
      </li>
    @endforeach
  </ul>

  <button class="btn btn-primary my-2">Salvar</button>
</form>
@endsection