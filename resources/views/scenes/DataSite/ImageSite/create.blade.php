@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Add Image</h1>

    <form action="{{ route('images.store', $datasite->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="upload_date">Upload Date:</label>
            <input type="date" name="upload_date" id="upload_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Image</button>
    </form>

    <a href="{{ route('datasites.show', $datasite->id) }}" class="btn btn-secondary mt-3">Back to Data Site</a>
</div>
@endsection
