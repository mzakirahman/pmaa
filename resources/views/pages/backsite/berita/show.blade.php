<table class="table table-bordered">
    <tr>
        <th>Author</th>
        <td>{{ isset($berita->author) ? $berita->author : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Judul</th>
        <td>{{ isset($berita->judul) ? $berita->judul : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Isi</th>
        <td>{{ isset($berita->isi) ? $berita->isi : 'N/A' }}</td>
    </tr>
</table>
