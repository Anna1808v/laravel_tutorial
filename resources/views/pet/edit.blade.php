@extends('layouts.main')
@section('content') 
    <div>
        <form action="{{ route('pet.update', $pet->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $pet->name }}">
            </div>
            <div class="mb-3">
                <label for="animal" class="form-label">Animal</label>
                <input type="text" name="animal" class="form-control" id="animal" placeholder="Animal" value="{{ $pet->animal }}">
            </div>
            <div class="mb-3">
                <label for="passport_id" class="form-label">Passport ID</label>
                <input type="number" name="passport_id" class="form-control" id="passport_id" placeholder="Passport ID" value="{{ $pet->passport_id }}">
            </div>
            <div class="form-group">
                <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $category)
                        <option 
                            <? $category->id === $pet->category_id ? 'selected' : '' ?>
                            value="{{ $category->id }}">{{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
