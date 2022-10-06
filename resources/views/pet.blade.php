@extends('layouts.main')
@section('content')
    <div>
        pets table
    </div>  
    
    @foreach($pets as $pet) 
        <div> {{ $pet->name }} </div>
        <div> {{ $pet->animal }} </div>
        <div> {{ $pet->passport_id }}  </div>
    @endforeach
    
@endsection
