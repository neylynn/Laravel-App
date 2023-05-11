@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Create New Appointment
        </h1>
        <span class="breadcrumb"><a href='{{ route("appointment.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Appointment</a></span>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::open(['route' => 'appointment.store']) !!}
                    <div class="form-group col-sm-12">
                        {!! Form::label('Doctor', 'Doctor:') !!} <span class="text-danger">*</span>
                        <select class="form-control" name="doctor_id">
                            @foreach($doctors as $key => $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('doctor_id'))
                             <span class="text-danger">
                                 <strong>{{ $errors->first('doctor_id') }}</strong>
                             </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-12 mmtext">
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