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
                <th scope="col" rowspan="2">No</th>
                <th scope="col" rowspan="2">Nama Analis</th>
                <th scope="col" rowspan="2">Tanggal Pengajuan</th>
                <th scope="col" rowspan="2">Tanggal Verifikasi</th>
                <th scope="col" rowspan="2">Verifikator</th>
                <th scope="col" rowspan="2">Pengujian</th>
                <th scope="col" rowspan="2">Parameter</th>
                <th scope="col" rowspan="2">Keterangan</th>
                <th scope="col" colspan="2">Bahan Yang Digunakan</th>
                <tr>
                    <th>Nama Reagent</th>
                    <th>Quantity</th>
                </tr>
            </tr>
        </thead>
        @foreach($pengajuanLayanan as $pl)
        <tbody>
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pl->user->name }}</td>
                <td>{{ $pl->tanggalPengajuan }}</td>
                <td>{{ $pl->tanggalVerifikasi }}</td>
                <td>{{ $pl->userVerif->name }}</td>
                <td>{{ $pl->layanan->pengujian->namaPengujian }}</td>
                <td>{{ $pl->layanan->parameter}}</td>
                <td>{{ $pl->keterangan }}</td>
                <td>
                    @foreach($pl->layanan->bahanLayanan as $bl)
                        <td>{{ $bl->bahan->namaReagent }}</td><br>
                    @endforeach
                </td>
                <td>
                    @foreach($pl->layanan->bahanLayanan as $bl)
                        {{ $bl->stokBahan }}<br>
                    @endforeach
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>