<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ isset($murid->nama) ? $murid->nama : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
            @if($murid->jenis_kelamin == 'laki-laki')
                <span>{{ 'Laki-laki' }}</span>
            @elseif($murid->jenis_kelamin == 'perempuan')
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>NISN</th>
        <td>{{ isset($murid->nisn) ? $murid->nisn : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Nama Wali</th>
        <td>{{ isset($murid->nama_wali) ? $murid->nama_wali : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Kontak</th>
        <td>{{ isset($murid->kontak) ? $murid->kontak : 'N/A' }}</td>
    </tr>
</table>
