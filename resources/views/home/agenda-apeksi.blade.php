<style>
  .d-none {
    display: none !important;
  }

  .day-pane.active {
    display: block;
  }
</style>
<div class="container agenda-apeksi">
  <h2 class="countdown-title-modern mb-4 mt-4">
      <span class="countdown-gradient">AGENDA APEKSI MUSKOMWIL IV KE 13 / 2025 - KOTA KEDIRI</span>
  </h2>

  <div class="date-picker" role="tablist" aria-label="Pilih tanggal kegiatan">
    @foreach($eventSchedules as $index => $event)
    <button
      class="date-item {{ $index === 0 ? 'active' : 'inactive' }}"
      role="tab"
      aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
      aria-controls="day{{ $index + 1 }}"
      id="tab{{ $index + 1 }}">
      <span>{{ \Carbon\Carbon::parse($event['date'])->format('j M') }}</span>
      <span>{{ \Carbon\Carbon::parse($event['date'])->translatedFormat('l') }}</span>
    </button>
    @endforeach
  </div>

  <section aria-live="polite" class="day-content">
    @foreach($eventSchedules as $index => $event)
    <div class="day-pane {{ $index === 0 ? 'active' : 'd-none' }}" id="dayPane{{ $index + 1 }}">
      <h4 class="section-title" id="day{{ $index + 1 }}" tabindex="-1">Hari Ke {{ $index + 1 }}</h4>
      <div class="accordion" role="region" aria-labelledby="day{{ $index + 1 }}">

        <article class="accordion-item">
          <header
            class="accordion-header"
            role="button"
            tabindex="0"
            aria-expanded="false"
            aria-controls="detail{{ $index + 1 }}"
            id="detail{{ $index + 1 }}header">
            {{ $event['event_name'] }}
            <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z"></path>
            </svg>
          </header>

          <div
            class="accordion-content"
            id="detail{{ $index + 1 }}"
            role="region"
            aria-labelledby="detail{{ $index + 1 }}header">
            <ul class="mb-3 text-black">
              <li><strong>Tempat:</strong> {{ $event['venue'] }}</li>
              <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event['date'])->translatedFormat('d F Y') }}</li>
              <li><strong>Peserta:</strong> {{ $event['attendees'] }}</li>
              <li><strong>Dresscode:</strong> {{ $event['dresscode'] }}</li>
              <li><strong>Link Lokasi:</strong></li>
              {!! $event['map'] !!}
            </ul>

            <div class="nested-detail" tabindex="0" aria-expanded="false" aria-controls="nestedDetail{{ $index + 1 }}" id="nestedDetail{{ $index + 1 }}header">
              Jadwal Kegiatan
              <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                <path d="M7 10l5 5 5-5z"></path>
              </svg>
            </div>

            <div class="nested-detail-content" id="nestedDetail{{ $index + 1 }}" role="region" aria-labelledby="nestedDetail{{ $index + 1 }}header">
              <ul>
                @foreach($event['schedule'] as $item)
                <li><strong>{{ $item['time'] }}:</strong> {{ $item['activity'] }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </article>

      </div>
    </div>
    @endforeach
  </section>

  <!-- Section: Teaser Video -->
  <div class="container teaser-video-modern mt-5">
    <h4 class="mb-3 fw-bold border-bottom title-border">Teaser APEKSI Kota Kediri</h4>
    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-lg teaser-video-box" style="max-width: 900px; margin: 0 auto;">
      <iframe
        src="https://drive.google.com/file/d/1VjjOSZ_TtOeuivaiaXyDLBq3GTyK36yM/preview"
        allowfullscreen
        frameborder="0"
        style="transition:box-shadow 0.3s;">
      </iframe>
    </div>
  </div>
  <style>
    .teaser-video-box {
      animation: fadeInUp 0.7s;
      border: 2px solid #21808c;
      box-shadow: 0 8px 32px rgba(22, 90, 99, 0.13);
    }
  </style>
  <script>
    // Autoplay Google Drive video on scroll (Intersection Observer)
    document.addEventListener('DOMContentLoaded', function() {
      const teaserVideo = document.getElementById('teaserVideo');
      let hasPlayed = false;
      if (teaserVideo) {
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting && !hasPlayed) {
              // Reload iframe to trigger autoplay
              teaserVideo.src += "&autoplay=1";
              hasPlayed = true;
            }
          });
        }, {
          threshold: 0.5
        });
        observer.observe(teaserVideo);
      }
    });
  </script>

  <!-- Section: Informasi Kota Kediri -->
  <div class="container informasi-kediri-modern mt-5">
    <h4 class="mb-5 fw-bold border-bottom title-border">Informasi Kota Kediri</h4>
    <p class="mb-4 text-center" style="color:#21808c;font-size:1.08rem;">
      Dapatkan buku panduan dan informasi resmi Kota Kediri di bawah ini:
    </p>
    <div class="text-center">
      <a href="{{ asset('storage/informasi-kota-kediri.pdf') }}" class="btn btn-gradient-green px-4 py-2 fw-semibold rounded-pill d-inline-flex align-items-center gap-2" download>
        <i class="bi bi-download fs-5"></i>
        Download Buku Panduan Kota Kediri
      </a>
    </div>
  </div>
  <style>
    .title-border {
      border-bottom: 4px solid #165a63;
      display: inline-block;
      padding-bottom: 4px;
    }

    .info-card-modern {
      max-width: 900px;
      margin: 0 auto 2rem auto;
      background: linear-gradient(135deg, #e6f4f1 60%, #f8fafc 100%);
      border: 1px solid #d2e7e4;
      box-shadow: 0 8px 32px rgba(22, 90, 99, 0.08);
      border-radius: 18px;
    }

    .btn-gradient-green {
      background: linear-gradient(90deg, #165a63 0%, #21808c 100%);
      color: #fff !important;
      border: none;
      box-shadow: 0 2px 12px rgba(22, 90, 99, 0.08);
      transition: background 0.2s, box-shadow 0.2s;
    }

    .btn-gradient-green:hover,
    .btn-gradient-green:focus {
      background: linear-gradient(90deg, #21808c 0%, #165a63 100%);
      color: #fff !important;
      box-shadow: 0 4px 18px rgba(22, 90, 99, 0.13);
    }

    .info-card-modern {
      animation: fadeInUp 0.7s;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 600px) {
      .info-card-modern {
        padding: 1.2rem 0.5rem;
        max-width: 98vw;
      }

      .btn-gradient-green {
        font-size: 0.95rem;
        padding: 0.6rem 1.2rem;
      }

      .title-border {
        font-size: 1.1rem;
        border-bottom-width: 3px;
      }
    }
  </style>

  <script>
    // Date navigation logic (To highlight selected date and update content title)
    const dateItems = document.querySelectorAll('.date-item');
    const sectionTitle = document.querySelector('.section-title');
    const dayContent = document.querySelector('.day-content');

    // Dummy content titles for days
    const dayTitles = {
      day1: "Hari Ke 1",
      day2: "Hari Ke Dua",
      day3: "Hari Ke Tiga",
      day4: "Hari Ke Empat",
      day5: "Hari Ke Lima",
      day6: "Hari Ke Enam"
    };

    dateItems.forEach(item => {
      item.addEventListener('click', () => {
        if (item.classList.contains('active')) return;

        // Reset tab state
        dateItems.forEach(i => {
          i.classList.remove('active');
          i.classList.add('inactive');
          i.setAttribute('aria-selected', 'false');
          i.setAttribute('tabindex', '-1');
        });

        // Set active tab
        item.classList.remove('inactive');
        item.classList.add('active');
        item.setAttribute('aria-selected', 'true');
        item.setAttribute('tabindex', '0');
        item.focus();

        const dayId = item.getAttribute('aria-controls');
        sectionTitle.textContent = dayTitles[dayId] || "Hari";
        sectionTitle.setAttribute('id', dayId);
        dayContent.setAttribute('aria-labelledby', dayId);

        // Tampilkan konten yang sesuai
        document.querySelectorAll('.day-pane').forEach(pane => {
          pane.classList.add('d-none');
          pane.classList.remove('active');
        });

        const targetPane = document.querySelector(`#dayPane${dayId.replace('day', '')}`);
        if (targetPane) {
          targetPane.classList.remove('d-none');
          targetPane.classList.add('active');
        }

        // Reset accordion & nested detail
        closeAllAccordions();
        closeAllNestedDetails();
      });
    });


    // Accordion toggles
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    accordionHeaders.forEach(header => {
      header.addEventListener('click', () => {
        const expanded = header.getAttribute('aria-expanded') === 'true';
        if (expanded) {
          collapseAccordion(header);
        } else {
          // Close others
          accordionHeaders.forEach(h => collapseAccordion(h));
          expandAccordion(header);
        }
      });
      // Keyboard accessibility enter/space
      header.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          header.click();
        }
      });
    });

    function expandAccordion(header) {
      header.setAttribute('aria-expanded', 'true');
      header.classList.add('open');
      const content = document.getElementById(header.getAttribute('aria-controls'));
      if (content) {
        content.classList.add('open');
      }
    }

    function collapseAccordion(header) {
      header.setAttribute('aria-expanded', 'false');
      header.classList.remove('open');
      const content = document.getElementById(header.getAttribute('aria-controls'));
      if (content) {
        content.classList.remove('open');
      }
    }

    function closeAllAccordions() {
      accordionHeaders.forEach(h => collapseAccordion(h));
    }

    // Nested detail toggles
    const nestedDetails = document.querySelectorAll('.nested-detail');
    nestedDetails.forEach(detail => {
      detail.addEventListener('click', () => {
        const expanded = detail.getAttribute('aria-expanded') === 'true';
        if (expanded) {
          collapseNested(detail);
        } else {
          expandNested(detail);
        }
      });
      detail.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          detail.click();
        }
      });
    });

    function expandNested(detail) {
      detail.setAttribute('aria-expanded', 'true');
      detail.classList.add('open');
      const content = document.getElementById(detail.getAttribute('aria-controls'));
      if (content) {
        content.classList.add('open');
      }
    }

    function collapseNested(detail) {
      detail.setAttribute('aria-expanded', 'false');
      detail.classList.remove('open');
      const content = document.getElementById(detail.getAttribute('aria-controls'));
      if (content) {
        content.classList.remove('open');
      }
    }

    function closeAllNestedDetails() {
      nestedDetails.forEach(d => collapseNested(d));
    }
  </script>

</div>