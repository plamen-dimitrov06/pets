@extends('layout.index')

@section('content')
    <h1>Pets</h1>
    @if($pets->isEmpty())
        <p>No pets found.</p>
    @else
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Date created</th>
            </tr>
            @foreach ($pets as $pet)
                <tr>
                    @if ($highlight)
                        <td>{!! str_replace($highlight, "<b>{$highlight}</b>", $pet->name) !!}</td>
                    @else
                        <td>{{ $pet->name }}</td>
                    @endif
                    <td>{{ $pet->description }}</td>
                    <td>{{ ucfirst($pet->type->type) }}</td>
                    <td>{{ date_format($pet->created_at, 'd-m-Y') }}</td>
                </tr>
            @endforeach
        </table>
    @endif
    
@endsection