<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Doctor;
use App\Model\Appointment;
use App\Http\Requests\Admin\AppointmentRequest;
use Flash;

class AppointmentController extends Controller
{
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
        $appointments = Appointment::orderBy('id', 'DESC')->paginate(25);
        return view('admin.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('admin.appointment.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $data = $request->all();
        Appointment::create($data);
        Flash::success('Successfully created appointment');
        return redirect(route('appointment.index'));
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
        $appointment = Appointment::find($id);
        $doctors = Doctor::all();
        $selecteddoctor = Doctor::where('id', $appointment->doctor_id)->first();
        if(empty($appointment)){
            Flash::error('Appointment not found');
            return redirect(route('appointment.index'));
        }
        return view('admin.appointment.edit',compact('appointment','doctors','selecteddoctor'));
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
        $appointment = Appointment::find($id);
        if (empty($appointment)) {
            Flash::error('Appointment not found!');
            return redirect(route('appointment.index'));
        }
        $data = $request->all();
        Appointment::find($id)->update($data);
        Flash::success('Successfully update appointment');
        return redirect(route('appointment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::find($id)->delete();
        Flash::success('Successfully delete appointment');
        return redirect(route('appointment.index'));
    }
}
