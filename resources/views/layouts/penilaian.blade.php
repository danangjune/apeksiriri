<!-- Modal Feedback -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="min-height: 70vh;">
        <div class="modal-header">
            <h5 class="modal-title" id="feedbackModalLabel">Daftar Nama Liaison Officer</h5>
        </div>
        <div class="modal-body">
            <div id="feedbackForm">
              <table class="table table-striped table-bordered table-hover" aria-label="Daftar kontak lengkap dengan nomor urut, nama, kota dan kontak">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA LENGKAP</th>
                    <th scope="col">KOTA</th>
                    <th scope="col">CONTACT</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>Dimas Teo Andrian Putra, S.STP</td>
                    <td>Mojokerto</td>
                    <td>085721156162</td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>Aulia Rahma, S.Tr.IP</td>
                    <td>Probolinggo</td>
                    <td>081214278383</td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>Ahmad Tio Pamungkas, S.STP</td>
                    <td>Mataram</td>
                    <td>082248113064</td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>Fajar Setiawan, S.STP</td>
                    <td>Kupang</td>
                    <td>081232497109</td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td>Rasid Kusuma Pranata, S.Tr.IP</td>
                    <td>Batu</td>
                    <td>081259223562</td>
                  </tr>
                  <tr>
                    <td>6.</td>
                    <td>Solaekhah Dwi Pratiwi, S.STP</td>
                    <td>Malang</td>
                    <td>082232676931</td>
                  </tr>
                  <tr>
                    <td>7.</td>
                    <td>Hilman Endi Syahrir, S.STP</td>
                    <td>Madiun</td>
                    <td>081224594686</td>
                  </tr>
                  <tr>
                    <td>8.</td>
                    <td>Adha Prabowo Iyasa, S.STP</td>
                    <td>Pasuruan</td>
                    <td>081312418162</td>
                  </tr>
                  <tr>
                    <td>9.</td>
                    <td>Mario Ari Putra, S.STP</td>
                    <td>Bima</td>
                    <td>081252284224</td>
                  </tr>
                  <tr>
                    <td>10.</td>
                    <td>Ari Samudro Pribadi, S.Tr.IP</td>
                    <td>Blitar</td>
                    <td>08122221660</td>
                  </tr>
                  <tr>
                    <td>11.</td>
                    <td>Melliyana Dwi Febriyanti, S.Tr.IP</td>
                    <td>Surabaya</td>
                    <td>082234614245</td>
                  </tr>
                  <tr>
                    <td>12.</td>
                    <td>Deniz Assidiqi R, S.STP</td>
                    <td>Denpasar</td>
                    <td>081224359241</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector(".feedback-btn").addEventListener("click", function () {
        var feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'), {
            backdrop: 'static', // Mencegah modal tertutup saat klik luar
            keyboard: false // Opsional: mencegah modal tertutup dengan tombol Esc
        });
        feedbackModal.show();
        });
    });
</script>

