@extends('layouts.app')

@section('content')
    <h1>Edit Detail</h1>

    <form action="{{ route('details.update', ['agenda' => $agenda->id, 'detail' => $detail->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Title</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $detail->judul }}">
        </div>

        <div class="form-group">
            <label for="kategori">Category</label>
            <select class="form-control" id="kategori" name="kategori">
                <option value="transportasi" {{ $detail->kategori == 'transportasi' ? 'selected' : '' }}>Transportation</option>
                <option value="destinasi" {{ $detail->kategori == 'destinasi' ? 'selected' : '' }}>Destination</option>
            </select>
        </div>

        <div class="form-group">
            <label for="biaya">Cost</label>
            <input type="number" class="form-control" id="biaya" name="biaya" value="{{ $detail->biaya }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
