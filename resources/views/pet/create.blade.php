@extends('layouts.main')
@section('content') 
    <div>
        <form action="{{ route('pet.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="name" placeholder="Name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="animal" class="form-label">Animal</label>
                <input value="{{ old('animal') }}" type="text" name="animal" class="form-control" id="animal" placeholder="Animal">
                @error('animal')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="passport_id" class="form-label">Passport ID</label>
                <input value="{{ old('passport_id') }}" type="number" name="passport_id" class="form-control" id="passport_id" placeholder="Passport ID">
                @error('passport_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $category)
                        <option 
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->name }}
                        </option>
                    
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="hashtags">Tags</label>
                <select multiple class="form-control" id="hashtags" name="hashtags[]">
                    @foreach($hashtags as $hashtag)
                        <option 
                            {{ old('hashtags') != null && in_array($hashtag->id, old('hashtags')) ? 'selected' : '' }}
                            value="{{ $hashtag->id}} ">{{ $hashtag->title}}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
