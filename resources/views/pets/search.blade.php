@extends('layout.index')

@section('content')
    <h1>Pets search</h1>
    <form method="POST"  action="{{ route('pets.find') }}">
        @csrf

        <label for="name">Pet name :</label><br>
        <input type="text" name="name"><br>

        <label for="type">Type</label><br>
        <select name="type">
            <option></option>
            @foreach ($types as $type)
                <option value="{{ $type->type }}">{{ ucfirst($type->type) }}</option>
            @endforeach
        </select><br>

        <input type="submit" value="Search">
    </form>
@endsection