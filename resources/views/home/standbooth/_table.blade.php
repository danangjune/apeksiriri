<table class="table align-middle mb-0">
    <thead class="table-light">
        <tr>
            <th>Kategori</th>
            <th>Stand</th>
            <th>Nama</th>
            <th>Perusahaan</th>
            <th>Produk</th>
            <th>PIC</th>
            <th>No. Telp</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($standBooth as $item)
            <tr>
                <td data-label="Kategori">{{ $item->kategori }}</td>
                <td data-label="Stand">{{ $item->no_stand }}</td>
                <td data-label="Nama">{{ $item->nama_stand }}</td>
                <td data-label="Perusahaan">{{ $item->nama_perusahaan }}</td>
                <td data-label="Produk">{{ $item->jenis_produk }}</td>
                <td data-label="PIC">{{ $item->pic }}</td>
                <td data-label="No. Telp"><a href="tel:${item.no_telp}">{{ $item->no_telp }}</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Tidak ada hasil</td>
            </tr>
        @endforelse
    </tbody>
</table>
