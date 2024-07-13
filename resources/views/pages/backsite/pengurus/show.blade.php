<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ isset($pengurus->nama) ? $pengurus->nama : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jabatan</th>
        <td>{{ isset($pengurus->jabatan->nama) ? $pengurus->jabatan->nama : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Kontak</th>
        <td>{{ isset($pengurus->kontak) ? $pengurus->kontak : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
            @if($pengurus->jenis_kelamin == 'laki-laki')
                <span>{{ 'Laki-laki' }}</span>
            @elseif($pengurus->jenis_kelamin == 'perempuan')
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ isset($pengurus->alamat) ? $pengurus->alamat : 'N/A' }}</td>
    </tr>
</table>
