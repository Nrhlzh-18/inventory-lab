<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>


    <table>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Reagent</th>
                <th scope="col">Stok Bahan</th>
                <th scope="col">Satuan</th>
                <th scope="col">Stok Minimum</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Penyedia</th>
                <th scope="col">Tempat Penyimpanan</th>
                <th scope="col">Keterangan</th>            
            </tr>
        <tbody>
        </thead>
        @foreach($bahan as $b)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $b->kodeBarang }}</td>
                <td>{{ $b->namaReagent }}</td>
                <td>{{ $b->stokBahan }}</td>
                <td>{{ $b->satuan }}</td>
                <td>{{ $b->stokMinimum }}</td>
                <td>{{ $b->hargaSatuan }}</td>
                <td>{{ $b->penyedia }}</td>
                <td>{{ $b->tempatPenyimpanan }}</td>
                <td>{{ $b->keterangan }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>