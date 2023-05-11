<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PatientRepositoryInterface;
use App\Model\Patient;
use App\Http\Requests\Admin\PatientRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private PatientRepositoryInterface $patientRepository;

    public function __construct(PatientRepositoryInterface $patientRepository) 
    {
        $this->middleware('auth');
        $this->patientRepository = $patientRepository;
    }

    public function index()
    {
        $patients = $this->patientRepository->getAllPatients();
        return view('admin.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        return view('admin.patient.create',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $patientDetails = $request->only(['name']);
        $this->patientRepository->createPatient($patientDetails);
        return redirect()->route('patient.index')->with('info','Successfully created patient!');
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
        $patient = Patient::find($id);
        if(empty($patient)){
            return redirect()->route('patient.index')->with('info', 'Patient not found!');
        }
        return view('admin.patient.edit',compact('patient'));
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
        $patientDetails = $request->only(['name']);
        $this->patientRepository->updatePatient($id, $patientDetails);
        return redirect()->route('patient.index')->with('info', 'Successfully updated patient name!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->patientRepository->deletePatient($id);
        return redirect()->route('patient.index')->with('info', 'Successfully deleted patient!');
    }
}
