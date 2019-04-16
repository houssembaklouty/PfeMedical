<?php

namespace App\Http\Controllers\Medecin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Ordonnance;

class MedecinOrdonnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordonnances = Ordonnance::orderBy('ordonnances.id','desc')
                                    ->with('patient')
                                    ->paginate(7);

        $links = $ordonnances->setPath('')->render();

        //dd($ordonnances);

        return view('medecin/ordonnance/index', compact('ordonnances', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();

        return view('medecin/ordonnance/create', compact('patients'));
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
            'user' => ['required', 'numeric', 'max:5'],
            'description' => ['required'],
        ]);

        $ordonnance = Ordonnance::create([
            'patient_id' => $request['user'],
            'description' => $request['description'],
        ]);

        return redirect()->route('ordonnance.index')->with('status', 'Success.. Created !');
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
        $this->validate($request,[
            'description' => ['required'],
        ]);

        $ordonnance = Ordonnance::findOrFail($id);

        $ordonnance->update([
            'description' => $request['description'],
        ]);

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
