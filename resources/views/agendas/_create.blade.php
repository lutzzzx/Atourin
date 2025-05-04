@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Agenda</h1>
        <form action="{{ route('agendas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="judul">Title</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="form-group">
                <label for="lokasi_berangkat">Departure Location</label>
                <input type="text" class="form-control" id="lokasi_berangkat" name="lokasi_berangkat">
            </div>
            <div class="form-group">
                <label for="mulai">Start Date</label>
                <input type="date" class="form-control" id="mulai" name="mulai">
            </div>
            <div class="form-group">
                <label for="selesai">End Date</label>
                <input type="date" class="form-control" id="selesai" name="selesai">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection