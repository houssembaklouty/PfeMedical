<?php

namespace App\Http\Controllers\Medecin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NotifyPatientRDV;
use App\RendezVous;
use App\Patient;

class MedecinRdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RendezVous = RendezVous::orderBy('rendez_vouses.id','desc')
                                ->with('patient')
                                ->paginate(7);

        $links = $RendezVous->setPath('')->render();

        return view('medecin/rendez-vous/index', compact('RendezVous', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();

        return view('medecin/rendez-vous/create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user' => ['required', 'numeric'],
            'date' => ['required'],
            'temps' => ['required'],
        ]);

        $RendezVous = RendezVous::create([
            'patient_id' => $request['user'],
            'date' => $request['date'],
            'temps' => $request['temps'],
        ]);

        $patient = Patient::find($RendezVous->patient_id);

        try {
            \Log::info('Mail Done !');

            \Mail::to($patient->email)
                ->send(
                    new NotifyPatientRDV(
                        $patient->first_name,
                        $RendezVous->date,
                        $RendezVous->temps
                    )
                );
        }
        catch (\Exception $e) {
            \Log::info($e->getMessage());
        }

        return redirect()->route('rdv.index')->with('status', 'Success.. Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RendezVous = RendezVous::findOrFail($id);
        $patients = Patient::all();

        return view('medecin/rendez-vous/edit', compact('patients', 'RendezVous'));
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
        $this->validate($request,[
            'user' => ['required', 'numeric'],
            'date' => ['required'],
            'temps' => ['required'],
        ]);

        $RendezVous = RendezVous::findOrFail($id);

        $RendezVous->update([
            'patient_id' => $request['user'],
            'date' => $request['date'],
            'temps' => $request['temps'],
        ]);

        $patient = Patient::find($RendezVous->patient_id);

        try {
            \Log::info('Mail Done !');

            \Mail::to($patient->email)
                ->send(
                    new NotifyPatientRDV(
                        $patient->first_name,
                        $RendezVous->date,
                        $RendezVous->temps
                    )
                );
        }
        catch (\Exception $e) {
            \Log::info($e->getMessage());
        }

        return back()->with('status', 'Success.. !');
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
