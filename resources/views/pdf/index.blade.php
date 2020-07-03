@extends('layouts.app')
@section('content')
      <h1>Nuestros libros</h1>
      <table>
            <thead>
                  <tr>
                        <th>Libro</th>
                        <th>Accion</th>
                  </tr>
            </thead>
            <tbody>
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
            </tbody>
      </table>
@endsection