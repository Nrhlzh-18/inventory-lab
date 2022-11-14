@extends('auth.bar')

@section('content')

    <main class="page landing-page">
        <section id="about" class="clean-block">
            <div class="container">
                <div class="block-heading">
                	<h4>
                		<strong>UPT Laboratorium Lingkungan at a Glance</strong>
                	</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p style="font-family: Poppins">
                        	UPT LABORATORIUM LINGKUNGAN, dibentuk berdasarkan Keputusan Bupati Bogor No. 70 Tahun 2008 tentang pembentukan Organisasi dan Tata Kerja Unit Pelaksana Teknis (UPT) Laboratorium Lingkungan pada Badan Lingkungan Hidup Kabupaten Bogor. <span id="dots">...</span><span id="more"> <br>
                            <br>
                        	Dengan adanya perubahan susunan perangkat daerah Nomor 12 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah, maka UPT Laboratorium Lingkungan ditetapkan kembali berdasarkan Peraturan Bupati Bogor No. 102 Tahun 2016 Tentang Pembentukan Organisasi dan Tata Kerja UPT Laboratorium Lingkungan pada Dinas Lingkungan Hidup Kabupaten Bogor.<br>
                            <br>
                        	Seiring bergulirnya waktu, untuk meningkatkan Pelayanan kepada masyarakat UPT Laboratorium Lingkungan dibentuk kembali berdasarkan Peraturan Bupati Bogor No. 33 Tahun 2018 Tentang Pembentukan Organisasi dan Tata Kerja UPT Laboratorium Lingkungan Kelas A pada Dinas Lingkungan Hidup Kabupaten Bogor yang berlaku sampai sekarang.<br>
                            <br>
                        	Pada tanggal 1 Januari 2020 UPT LABORATORIUM LINGKUNGAN menempati gedung Bekas Kantor Kelurahan Pakansari, Jl. H. Jairan Kel. Pakansari, Kec. Cibinong, Kab. Bogor di Cibinong.
                            <br>
                            <br>
							Pada tanggal 30 Januari 2014 UPT. Laboratorium telah terakreditasi oleh KAN dengan Nomor registrasi LP-808 IDN untuk 12 parameter air, selanjutnya pada 21 Februari 2018 UPT.Laboratorium terakreditasi kembali dan perubahan ISO 17025:2010 ke ISO. 17025:2017 pada 30 April 2019 dengan masa berlaku akreditasi sampai dengan 20 Februari 2022.<br>
                            <br>
							Tugas Pokok UPT LABORATORIUM LINGKUNGAN adalah membantu Kepala Dinas Lingkungan Hidup Kabupaten Bogor dalam kegiatan Sampling dan analisa, Air, Air Limbah dan Udara Ambient di Kabupaten Bogor.
                        </p>
                        <button onclick="myFunction()" id="myBtn" class="btn btn-success" style="margin-top: -15px;">Read more</button>
                        <div>
                            <img src="{{asset('assetsz/img/sertipikat.jpg')}}" width="100%" style="padding: 20px;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="color: white;">Visi dan Misi
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <strong>Visi : </strong>Mewujudkan UPT  Laboratorium Lingkungan DLH  Kabupaten  Bogor  sebagai laboratorium pengujian yang kompeten dan terpercaya menjadi rujukan di wilayah Jawa Barat
                                    </div>
                                    <div class="accordion-body">
                                        <strong>Misi : </strong>
                                        <ol type="1" style="font-family: poppins;">
                                            <li>Menerapkan pengelolaan  laboratorium berdasar SNI ISO/IEC 17025 dan Permen LH No. 06/2009 secara profesional dan konsisten.</li>
                                            <li>Meningkatkan kompetensi sumberdaya manusia dalam bidang pengujian dan pengambilan contoh uji.</li>
                                            <li>Meningkatkan kecukupan sarana dan prasarana laboratorium.</li>
                                            <li>Mengelola limbah laboratorium sehingga memenuhi baku mutu lingkungan.</li>
                                            <li>Meningkatkan efektivitas sistem manajemen untuk mencapai kepuasan pelanggan.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">Mutu
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">
                                        <strong>UPT  Laboratorium Lingkungan DLH Kabupaten  Bogor  mempunyai  komitmen dalam pelayanan pengujian dan pengambilan contoh air, air limbah dan udara secara profesional dan bertanggungjawab dengan mengutamakan kepuasan pelanggan, bebas dari tekanan komersial, keuangan atau apapun yang dapat mempengaruhi hasil pengujian, maka laboratorium berusaha untuk :</strong>
                                        <ol type="1">
                                            <li>Melaksanakan kegiatan pengujian dan pengambilan contoh yang mengacu kepada  standar kompetensi  laboratorium pengujian SNI ISO/IEC 17025:2017 dan standar lainnya yang relevan serta peraturan atau perundang-undangan yang berlaku.</li>
                                            <li>Mengelola  laboratorium secara profesional dan melakukan pengendalian seluruh kegiatan pengujian dan pengambilan contoh secara ketat untuk mencapai hasil pengujian yang akurat dan terpercaya dalam memenuhi standar pelayanan laboratorium.</li>
                                            <li>Menjamin kerahasiaan hasil uji dan hak kepemilikan pelanggan.</li>
                                            <li>Manajemen senantiasa meningkatkan kinerja dan efektifitas sistem manajemen.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">Pencapaian
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body">
                                        <strong>UPT Laboratorium Lingkungan melaksanakan kegiatan pengambilan dan analisa contoh uji yang ada atau ditugaskan oleh DLH. Kemudian UPT Laboratorium Lingkungan juga melakukan peningkatan – peningkatan mutu serta kualitas sesuai kemampuan dengan rincian sebagai berikut : </strong>
                                        <ol type="1">
                                            <li>Melaksanakan pengambilan dan analisa contoh uji air permukaan setiap tahunnya sebanyak 98 sampel air sungai, 108 sampel air danau dan 48 sampel udara ambient sesuai kegiatan milik DLH.</li>
                                            <li>Melaksanakan pendampingan, pengambilan dan analisa contoh uji kualitas lingkungan bila diperlukan oleh DLH jika ada pencemaran.</li>
                                            <li>Pada tahun 2011 UPT Laboratorium Lingkungan mulai menyusun, dan menetapkan dokumen Sistem Mutu (Sismut) sesuai ISO/ICE 17025, pada tahun 2012 mulai melakukan uji coba dan penerapan dokumen Sistem Mutu (Sismut) sesuai ISO/ICE 17025. Kemudian tanggal 30 Januari 2014 UPT Laboratorium Lingkungan telah terakreditasi oleh KAN dengan Nomor registrasi LP-808 IDN, untuk 12 parameter air. Selanjutnya ditahun 2017 UPT Laboratorium Lingkungan memproses pengajuan Reakreditasi sesuai ketentuan. Pada tanggal 21 Februari 2018 keputusan terakreditasi kembali diberikan ke UPT Laboratorium Lingkungan untuk 17 parameter air permukaan dan air limbah dengan masa berlaku akreditasi sampai dengan tanggal 20 Februari 2022</li>
                                            <li>UPT Laboratorium Lingkungan saat ini mampu menguji 36 parameter air dan 10 parameter udara. Dari 36 parameter air tersebut, 17 parameter air permukaan dan 17 parameter air limbah telah terakreditasi.</li>
                                            <li>Untuk lebih meningkatkan pelayanan secara umum, UPT Laboratorium Lingkungan telah mengajukan pembuatan PERDA tentang Retribusi Pelayanan, yang dilakukan mulai tahun 2015. Kemudian dilanjutkan dan diajukan secara resmi ditahun 2017. Per tanggal 6 Oktober 2018, PERDA sudah disahkan dan telah memulai pelayanan pengujian laboratorium secara umum. Sehingga pada tahun 2019, UPT Laboratorium Lingkungan sudah diwajibkan  menetapkan nilai target penyerapan retribusi pengujian laboratorium.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">Kegiatan lain terkait Mutu Pengujian
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body">
                                        <ol type="1">
                                            <li>Kalibrasi Alat Eksternal<br><p>UPT Laboratorium Lingkungan berusaha selalu menjaga kesesuaian peralatan uji terkait ruang lingkup akreditasi dengan melaksanakan kalibrasi ke laboratorium kalibrasi eksternal yang telah terakreditasi setiap tahunnya atau sesuai kebutuhan.</p></li>
                                            <li>Pengecekan Antara Peralatan<br><p>Untuk mempertahankan kondisi dan kinerja peralatan yang baik dan sesuai, pada peralatan uji selain dengan perawatan fisik secara rutin dan mengkalibrasi eksternal, UPT Laboratorium Lingkungan selalu melakukan pengecekan antara pada peralatan yang terkait ruang lingkup akreditasi secara internal sesuai program.</p></li>
                                            <li>Uji Profisiensi (UP)<br><p>Uji profisiensi merupakan salah satu tolak ukur untuk mengetahui atau menjaga mutu pengujian, dan juga salah satu yang dipersyaratkan oleh ISO/IEC 17025. UPT Laboratorium Lingkungan selalu diikutkan atau mengikuti program UP yang diselenggarakan oleh P3KLL-KLHK serpong setiap tahunnya/sesuai program sejak 2010 s/d sekarang secara gratis. Kemudian di tahun 2018 dan tahun 2020, UPT Laboratorium Lingkungan juga mengikuti UP berbayar yang diselenggarakan oleh PT. ERA, kesemua hasil menunjukan nilai rata-rata yang cukup memuaskan berdasarkan laporan penilaian UP dari penyelenggara. </p></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                	</div>
                </div>
            </div>
        </section>
    </main>
    

    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more"; 
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less"; 
                moreText.style.display = "inline";
            }
        }
    </script>
@endsection
