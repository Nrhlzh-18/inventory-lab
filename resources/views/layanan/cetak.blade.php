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
                <th scope="col" rowspan="2" style="text-align: center;">No</th>
                <th scope="col" rowspan="2" style="text-align: center;">Pengujian</th>
                <th scope="col" rowspan="2" style="text-align: center;">Parameter</th>
                <th scope="col" colspan="2" style="text-align: center;">Bahan</th>
                <tr>
                    
                    <th scope="col">Nama Reagent</th>
                    <th scope="col">Quantity</th>
                </tr>
            </tr>
        <tbody>
        </thead>
        @foreach($layanan as $l)
            <tr>
                <th scope="row" style="text-align: center;">{{ $loop->iteration }}</th>
                <td>{{ $l->pengujian->namaPengujian }}</td>
                <td>{{ $l->parameter }}</td>
                <td>
                @foreach($l->bahanLayanan as $bl)
                    {{ $bl->bahan->namaReagent }}<br>
                @endforeach
                </td>
                <td>
                @foreach($l->bahanLayanan as $bl)
                    {{ $bl->stokBahan }}<br>
                @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>