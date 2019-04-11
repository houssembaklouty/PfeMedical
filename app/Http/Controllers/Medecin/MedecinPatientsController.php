<?php

namespace App\Http\Controllers\Medecin;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisterNotif;
use Illuminate\Http\Request;
use App\Patient;
use Auth;

class MedecinPatientsController extends Controller
{

    /******
    *
    *
    *
     https://github.com/mtvbrianking/multi-auth
    *
    *
    **/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('patients.id','desc')->paginate(7);
        $links = $patients->setPath('')->render();

        return view('medecin/patients/index', compact('patients', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medecin/patients/create');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patients'],
        ]);

        $generate_password = str_random(8);

        $patinet = Patient::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'address' => $request['address'],
            'email' => $request['email'],
            'medecin_id' => Auth::guard('medecin')->user()->id,
            'password' => Hash::make($generate_password),
        ]);

        try {
            \Log::info('Mail Done !');

            Mail::to('houssem.baklouty@gmail.com')
                ->bcc($patinet->email)
                ->send(
                    new UserRegisterNotif(
                        $patinet->first_name,
                        $patinet->email,
                        $generate_password
                    )
                );
        }
        catch (\Exception $e) {
            \Log::info($e->getMessage());
        }

        return redirect()->route('patients.index')->with('status', 'Success.. Created !');
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
        //
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
