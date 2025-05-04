@extends('layouts.app')

@section('content')
    <h1>Add New Detail</h1>

    <form action="{{ route('details.store', $agenda) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul">Title</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
            @if ($errors->has('judul'))
                <div class="text-danger">{{ $errors->first('judul') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="kategori">Category</label>
            <select class="form-control" id="kategori" name="kategori">
                <option value="transportasi" {{ old('kategori') == 'transportasi' ? 'selected' : '' }}>Transportation</option>
                <option value="destinasi" {{ old('kategori') == 'destinasi' ? 'selected' : '' }}>Destination</option>
            </select>
            @if ($errors->has('kategori'))
                <div class="text-danger">{{ $errors->first('kategori') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="biaya">Cost</label>
            <input type="number" class="form-control" id="biaya" name="biaya" value="{{ old('biaya') }}">
            @if ($errors->has('biaya'))
                <div class="text-danger">{{ $errors->first('biaya') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="mulai">Start</label>
            <input type="datetime-local" class="form-control" id="mulai" name="mulai" value="{{ old('mulai') }}">
            @if ($errors->has('mulai'))
                <div class="text-danger">{{ $errors->first('mulai') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="selesai">End</label>
            <input type="datetime-local" class="form-control" id="selesai" name="selesai" value="{{ old('selesai') }}">
            @if ($errors->has('selesai'))
                <div class="text-danger">{{ $errors->first('selesai') }}</div>
            @endif
        </div>

        <input type="hidden" name="agenda_id" value="{{ $agenda->id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
