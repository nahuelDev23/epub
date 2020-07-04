@extends('layouts.app')

@section('content')

    <h1>You are currently not connected to any networks.</h1>
    @foreach($pdf as $libro)
                  <tr>
                        <td>{{$libro->name}}</td>
                        <td><a href="{{route('pdf.show',$libro->id)}}">Ver</a></td>
                        <td>
                              {!!Form::open(['route' => ['pdf.destroy',$libro->id],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                              {!!Form::close()!!}
                        </td>
                        
                  </tr>
                  @endforeach
    <h2>debajo</h2>
@endsection