 @extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Qualify
        </h1>
        <span class="breadcrumb"><a href='{{ route("qualify.index") }}' class="btn btn-sm btn-primary"><i  class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Qualify</a></span>
    </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::model($qualify, ['route' => ['qualify.update', $qualify->id], 'method' => 'patch', 'files' => 'true']) !!}
                        <div class="form-group col-sm-12 mmtext">
                            {!! Form::label('qualify', 'Qualify:') !!} <span class="text-danger">*</span>
                            {!! Form::text('qualify', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('qualify'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('qualify') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('qualify.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection