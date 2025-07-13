<!-- Modal Feedback -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="min-height: 80vh;">
        <div class="modal-header">
            <h5 class="modal-title" id="feedbackModalLabel">Berikan Masukan Untuk Perbaikan Website Pemkot Kediri</h5>
        </div>
        <div class="modal-body">
            <form id="feedbackForm">
            <div class="mb-3 text-center">
                <label class="form-label">Seberapa Puas Anda dengan Website Ini?</label>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-danger emoji-btn" data-value="1"><img src="{{ asset('assets/images/tidakpuas.png') }}" alt=""></button>
                    <button type="button" class="btn btn-outline-warning emoji-btn" data-value="2"><img src="{{ asset('assets/images/cukuppuas.png') }}" alt=""></button>
                    <button type="button" class="btn btn-outline-info emoji-btn" data-value="3"><img src="{{ asset('assets/images/puas.png') }}" alt=""></button>
                    <button type="button" class="btn btn-outline-success emoji-btn" data-value="4"><img src="{{ asset('assets/images/sangatpuas.png') }}" alt=""></button>
                </div>
                <p id="feedbackText" class="mt-2 fw-bold"></p>
                <input type="hidden" id="feedbackRating" name="rating">
            </div>

            <!-- Pertanyaan 1 -->
            <div class="mb-3">
                <label class="form-label">Apakah informasi di website ini mudah ditemukan?</label>
                <select class="form-select" id="infoEase">
                <option value="sangat mudah">Sangat Mudah</option>
                <option value="cukup mudah">Cukup Mudah</option>
                <option value="sulit">Sulit</option>
                <option value="sangatsulit">Sangat Sulit</option>
                </select>
            </div>

            <!-- Pertanyaan 2 -->
            <div class="mb-3">
                <label class="form-label">Apakah informasi yang disajikan di website ini akurat dan up-to-date?</label>
                <select class="form-select" id="infoAccuracy">
                <option value="selalu up to date">Selalu up-to-date</option>
                <option value="kadang perlu diperbarui">Kadang-kadang perlu diperbarui</option>
                <option value="sering tidak akurat">Sering tidak akurat</option>
                <option value="tidak tahu">Tidak tahu</option>
                </select>
            </div>

            <!-- Pertanyaan 3 -->
            <div class="mb-3">
                <label class="form-label">Apakah informasi di website ini mudah dipahami?</label>
                <select class="form-select" id="infoClarity">
                <option value="sangat jelas">Sangat Jelas</option>
                <option value="cukup jelas">Cukup Jelas</option>
                <option value="kurang jelas">Kurang Jelas</option>
                <option value="sulit dimengerti">Sulit Dimengerti</option>
                </select>
            </div>

            <!-- Pertanyaan 4 -->
            <div class="mb-3">
                <label class="form-label">Kategori informasi apa yang paling sering Anda cari di website ini?</label>
                <select class="form-select" id="infoCategory">
                <option value="agenda kota">Agenda Kota</option>
                <option value="pengumuman pemerintah">Pengumuman Pemerintah</option>
                <option value="layanan publik">Layanan Publik</option>
                <option value="berita artikel">Berita & Artikel</option>
                <option value="lainnya">Lainnya (Tulis di kolom saran)</option>
                </select>
            </div>

            <!-- Pertanyaan 5 -->
            <div class="mb-3">
                <label class="form-label">Apakah ada informasi yang menurut Anda kurang atau perlu ditambahkan?</label>
                <select class="form-select" id="infoSuggestion">
                <option value="ya">Ya (Tulis di kolom saran)</option>
                <option value="tidak">Tidak</option>
                </select>
            </div>

            <!-- Kolom Nama -->
            <div class="mb-3">
                <label for="feedbackName" class="form-label">Nama</label>
                <input type="text" class="form-control" id="feedbackName" placeholder="Nama Anda">
            </div>

            <!-- Kolom Email -->
            <div class="mb-3">
                <label for="feedbackEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="feedbackEmail" placeholder="Email Anda">
            </div>

            <div class="mb-3">
                <label for="feedbackMessage" class="form-label">Saran atau kritik tambahan</label>
                <textarea class="form-control" id="feedbackMessage" rows="4" placeholder="Tulis kritik & saran Anda di sini..."></textarea>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" onclick="submitFeedback()">Kirim</button>
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

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const emojiButtons = document.querySelectorAll(".emoji-btn");
    const feedbackText = document.getElementById("feedbackText");
    const feedbackRatingInput = document.getElementById("feedbackRating");

    const ratingTexts = {
      1: "Tidak Puas 😞",
      2: "Cukup Puas 😐",
      3: "Puas 😊",
      4: "Sangat Puas 😍"
    };

    emojiButtons.forEach(button => {
      button.addEventListener("click", function () {
        const rating = this.getAttribute("data-value");

        // Set tulisan feedback sesuai rating
        feedbackText.textContent = ratingTexts[rating];

        // Simpan nilai rating ke input hidden
        feedbackRatingInput.value = rating;

        // Hapus class active di semua tombol, lalu tambahkan ke yang dipilih
        emojiButtons.forEach(btn => btn.classList.remove("active"));
        this.classList.add("active");
      });
    });
  });
</script>

<script>
  function submitFeedback() {
    const rating = document.getElementById("feedbackRating").value;
    const infoEase = document.getElementById("infoEase").value;
    const infoAccuracy = document.getElementById("infoAccuracy").value;
    const infoClarity = document.getElementById("infoClarity").value;
    const infoCategory = document.getElementById("infoCategory").value;
    const infoSuggestion = document.getElementById("infoSuggestion").value;
    const name = document.getElementById("feedbackName").value;
    const email = document.getElementById("feedbackEmail").value;
    const message = document.getElementById("feedbackMessage").value;

    if (!rating) {
      toastr.warning("Silakan pilih tingkat kepuasan!", "Peringatan");
      return;
    }

    fetch("{{ route('feedback.store') }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      body: JSON.stringify({
        rating,
        infoEase,
        infoAccuracy,
        infoClarity,
        infoCategory,
        infoSuggestion,
        name,
        email,
        message
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        toastr.success("Terima kasih atas feedback Anda!", "Sukses");
        document.getElementById("feedbackForm").reset();
        document.getElementById("feedbackText").textContent = "";
        const modal = bootstrap.Modal.getInstance(document.getElementById("feedbackModal"));
        modal.hide();
      } else {
        toastr.error("Terjadi kesalahan, coba lagi.", "Error");
      }
    })
    .catch(error => {
      toastr.error("Terjadi kesalahan pada server!", "Gagal");
      console.error("Error:", error);
    });
  }
</script>
