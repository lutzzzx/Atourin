@extends('layouts.master-without-nav')
@section('title')
    Syarat dan Ketentuan
@endsection
@section('page-title')
    Syarat dan Ketentuan Penggunaan Leavin
@endsection
@section('body')

    <body>
@endsection
@section('content')

    {{-- Header Halaman --}}
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-4">
                <h1 class="fw-bolder display-5">Syarat dan Ketentuan Penggunaan Leavin</h1>
                <p class="lead mb-0">Berlaku Efektif: 14 Mei 2025</p>
            </div>
        </div>
    </header>

    {{-- Konten Utama Syarat dan Ketentuan --}}
    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10"> {{-- Membatasi lebar konten untuk keterbacaan --}}

                <p class="lead mb-4">
                    Selamat datang di Leavin! Aplikasi website agenda perjalanan atau itinerary yang dirancang untuk membantu Anda menyusun dan merencanakan agenda perjalanan pariwisata secara online. Dengan mengakses atau menggunakan layanan Leavin ("Layanan"), Anda setuju untuk terikat oleh Syarat dan Ketentuan ("Syarat") ini. Jika Anda tidak setuju dengan Syarat ini, Anda tidak diizinkan menggunakan Layanan.
                </p>

                <article>
                    {{-- Bagian 1: Definisi --}}
                    <section id="definisi" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">1. Definisi</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0"><strong>"Leavin"</strong>, <strong>"Kami"</strong>, atau <strong>"Kita"</strong> merujuk pada pemilik dan operator aplikasi Leavin.</li>
                            <li class="list-group-item px-0"><strong>"Anda"</strong> atau <strong>"Pengguna"</strong> merujuk pada individu atau entitas yang mengakses atau menggunakan Layanan.</li>
                            <li class="list-group-item px-0"><strong>"Layanan"</strong> merujuk pada semua fitur dan fungsionalitas yang disediakan oleh Leavin, termasuk pembuatan rencana perjalanan, penjadwalan, berbagi rencana, serta interaksi dan komunikasi dengan pengguna lain.</li>
                            <li class="list-group-item px-0"><strong>"Konten Pengguna"</strong> merujuk pada semua informasi, data, teks, foto, video, atau materi lain yang Anda unggah, posting, bagikan, atau sediakan melalui Layanan.</li>
                            <li class="list-group-item px-0"><strong>"Itinerary"</strong> merujuk pada rencana perjalanan yang dibuat menggunakan Layanan.</li>
                        </ul>
                    </section>

                    {{-- Bagian 2: Penerimaan Syarat --}}
                    <section id="penerimaan-syarat" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">2. Penerimaan Syarat</h2>
                        <p>Dengan membuat akun, mengakses, atau menggunakan Layanan, Anda menyatakan bahwa Anda telah membaca, memahami, dan setuju untuk terikat oleh Syarat ini dan Kebijakan Privasi kami (yang merupakan bagian tak terpisahkan dari Syarat ini). Jika Anda menggunakan Layanan atas nama suatu organisasi, Anda menyatakan dan menjamin bahwa Anda memiliki wewenang untuk mengikat organisasi tersebut pada Syarat ini.</p>
                    </section>

                    {{-- Bagian 3: Akun Pengguna --}}
                    <section id="akun-pengguna" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">3. Akun Pengguna</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">Untuk mengakses fitur tertentu dari Layanan, Anda mungkin diharuskan membuat akun.</li>
                            <li class="list-group-item px-0">Anda bertanggung jawab untuk menjaga kerahasiaan informasi akun Anda, termasuk kata sandi Anda.</li>
                            <li class="list-group-item px-0">Anda setuju untuk segera memberitahu kami tentang penggunaan akun Anda yang tidak sah atau pelanggaran keamanan lainnya.</li>
                            <li class="list-group-item px-0">Anda bertanggung jawab penuh atas semua aktivitas yang terjadi di bawah akun Anda.</li>
                            <li class="list-group-item px-0">Leavin berhak untuk menangguhkan atau menghentikan akun Anda jika informasi yang diberikan tidak akurat, tidak lengkap, atau melanggar Syarat ini.</li>
                        </ul>
                    </section>

                    {{-- Bagian 4: Penggunaan Layanan --}}
                    <section id="penggunaan-layanan" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">4. Penggunaan Layanan</h2>
                        <p>Leavin memberikan Anda lisensi terbatas, non-eksklusif, tidak dapat dipindahtangankan, dan dapat dibatalkan untuk menggunakan Layanan sesuai dengan Syarat ini. Anda setuju untuk tidak:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">Menggunakan Layanan untuk tujuan ilegal atau tidak sah.</li>
                            <li class="list-group-item px-0">Mengganggu atau mengacaukan operasi Layanan atau server atau jaringan yang terhubung ke Layanan.</li>
                            <li class="list-group-item px-0">Mencoba mendapatkan akses tidak sah ke Layanan, akun pengguna lain, atau sistem komputer atau jaringan yang terhubung ke Layanan.</li>
                            <li class="list-group-item px-0">Mengunggah, memposting, atau mengirimkan Konten Pengguna yang melanggar hukum, berbahaya, mengancam, kasar, melecehkan, memfitnah, vulgar, cabul, atau tidak pantas secara ras, etnis, atau lainnya.</li>
                            <li class="list-group-item px-0">Melanggar hak kekayaan intelektual pihak ketiga.</li>
                            <li class="list-group-item px-0">Menggunakan Layanan untuk mengirim spam atau pesan komersial yang tidak diminta.</li>
                            <li class="list-group-item px-0">Mengumpulkan atau menyimpan data pribadi tentang pengguna lain tanpa persetujuan mereka.</li>
                            <li class="list-group-item px-0">Meniru identitas orang atau entitas lain.</li>
                        </ul>
                    </section>

                    {{-- Bagian 5: Konten Pengguna --}}
                    <section id="konten-pengguna" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">5. Konten Pengguna</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">Anda mempertahankan kepemilikan atas Konten Pengguna yang Anda kirimkan ke Layanan.</li>
                            <li class="list-group-item px-0">Dengan mengirimkan Konten Pengguna, Anda memberikan Leavin lisensi global, non-eksklusif, bebas royalti, dapat disublisensikan, dan dapat dipindahtangankan untuk menggunakan, mereproduksi, mendistribusikan, menyiapkan karya turunan, menampilkan, dan menjalankan Konten Pengguna sehubungan dengan Layanan dan bisnis Leavin (dan penerusnya), termasuk namun tidak terbatas pada promosi dan redistribusi sebagian atau seluruh Layanan (dan karya turunannya) dalam format media apa pun dan melalui saluran media apa pun.</li>
                            <li class="list-group-item px-0">Anda menyatakan dan menjamin bahwa Anda memiliki semua hak, kuasa, dan wewenang yang diperlukan untuk memberikan lisensi yang disebutkan di atas untuk Konten Pengguna yang Anda kirimkan.</li>
                            <li class="list-group-item px-0">Leavin tidak mendukung Konten Pengguna apa pun atau opini, rekomendasi, atau saran apa pun yang diungkapkan di dalamnya, dan Leavin secara tegas menolak setiap dan semua tanggung jawab sehubungan dengan Konten Pengguna.</li>
                            <li class="list-group-item px-0">Leavin berhak (tetapi tidak berkewajiban) untuk meninjau, memantau, menolak, atau menghapus Konten Pengguna apa pun atas kebijakannya sendiri dan tanpa pemberitahuan sebelumnya jika Konten Pengguna tersebut melanggar Syarat ini atau dianggap tidak pantas.</li>
                        </ul>
                    </section>

                    {{-- Bagian 6: Interaksi Antar Pengguna --}}
                    <section id="interaksi-antar-pengguna" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">6. Interaksi Antar Pengguna</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">Layanan memungkinkan Anda untuk berinteraksi dan berkomunikasi dengan pengguna lain, serta berbagi rencana perjalanan.</li>
                            <li class="list-group-item px-0">Anda bertanggung jawab penuh atas interaksi Anda dengan pengguna lain. Leavin tidak bertanggung jawab atas perilaku pengguna lain.</li>
                            <li class="list-group-item px-0">Kami mendorong Anda untuk berhati-hati dan menggunakan penilaian yang baik saat berinteraksi dengan pengguna lain, terutama saat berbagi informasi pribadi atau bertemu secara langsung.</li>
                        </ul>
                    </section>

                    {{-- Bagian 7: Itinerary Perjalanan --}}
                    <section id="itinerary-perjalanan" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">7. Itinerary Perjalanan</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">Leavin adalah alat untuk membantu Anda merencanakan dan mengatur perjalanan Anda. Informasi yang disediakan dalam itinerary (seperti detail lokasi, jadwal, perkiraan biaya) bersifat informatif dan mungkin tidak selalu akurat atau terkini.</li>
                            <li class="list-group-item px-0">Anda bertanggung jawab untuk memverifikasi semua detail perjalanan Anda (misalnya, pemesanan hotel, penerbangan, jam operasional atraksi) secara independen.</li>
                            <li class="list-group-item px-0">Leavin tidak bertanggung jawab atas kerugian, kerusakan, atau ketidaknyamanan yang timbul dari penggunaan atau ketergantungan pada itinerary yang dibuat melalui Layanan.</li>
                        </ul>
                    </section>

                    {{-- Bagian 8: Hak Kekayaan Intelektual Leavin --}}
                    <section id="hak-kekayaan-intelektual" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">8. Hak Kekayaan Intelektual Leavin</h2>
                        <p>Semua hak, kepemilikan, dan kepentingan dalam dan terhadap Layanan (tidak termasuk Konten Pengguna), termasuk namun tidak terbatas pada semua perangkat lunak, teks, grafik, logo, ikon, gambar, klip audio, dan kode komputer, adalah dan akan tetap menjadi milik eksklusif Leavin dan pemberi lisensinya. Layanan dilindungi oleh hak cipta, merek dagang, dan undang-undang lainnya baik di Indonesia maupun di negara asing. Anda tidak boleh menyalin, memodifikasi, mendistribusikan, menjual, atau menyewakan bagian mana pun dari Layanan kami atau perangkat lunak yang disertakan, juga tidak boleh merekayasa balik atau mencoba mengekstrak kode sumber dari perangkat lunak tersebut, kecuali jika undang-undang mengizinkannya atau Anda memiliki izin tertulis dari kami.</p>
                    </section>

                    {{-- Bagian 9: Privasi --}}
                    <section id="privasi" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">9. Privasi</h2>
                        <p>Penggunaan Anda atas Layanan juga diatur oleh Kebijakan Privasi kami, yang menjelaskan bagaimana kami mengumpulkan, menggunakan, dan mengungkapkan informasi Anda. Silakan tinjau <a href="[Link ke Kebijakan Privasi Anda]" class="text-decoration-none fw-medium">Kebijakan Privasi</a> kami.</p>
                    </section>

                    {{-- Bagian 10: Pemutusan --}}
                    <section id="pemutusan" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">10. Pemutusan</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">Kami dapat menangguhkan atau menghentikan akses Anda ke Layanan, atas kebijakan kami sendiri, kapan saja dan dengan alasan apa pun atau tanpa alasan, termasuk jika Anda melanggar Syarat ini.</li>
                            <li class="list-group-item px-0">Anda dapat berhenti menggunakan Layanan kami kapan saja. Jika Anda ingin menghapus akun Anda, silakan hapus di akun profile atau hubungi kami di <a href="mailto:[Alamat Email Dukungan Anda]" class="text-decoration-none fw-medium">lutzzzx@gmail.com</a>.</li>
                            <li class="list-group-item px-0">Setelah pemutusan, hak Anda untuk menggunakan Layanan akan segera berakhir. Ketentuan yang menurut sifatnya harus tetap berlaku setelah pemutusan akan tetap berlaku, termasuk, tanpa batasan, ketentuan kepemilikan, penafian jaminan, ganti rugi, dan batasan tanggung jawab.</li>
                        </ul>
                    </section>

                    {{-- Bagian 11: Penafian Jaminan --}}
                    <section id="penafian-jaminan" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">11. Penafian Jaminan</h2>
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">PENTING!</h4>
                            <p>LAYANAN DISEDIAKAN "SEBAGAIMANA ADANYA" DAN "SEBAGAIMANA TERSEDIA" TANPA JAMINAN APAPUN, BAIK TERSURAT MAUPUN TERSIRAT, TERMASUK NAMUN TIDAK TERBATAS PADA JAMINAN DAPAT DIPERDAGANGKAN, KESESUAIAN UNTUK TUJUAN TERTENTU, NON-PELANGGARAN, DAN SETIAP JAMINAN YANG TIMBUL DARI JALUR PERDAGANGAN ATAU PENGGUNAAN PERDAGANGAN.</p>
                            <hr>
                            <p class="mb-0">LEAVIN TIDAK MENJAMIN BAHWA LAYANAN AKAN BEBAS DARI GANGGUAN, AMAN, ATAU BEBAS DARI KESALAHAN; BAHWA SETIAP CACAT ATAU KESALAHAN AKAN DIPERBAIKI; ATAU BAHWA HASIL YANG DIPEROLEH DARI PENGGUNAAN LAYANAN AKAN AKURAT ATAU DAPAT DIANDALKAN.</p>
                        </div>
                    </section>

                    {{-- Bagian 12: Batasan Tanggung Jawab --}}
                    <section id="batasan-tanggung-jawab" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">12. Batasan Tanggung Jawab</h2>
                        <div class="alert alert-danger" role="alert">
                             <p class="mb-0">SEJAUH DIIZINKAN OLEH HUKUM YANG BERLAKU, DALAM KEADAAN APAPUN LEAVIN, AFILIASINYA, DIREKTUR, KARYAWAN, AGEN, PEMASOK, ATAU PEMBERI LISENSINYA TIDAK AKAN BERTANGGUNG JAWAB ATAS KERUGIAN TIDAK LANGSUNG, INSIDENTAL, KHUSUS, KONSEKUENSIAL, ATAU HUKUMAN, TERMASUK NAMUN TIDAK TERBATAS PADA, KEHILANGAN KEUNTUNGAN, DATA, PENGGUNAAN, KEPERCAYAAN, ATAU KERUGIAN TIDAK BERWUJUD LAINNYA, YANG TIMBUL DARI (i) AKSES ANDA KE ATAU PENGGUNAAN ATAU KETIDAKMAMPUAN UNTUK MENGAKSES ATAU MENGGUNAKAN LAYANAN; (ii) SETIAP PERILAKU ATAU KONTEN PIHAK KETIGA PADA LAYANAN; (iii) SETIAP KONTEN YANG DIPEROLEH DARI LAYANAN; DAN (iv) AKSES, PENGGUNAAN, ATAU PERUBAHAN YANG TIDAK SAH ATAS TRANSMISI ATAU KONTEN ANDA, BAIK BERDASARKAN JAMINAN, KONTRAK, TORT (TERMASUK KELALAIAN), ATAU TEORI HUKUM LAINNYA, BAIK KAMI TELAH DIBERITAHU TENTANG KEMUNGKINAN KERUSAKAN TERSEBUT MAUPUN TIDAK, DAN BAHKAN JIKA UPAYA PERBAIKAN YANG DIJELASKAN DI SINI DITEMUKAN TELAH GAGAL DARI TUJUAN ESENSINIALNYA.</p>
                        </div>
                    </section>

                    {{-- Bagian 13: Ganti Rugi --}}
                    <section id="ganti-rugi" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">13. Ganti Rugi</h2>
                        <p>Anda setuju untuk membela, mengganti rugi, dan membebaskan Leavin dan afiliasinya, pejabat, direktur, karyawan, dan agennya dari dan terhadap setiap dan semua klaim, kerusakan, kewajiban, kerugian, tanggung jawab, biaya atau utang, dan pengeluaran (termasuk namun tidak terbatas pada biaya pengacara) yang timbul dari: (i) penggunaan dan akses Anda ke Layanan; (ii) pelanggaran Anda terhadap salah satu ketentuan Syarat ini; (iii) pelanggaran Anda terhadap hak pihak ketiga mana pun, termasuk tanpa batasan hak cipta, properti, atau hak privasi; atau (iv) klaim apa pun bahwa Konten Pengguna Anda menyebabkan kerusakan pada pihak ketiga. Kewajiban pembelaan dan ganti rugi ini akan tetap berlaku setelah Syarat ini dan penggunaan Anda atas Layanan berakhir.</p>
                    </section>

                    {{-- Bagian 14: Perubahan pada Syarat --}}
                    <section id="perubahan-syarat" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">14. Perubahan pada Syarat</h2>
                        <p>Kami berhak, atas kebijakan kami sendiri, untuk mengubah atau mengganti Syarat ini kapan saja. Jika revisi bersifat material, kami akan berusaha memberikan pemberitahuan setidaknya 30 hari sebelum syarat baru berlaku. Apa yang merupakan perubahan material akan ditentukan atas kebijakan kami sendiri. Dengan terus mengakses atau menggunakan Layanan kami setelah revisi tersebut berlaku, Anda setuju untuk terikat oleh syarat yang direvisi. Jika Anda tidak setuju dengan syarat baru, Anda tidak lagi diizinkan menggunakan Layanan.</p>
                    </section>

                    {{-- Bagian 15: Hukum yang Mengatur --}}
                    <section id="hukum-mengatur" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">15. Hukum yang Mengatur</h2>
                        <p>Syarat ini akan diatur dan ditafsirkan sesuai dengan hukum negara Republik Indonesia, tanpa memperhatikan pertentangan ketentuan hukumnya.</p>
                    </section>

                    {{-- Bagian 16: Penyelesaian Sengketa --}}
                    <section id="penyelesaian-sengketa" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">16. Penyelesaian Sengketa</h2>
                        <p>Setiap perselisihan yang timbul dari atau terkait dengan Syarat ini atau penggunaan Layanan akan diselesaikan melalui musyawarah untuk mufakat. Jika mufakat tidak tercapai dalam waktu [jumlah hari, mis., 30] hari, maka perselisihan akan dirujuk dan diselesaikan secara final oleh [Badan Arbitrase yang Ditunjuk di Indonesia, atau Pengadilan Negeri yang Berwenang].</p>
                    </section>

                    {{-- Bagian 17: Lain-lain --}}
                    <section id="lain-lain" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">17. Lain-lain</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0"><strong>Keterpisahan:</strong> Jika ada ketentuan dalam Syarat ini yang dianggap tidak sah atau tidak dapat dilaksanakan, ketentuan tersebut akan dibatasi atau dihilangkan seminimal mungkin, dan ketentuan lainnya dari Syarat ini akan tetap berlaku penuh.</li>
                            <li class="list-group-item px-0"><strong>Pengabaian:</strong> Tidak ada pengabaian atas ketentuan apa pun dari Syarat ini yang akan dianggap sebagai pengabaian lebih lanjut atau berkelanjutan atas ketentuan tersebut atau ketentuan lainnya, dan kegagalan Leavin untuk menegaskan hak atau ketentuan apa pun berdasarkan Syarat ini bukan merupakan pengabaian atas hak atau ketentuan tersebut.</li>
                            <li class="list-group-item px-0"><strong>Keseluruhan Perjanjian:</strong> Syarat ini, bersama dengan Kebijakan Privasi, merupakan keseluruhan perjanjian antara Anda dan Leavin mengenai penggunaan Layanan, dan menggantikan semua perjanjian sebelumnya atau pada saat yang sama antara Anda dan Leavin mengenai Layanan.</li>
                        </ul>
                    </section>

                    {{-- Bagian 18: Informasi Kontak --}}
                    <section id="informasi-kontak" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">18. Informasi Kontak</h2>
                        <p>Jika Anda memiliki pertanyaan tentang Syarat ini, silakan hubungi kami di:</p>
                        <address>
                            <strong>Email:</strong> <a href="mailto:[Alamat Email Kontak Anda, mis., support@leavin.com]" class="text-decoration-none fw-medium">lutzzzx@gmail.com</a><br>
                        </address>
                    </section>

                    {{-- Bagian 19: Kredit dan Atribusi --}}
                    <section id="kredit-atribusi" class="mb-5">
                        <h2 class="fw-bold border-bottom pb-2 mb-3">19. Kredit dan Atribusi</h2>
                        <p>Kami mengucapkan terima kasih kepada para penyedia sumber daya berikut yang telah membantu memperkaya tampilan dan pengalaman pengguna di Leavin:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0"><strong>Ikon:</strong> Semua ikon yang digunakan dalam aplikasi ini berasal dari <a href="https://boxicons.com/" target="_blank" rel="noopener noreferrer" class="text-decoration-none fw-medium">Boxicons</a>, yang dilisensikan di bawah <a href="https://creativecommons.org/licenses/by/4.0/" target="_blank" rel="noopener noreferrer" class="text-decoration-none fw-medium">Creative Commons Attribution 4.0 International License (CC BY 4.0)</a>.</li>
                            <li class="list-group-item px-0"><strong>Gambar:</strong> Beberapa gambar dan ilustrasi yang digunakan di platform kami disediakan oleh <a href="https://www.freepik.com/" target="_blank" rel="noopener noreferrer" class="text-decoration-none fw-medium">Freepik</a>. Kami menghargai kontribusi para kreator di Freepik.</li>
                        </ul>
                        <p class="mt-3">Kami berusaha untuk mematuhi semua persyaratan lisensi. Jika Anda menemukan adanya penggunaan yang tidak sesuai atau memiliki pertanyaan mengenai atribusi, silakan hubungi kami melalui informasi kontak yang tersedia.</p>
                    </section>
                </article>
            </div>
        </div>
    </main>

@endsection
@section('scripts')
    {{-- Pastikan script ini diperlukan untuk halaman ini, jika tidak bisa dihapus --}}
    <script src="{{ URL::asset('build/js/pages/pass-addon.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection