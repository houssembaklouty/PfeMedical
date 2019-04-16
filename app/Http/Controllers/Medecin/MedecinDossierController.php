<?php

namespace App\Http\Controllers\Medecin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Ordonnance;

class MedecinDossierController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dossiers = Patient::with('ordonnance')->findOrFail($id);

        //dd($dossiers);

        return view('medecin/dossier/show', compact('dossiers'));
    }    

    public function patient_dossier($patient)
    {

        $patient_dossier = Patient::findOrFail($patient)->dossier();
        $patient = Patient::findOrFail($patient);

        //dd($patient);

        return view('medecin/dossier/index', compact('patient', 'patient_dossier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordonnance = Ordonnance::with('patient')->findOrFail($id);

        return view('medecin/ordonnance/edit', compact('ordonnance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
