@extends('layouts.app')
@section('content')
      {!! Form::open(['route' => 'pdf.store', 'files' => true]) !!}
            {{Form::label('name','Nombre del libro')}}
            {{Form::text('name')}}

            {{Form::file('epub')}}
            {{Form::submit('Subir',['class'=>'btn btn-sm btn-primary'])}}
       {!!Form::close() !!}
@endsection