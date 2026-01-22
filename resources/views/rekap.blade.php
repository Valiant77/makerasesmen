<h2>{{$user->name}}</h2>
<table>
    <thead>
        <th>Tanggal</th>
        <th>Kategori</th>
        <th>Alasan</th>
        <th>Jam</th>
    </thead>
    <tbody>
        @foreach ($absen as $a)
        <tr>
            <td>{{ $a->tanggal ?? 'N/A' }}</td>
            <td>{{ $a->status ?? 'N/A'}}</td>
            <td>{{ $a->alasan ?? 'N/A'}}</td>
            <td>{{ $a->created_at->format('H:i:s') ?? 'N/A' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>