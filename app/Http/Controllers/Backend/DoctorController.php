<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Doctor;
use App\Model\Qualify;
use App\Http\Requests\Admin\DoctorRequest;
use Flash;
use App\Http\Traits\QualifyTrait;

class DoctorController extends Controller
{
    use QualifyTrait; //using trait

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::orderBy('id', 'DESC')->paginate(25);
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $qualifies = Qualify::all();
        $qualifies = $this->getQualify(); //using trait
        return view('admin.doctor.create',compact('qualifies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $data = $request->all();
        $qualify = $data['qualification'];
        $doctor = Doctor::create($data);
        $doctor->qualify()->attach($qualify);
        Flash::success('Successfully created doctor');
        return redirect(route('doctor.index'));
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
        $doctor = Doctor::find($id);
        if(empty($doctor)){
            Flash::error('Doctor not found');
            return redirect(route('doctor.index'));
        }
        $qualifies = Qualify::all();
        $q_selected = $doctor->qualify()->pluck('qualify_id')->toArray();
        return view('admin.doctor.edit',compact('doctor','qualifies','q_selected'));
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
        $doctor = Doctor::find($id);
        if (empty($doctor)) {
            Flash::error('Doctor not found!');
            return redirect(route('doctor.index'));
        }
        $data = $request->all();
        $qualify = $data['qualification'];
        $doctor->update($data);
        $doctor->qualify()->sync($qualify);
        Flash::success('Successfully update doctor');
        return redirect(route('doctor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Doctor::find($id)->delete();
        Flash::success('Successfully delete doctor');
        return redirect(route('doctor.index'));
    }
}
