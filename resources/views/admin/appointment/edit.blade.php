@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Appointment
        </h1>
        <span class="breadcrumb"><a href='{{ route("appointment.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Appointment</a></span>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($appointment, ['route' => ['appointment.update', $appointment->id], 'method' => 'patch']) !!}
                        <div class="form-group col-sm-6">
                            {!! Form::label('doctor', 'Doctor:') !!} <span class="text-danger">*</span>
                            <select class="form-control" name="doctor_id">
                                @foreach($doctors as $key => $doctor)
                                    <option value="{{ $doctor->id }}"
                                        @if($doctor->id == $selecteddoctor->id)
                                            selected
                                        @endif
                                        >{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 mmtext">
                            {!! Form::label('place', 'Place:') !!} <span class="text-danger">*</span>
                            {!! Form::text('place', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('place'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('place') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('appointment.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection