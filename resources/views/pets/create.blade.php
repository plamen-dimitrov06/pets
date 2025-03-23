@extends('layout.index')

@section('content')
    <h1>Pets</h1>
    <form method="POST"  action="{{ route('pets.store') }}">
        @csrf

        <label for="name">Pet name :</label><br>
        <input type="text" name="name" required><br>

        <label for="description">Pet description :</label><br>
        <input type="text" name="description" required><br>

        <label for="type">Type</label><br>
        <select name="type" required>
            @foreach ($types as $type)
                <option value="{{ $type->type }}">{{ ucfirst($type->type) }}</option>
            @endforeach
        </select><br>

        <input type="submit" value="Create">
    </form>
@endsection