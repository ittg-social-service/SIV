@extends('layouts.admin-dashboard')

@section('admin-dash-content')
    <table>
       <thead>
          <tr>
             <th data-field="id">Tipo</th>
             <th data-field="name">Mac</th>
             <th data-field="price">Placa</th>
             <th data-field="price">Cliente</th>
          </tr>
       </thead>

       <tbody>
          @foreach ($devices as $device)
             <tr>
                <td>{{$device->type}}</td>
                <td>{{$device->device}}</td>
                <td>{{$device->license_plate}}</td>
                <td>{{$device->name}}</td>
              </tr>
          @endforeach

       </tbody>
    </table>


    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red" href="{{ url('admin/devices/create') }}">
          <i class="large material-icons">mode_edit</i>
        </a>
    {{--     <ul>
          <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
          <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
          <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
          <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
        </ul> --}}
      </div>
@endsection
