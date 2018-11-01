<nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="nav-icon icon-speedometer"></i> Dashboard
              </a>
            </li>
            @if(in_array('registrationRead', $readPermissions))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.registracija') }}">Registruj novog korisnika</a>
              </li>
            @endif
            <li class="nav-item">

            </li>

            @if(in_array('userRead', $readPermissions))
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#"> Upravljaj korisnicima</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class='nav-link' href="{{ route('admin.users.admins')}}">Administratori</a>
                </li>
                <li class="nav-item">
                    <a href = "{{route('admin.users.assistants')}}" class = "nav-link">Recepcija</a>
                </li>
                <li class="nav-item">
                    <a href = "{{route('admin.users.doctors')}}" class = "nav-link">Doktori</a>
                </li>
                <li class="nav-item">
                  <a class = 'nav-link' href="{{ route('admin.users.patients')}}">Pacijenti</a>
                </li>
                <li class="nav-item">
                  <a class = 'nav-link' href="{{ route('admin.users.bookkeepers')}}">Knjigovodje</a>
                </li>
              </ul>
            </li>
            @endif

            @if(in_array('roleRead', $readPermissions))
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#"> Upravljaj ulogama</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class='nav-link' href="{{ route('admin.roles')}}">Pregled uloga</a>
                </li>
                <li class="nav-item">
                    <a href = "{{route('admin.role.create')}}" class = "nav-link">Unesi novu ulogu</a>
                </li>

              </ul>
            </li>
            @endif

            @if(in_array('permissionRead', $readPermissions))
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#"> Upravljaj dozvolama</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="buttons/buttons.html">
                    <a class="nav-link" href="{{ route('admin.permissions')}}">Pregled dozvola</a>
                </li>
                <li class="nav-item">
                    <a href = "{{route('admin.permission.create')}}" class = "nav-link">Unesi novu dozvolu</a>
                </li>
                <li class="nav-item">
                    <a href = "{{route('admin.role-permission.create')}}" class = "nav-link">Dodeljivanje dozvola</a>
                </li>

              </ul>
            </li>
            @endif

            @if(in_array('appointmentRead', $readPermissions))
              <li class="nav-item">
                  <a class = 'nav-link' href="{{ route('doktor.pregledi') }}">Uvid u preglede</a>
              </li>
            @endif

            @if(in_array('assignmentPatientRead', $readPermissions))
             <li class="nav-item">
                <a class = 'nav-link' href="{{ route('assignment.patients') }}">Dodeli pacijente</a>
            </li>
            @endif

            @if(in_array('doctorPatientsRead', $readPermissions))
             <li class="nav-item">
                <a class = 'nav-link' href="{{ route('doctor.patients') }}">Moji pacijenti</a>
            </li>
            @endif

            @if(in_array('makeAppointmentRead', $readPermissions))
              <li class="nav-item">
                <a class = 'nav-link' href ="{{ route('doctor.make-appointment')}}">Zakazi pregled</a>
              </li>
            @endif


            @if(in_array('myAppointmentsRead', $readPermissions))
             <li class="nav-item">
                <a class = 'nav-link' href="{{ route('doctor.patients') }}">Moji pacijenti</a>
            </li>
            @endif

            @if(in_array('paymentRead', $readPermissions))
            <li class="nav-item">
                <a class = 'nav-link' href="{{ route('bookkeeper.payments') }}">Uvid u placanja</a>
            </li>
            @endif

          @if(Auth::guard('web')->check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('patient.appointments') }}">Moji pregledi</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('patient.payments') }}">Uvid u placanja</a>
            </li>
            @endif

          </ul>
        </nav>