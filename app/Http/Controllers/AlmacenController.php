<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
class AlmacenController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $almacen=Almacen::where("estado","=","1")->where('nombre','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view("almacen.index",compact("almacen",'buscarpor'));
    }

    public function create(){
       
        return view('almacen.create');
    }

    public function store(Request $request){
        $data=$request->validate([
            
        ],
        [
            
        ]);

        $almacen=new Almacen();
        $almacen->nombre=$request->nombre;
        $almacen->estado="1";
        $almacen->save();

   
        return redirect()->route('almacen.index')->with('datos','Registro Nuevo Guardado...!');
    }
}
