@extends('layout')
@section('content')
    <form action="{{route('dataStore')}}" method="POST">
      @csrf
        <label>Name :</label>
        <input type="text" name="name">
        <span>
            @if($errors->has('name'))
                {{ $errors->first('name')}}
            @endif    
        </span>
        <label>Email :</label>
        <input type="text" name="email">
        <span>
            @if($errors->has('email'))
                {{ $errors->first('name')}}
            @endif    
        </span>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection