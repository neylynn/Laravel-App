 @extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Patient
        </h1>
        <span class="breadcrumb"><a href='{{ route("patient.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Doctor</a></span>
    </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                  {!! Form::model($patient, ['route' => ['patient.update', $patient->id], 'method' => 'patch']) !!}
                    <div class="form-group col-sm-12 mmtext">
                        {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                  <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('patient.index') !!}" class="btn btn-default">Cancel</a>
                 </div>
                {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>  
@endsection