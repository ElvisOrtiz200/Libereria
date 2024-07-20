@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <form method="POST" action="{{route('desecho_recurso.store')}}">
            @csrf
            <div class="mb-3">
                
                
                <label for="idRecurso" class="form-label">Recurso bibliografico:</label>
                <select class="form-control" name="idRecurso" id="idRecurso">
                    @foreach($recursobibliografico as $item)
                    <option value="{{$item['idRecurso']}}">{{$item['titulo']}}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="Descripcion" class="form-label">Observaciones:</label>
                <input type="text" class="form-control @error('Descripcion') is-invalid @enderror" id="Descripcion" name="Descripcion">
                @error('Descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control @error('Fecha') is-invalid @enderror" id="Fecha" name="Fecha">
                @error('Fecha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
            <a href="{{route('desecho_recurso.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"> Cancelar</i></a>
        </form>
    </div>
</div>
@endsection


