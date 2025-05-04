@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User's Agendas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Departure Location</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendas as $agenda)
                    <tr>
                        <td>{{ $agenda->judul }}</td>
                        <td>{{ $agenda->lokasi_berangkat }}</td>
                        <td>{{ $agenda->mulai }}</td>
                        <td>{{ $agenda->selesai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
