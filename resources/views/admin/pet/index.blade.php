@extends('layouts.admin')

@section('content')
    <div>
        <div> 
            <a href="{{ route('pet.create') }}" class="btn btn-success">Add a new pet</a> 
        </div>  

        @foreach($pets as $pet) 
            <div> <a href="{{ route('pet.show', $pet->id) }}"> {{ $pet->id }}. {{ $pet->name }}</a> </div>
        @endforeach
    
        <div class="mt-3">
            {{ $pets->withQueryString()->links() }}
        </div>
    </div>
@endsection