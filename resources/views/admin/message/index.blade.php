@extends('admin.adminMaster')

@section('admin')
    
        @foreach ($messages as $message)
            <h6>{{$message->message}}</h6>
        @endforeach

@endsection