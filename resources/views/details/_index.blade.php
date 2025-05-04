<!DOCTYPE html>
<html>
<head>
    <title>Details for Agenda</title>
</head>
<body>
    <h1>Agenda: {{ $agenda->judul }}</h1>
    <p>Lokasi Berangkat: {{ $agenda->lokasi_berangkat }}</p>
    <p>Mulai: {{ $agenda->mulai }}</p>
    <p>Selesai: {{ $agenda->selesai }}</p>

    <h2>Details</h2>
    <ul>
        @foreach($details as $detail)
            <li>
                <a href="{{ route('details.show', ['agenda' => $agenda->id, 'detail' => $detail->id]) }}">{{ $detail->judul }}</a>
                - {{ $detail->kategori }} - {{ $detail->biaya }}
            </li>
        @endforeach
    </ul>
</body>
</html>
