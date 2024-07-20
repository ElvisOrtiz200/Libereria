@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <h2 class="header-title">Lista De Almacenes</h2>
        <a href="{{route('almacen.create')}}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Nuevo Registro
        </a>
        <br><br>
        <h3 class="header-title">Almacenes</h3> 
        <div class="table-responsive">
            <table class="table table-bordered">
             <thead>
               <tr>
                 <th>ID</th>
                 <th>Nombre</th>
                 <th>Acciones</th>
               </tr>
             </thead>
             <tbody>
                @if(count($almacen)<=0)
                <tr>
                    <td colspan="8"><h4>No hay registros</h4></td>
                </tr>
                @else
                @foreach ($almacen as $item)
                    <tr>
                    <td>{{$item->idAlmacen}}</td>
                    <td>{{$item->nombre}}</td>
      
             
                    <td>
                        <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                    </td>
                    </tr>
                @endforeach
                @endif
              </tbody>
           </table>
           {{$almacen->links()}}
        </div>
        <br>
    </div>
</div>
@endsection