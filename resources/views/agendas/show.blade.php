@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agenda Detail</h1>
        <p><strong>Title:</strong> {{ $agenda->judul }}</p>
        <p><strong>Departure Location:</strong> {{ $agenda->lokasi_berangkat }}</p>
        <p><strong>Start Date:</strong> {{ $agenda->mulai }}</p>
        <p><strong>End Date:</strong> {{ $agenda->selesai }}</p>
        <a href="{{ route('agendas.index') }}" class="btn btn-primary">Back to Agendas</a>
    </div>
@endsection