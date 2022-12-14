@extends('layout')

@section('title')
    Update Page
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center display-4">Update Todo</h1>
            </div>
            <div class="col-md-12">
                <form method="POST" action="{{ route('update', $id->id) }}">
                    @csrf
                    <label for="title">Title*</label>
                                                                    {{-- the old will return  --}}
                    <input type="text" name="title" id="title" value="{{ old('title') ? old('title') :$id->title }}" class="form-control mb-2"/>
                    {{-- validation using laravel --}}
                    @error('title')
                            <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="submit" class="btn btn-dark btn-block" value="Update"/>
                </form>
            </div>
        </div>
    </div>
@endsection
