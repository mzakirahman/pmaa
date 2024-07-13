<table class="table table-bordered">
    <tr>
        <th>Judul</th>
        <td>{{ isset($galeri->judul) ? $galeri->judul : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Isi</th>
        <td>{{ isset($galeri->isi) ? $galeri->isi : 'N/A' }}</td>
    </tr>
</table>
