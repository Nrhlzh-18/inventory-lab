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

</style>


    <table>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Bahan</th>
                <th scope="col">Nama Reagent</th>
                <th scope="col">Quantity</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Tanggal Verifikasi</th>
                <th scope="col">Bahan Yang DiAjukan</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        @foreach($bahanPengajuan as $bp)
        <tbody>
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $bp->bahan->kodeBarang }}</td>
                <td>{{ $bp->bahan->namaReagent }}</td>
                <td>{{ $bp->stokBahan }}</td>
                <td>{{ $bp->tanggalPengajuan }}</td>
                <td>{{ $bp->tanggalVerifikasi }}</td>
                <td>{{ $bp->keterangan }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    