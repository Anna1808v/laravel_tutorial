@extends('layouts.main')
@section('content') 
    <div>
        <div> {{$pet->id}}. {{ $pet->name }} {{ $pet->animal }} {{ $pet->passport_id }} </div>
        <br>
        <div> 
            <a href="{{ route('pet.edit', $pet->id) }}" class="btn btn-info">Edit</a> 
        </div> 

        <div>
            <form action="{{ route('pet.destroy', $pet->id) }}" method="post">
                @csrf 
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>

        <div> 
            <a href="{{ route('pet.index') }}" class="btn btn-warning">Back</a> 
        </div>
    </div>
@endsection
