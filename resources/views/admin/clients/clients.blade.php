@extends('layouts.admin-dashboard')

@section('admin-dash-content')
    <table>
       <thead>
          <tr>
             <th data-field="name">Nombre</th>
             <th data-field="lastname">Apellidos</th>
             <th data-field="email">Email</th>
    {{--          <th data-field="name">Mac</th>
             <th data-field="price">Placa</th>
             <th data-field="price">Cliente</th> --}}
          </tr>
       </thead>

       <tbody>
          @foreach ($clients as $client)
             <tr>
                <td>{{$client->name}}</td>
                <td>{{$client->lastname}}</td>
                <td>{{$client->email}}</td>
            {{--     <td>{{$car->device}}</td>
                <td>{{$car->license_plate}}</td>
                <td>{{$car->name}}</td> --}}
              </tr>
          @endforeach

       </tbody>
    </table>




@endsection
