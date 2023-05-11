<li class="{{ Request::is('doctor*') ? 'active' : '' }}">
    <a href="{{ route('doctor.index') }}"><i class="fa fa-edit"></i><span>Doctor</span></a>
</li>

<li class="{{ Request::is('appointment*') ? 'active' : '' }}">
    <a href="{{ route('appointment.index') }}"><i class="fa fa-edit"></i><span>Appointment</span></a>
</li>

<li class="{{ Request::is('qualify*') ? 'active' : '' }}">
    <a href="{{ route('qualify.index') }}"><i class="fa fa-edit"></i><span>Qualify</span></a>
</li>

<li class="{{ Request::is('patient*') ? 'active' : '' }}">
    <a href="{{ route('patient.index') }}"><i class="fa fa-edit"></i><span>Patient</span></a>
</li>