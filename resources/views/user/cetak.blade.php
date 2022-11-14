
    <table class="table" style="width: 100%;" border="1">
    <thead>
        <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
    @foreach($user as $u)
  <tbody>
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->role }}</td>
    </tr>
  </tbody>
    @endforeach
</table>