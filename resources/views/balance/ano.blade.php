@extends('layouts.master')

@section('titulo','FINANZAS BALANCE')
@section('content')

<div class="page-wrapper">
    <div class="container" style="margin-top: 100px">
        <h1 style="display: flex; justify-content: center; color: rgb(0, 0, 204);background-color: bisque">Balance General</h1>
        <div class="row" style="gap: 10px">
            <div class="col-md-12">
                <a href="{{route('balance.pindex',"2022")}}" class="col-md-12 btn btn-primary">
                    <i class="fa fa-plus"></i>2022
                </a>
              </div>

              <div class="col-md-12">
                <a href="{{route('balance.pindex',"2023")}}" class=" col-md-12 btn btn-primary">
                    <i class="fa fa-plus"></i>2023
                </a>
              </div>
        </div>
    </div>
</div>
    

@endsection