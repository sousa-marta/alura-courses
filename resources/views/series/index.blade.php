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
      <span id="nome-serie-{{ $serie->id }}">{{ $serie->name }}</span>

      <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
        <input type="text" class="form-control" value="{{ $serie->name }}">
        <div class="input-group-append">
          <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
            <i class="fas fa-check"></i>
          </button>
          @csrf
        </div>
      </div>

      <span class="d-flex"> <!-- para agrupar os ícones inline -->
        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
          <i class="fas fa-edit"></i>
        </button>

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

<script>
  function toggleInput(serieId) {
    const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
    const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
    if (nomeSerieEl.hasAttribute('hidden')) {
        nomeSerieEl.removeAttribute('hidden');
        inputSerieEl.hidden = true;
    } else {
        inputSerieEl.removeAttribute('hidden');
        nomeSerieEl.hidden = true;
    }
  }

  function editarSerie(serieId) {
    let formData = new FormData();
    const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
    const token = document.querySelector(`input[name="_token"]`).value;
    formData.append('nome', nome);
    formData.append('_token', token);
    const url = `/series/${serieId}/editaNome`;
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(() => {
        toggleInput(serieId);
        document.getElementById(`nome-serie-${serieId}`).textContent = nome;
    });
}


</script> 

@endsection

    