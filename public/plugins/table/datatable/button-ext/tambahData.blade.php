<!-- MODAL TAMBAH DATA -->
                        <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahBarang" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/bahan" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput">Kode barang</label>
                                                <input value="{{ old('kodeBarang') }}" required name="kodeBarang" type="text" required class="form-control" id="floatingInput">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput2">Nama Barang</label>
                                                <input value="{{ old('namaBarang') }}" required name="namaBarang" type="text" required class="form-control" id="floatingInput2">
                                            </div>
                                           
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput4">Spesifikasi</label>
                                                <input value="{{ old('type') }}" required name="type" type="text" required class="form-control" id="floatingInput4">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput5">Stok Bahan</label>
                                                <input value="{{ old('stokBahan') }}" required name="stokBahan" type="number" required class="form-control" id="floatingInput5">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput6">Satuan</label>
                                                <input value="{{ old('satuan') }}" required name="satuan" type="text" required class="form-control" id="floatingInput6">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput7">Harga Satuan</label>
                                                <input value="{{ old('hargaSatuan') }}" required name="hargaSatuan" type="number" required class="form-control" id="floatingInput7">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput8">Penyedia</label>
                                                <input value="{{ old('penyedia') }}" required name="penyedia" type="text" required class="form-control" id="floatingInput8">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput9">Tempat Penyimpanan</label>
                                                <input value="{{ old('tempatPenyimpanan') }}" required name="tempatPenyimpanan" type="text" required class="form-control" id="floatingInput9">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput">Keterangan</label>
                                                <textarea class="form-control" required value="{{ old('keterangan') }}" name="keterangan" id="floatingTextarea2" style="height: 100px"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Foto</label>
                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                <input name="foto" class="form-control" type="file" id="image" name="image" onchange="previewImage()">       
                                            </div>
                                            <div class="input-group">
                                                <button class="btn btn-success rounded me-1" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TAMBAH DATA -->