@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Create New Doctor
        </h1>
        <span class="breadcrumb"><a href='{{ route("doctor.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Doctor</a></span>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::open(['route' => 'doctor.store']) !!}
                    <div class="form-group col-sm-12 mmtext">
                        {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('name'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                       @endif
                    </div>
                    <div class="ui-widget form-group col-sm-12 mmtext">
                        {!! Form::label('qualify', 'Qualify:') !!} <span class="text-danger">*</span>
                        <select class="form-control qualify" id="qualification" name="qualification[]" multiple="multiple">
                            @foreach($qualifies as $qual)
                                <option value="{{ $qual->id }}">{{$qual->qualify}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('qualification'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('qualification') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-12">
                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('doctor.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection