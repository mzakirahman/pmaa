<table class="table table-bordered">
    <tr>
        <th>Judul</th>
        <td>{{ isset($fasilitas->judul) ? $fasilitas->judul : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Isi</th>
        <td>{{ isset($fasilitas->isi) ? $fasilitas->isi : 'N/A' }}</td>
    </tr>
</table>
