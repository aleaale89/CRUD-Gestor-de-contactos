<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['contactos'] = Contacto::paginate(10);
        return view('contacto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datosContacto = request()-> except('_token');
        Contacto::insert($datosContacto);

       // return response()->json($datosContacto);
        return redirect('contacto')->with('mensaje','Contacto agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $contacto = Contacto::findOrFail($id);
        return view('contacto.edit', compact('contacto'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'telefono' => 'required',
        'correo' => 'required',
        'direccion' => 'required'
    ]);
        $datosContacto = request()-> except('_token','_method');
        Contacto::where('id','=',$id)->update($datosContacto);

        $contacto = Contacto::findOrFail($id);
        return view('contacto.edit', compact('contacto'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Contacto::destroy($id);

        return redirect('/contacto')->with('mensaje','Contacto eliminado con éxito');
    }
}
