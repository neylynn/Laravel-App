 @extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Doctor
        </h1>
        <span class="breadcrumb"><a href='{{ route("doctor.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Doctor</a></span>
    </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                  {!! Form::model($doctor, ['route' => ['doctor.update', $doctor->id], 'method' => 'patch', 'files' => 'true']) !!}
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
                        <select class="form-control qualify" name="qualification[]" multiple="true">
                            @foreach($qualifies as $qual)
                                <option value="{{ $qual->id }}"
                                  @if(in_array($qual->id, $q_selected))
                                    selected 
                                  @endif
                                  >{{$qual->qualify}}</option>
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