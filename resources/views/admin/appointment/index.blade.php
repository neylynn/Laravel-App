@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
        Appointment
        </h1>  
        <span class="breadcrumb"><a href='{{ route("appointment.create") }}' class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Create New Appointment</a></span>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        @include('flash::message') 
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @if($appointments->isEmpty())
                    <div class="well text-center">No records were found.</div>
                @else
                    <table class="table table-striped table-hover tbl_repeat" id="sortable">
                        <thead>
                            <th>No.</th>
                            <th>Doctor Name</th>
                            <th>Place</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                        <?php $index = 1; ?>
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $appointment->doctor->name }}</td>
                                <td>{{ $appointment->place }}</td>
                                <td>
                                <a href="{!! route('appointment.edit', [$appointment->id]) !!}"
                                   class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                                <a href="#" type="button" data-id="{{ $appointment->id }}"
                                   class="btn btn-xs btn-danger" data-toggle="modal"
                                   data-url="{{ url('admin/appointment/'.$appointment->id) }}"
                                   data-target="#deleteFormModal"><i
                                        class="fa fa-trash-o"></i>&nbsp;Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $appointments->appends($_GET)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection