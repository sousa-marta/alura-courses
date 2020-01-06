@extends('layout')

@section('header') Series @endsection

@section('content')

@if(!empty($mensagem))
  <div class="alert alert-success">
    {{ $mensagem }}
  </div>
@endif

<a href="{{ route('form_create_serie') }}" class="btn btn-dark mb-3">Adicionar Série</a>
<ul class="list-group">
  @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      {{ $serie->name }}

      <span class="d-flex"> <!-- para agrupar os ícones inline -->
        <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-1">
          <i class="fas fa-external-link-alt"></i>
        </a>

        <form action="/series/{{$serie->id}}" method="post" onsubmit="return confirm('Tem certeza que quer remover {{ addslashes($serie->name) }}?')">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
        </form>
      </span>
        
    </li>
  @endforeach
</ul> 
@endsection

    