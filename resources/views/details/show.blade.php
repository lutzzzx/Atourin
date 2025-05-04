<!DOCTYPE html>
<html>
<head>
    <title>Detail Agenda</title>
</head>
<body>
    <h1>Agenda: {{ $agenda->judul }}</h1>
    <p>Lokasi Berangkat: {{ $agenda->lokasi_berangkat }}</p>
    <p>Mulai: {{ $agenda->mulai }}</p>
    <p>Selesai: {{ $agenda->selesai }}</p>

    <h2>Detail</h2>
    <p>Judul: {{ $detail->judul }}</p>
    <p>Kategori: {{ $detail->kategori }}</p>
    <p>Biaya: {{ $detail->biaya }}</p>
    <p>Mulai: {{ $detail->mulai }}</p>
    <p>Selesai: {{ $detail->selesai }}</p>
</body>
</html>