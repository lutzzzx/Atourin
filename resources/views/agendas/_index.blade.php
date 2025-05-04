@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agendas</h1>
        <a href="{{ route('agendas.create') }}" class="btn btn-primary">Create Agenda</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Departure Location</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendas as $agenda)
                <tr>
                    <td>{{ $agenda->judul }}</td>
                    <td>{{ $agenda->lokasi_berangkat }}</td>
                    <td>{{ $agenda->mulai }}</td>
                    <td>{{ $agenda->selesai }}</td>
                    <td>
                        <a href="{{ route('agendas.show', $agenda) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('agendas.edit', $agenda) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('agendas.destroy', $agenda) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this agenda?')">Delete</button>
                        </form>
                        <a href="{{ route('details.index', ['agenda' => $agenda]) }}" class="btn btn-success btn-sm">View Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
