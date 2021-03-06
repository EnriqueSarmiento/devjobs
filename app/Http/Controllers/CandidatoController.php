<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Vacante;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf',
            'vacante_id' => 'required'
        ]);

        //almacenar archivo pdf
        $nombreArchivo = '';
        if($request->file('cv')){
            $archivo = $request->file('cv');
            $nombreArchivo = time() . "." . $request->file('cv')->extension();
            $ubicacion = public_path('/storage/cv');
            $archivo->move($ubicacion, $nombreArchivo);

            // return $nombreArchivo;
        }

        $vacante = Vacante::find($data['vacante_id']);

        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nombreArchivo,
        ]);

        $reclutador = $vacante->reclutador;
        $reclutador->notify( new \App\Notifications\NuevoCandidato($vacante->titulo) );

        //una forma
        // $candidato = new Candidato();
        // $candidato->nombre = $data['nombre'];
        // $candidato->email = $data['email'];
        // $candidato->cv = '12345765.pdf';
        // $candidato->vacante_id = $data['vacante_id'];

        //segunda forma
        // $candidato = new Candidato($data);
        // $candidato->cv = '12345765.pdf';

        //tercer forma
        // $candidato = new Candidato();
        // $candidato->fill($data);
        // $candidato->cv = '12345765.pdf';

        // $candidato->save();

        return back()->with('estado', 'Tus Datos se enviaron correctamente! Suerte!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
